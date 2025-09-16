<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\Warranty;
use Illuminate\Support\Facades\Log; // <-- Add this
use Illuminate\Support\Facades\Http;
class AdminProductsController extends Controller
{

    public function adminProducts(Request $request)
    {
        // 1. Обновляем истекшие продукты
        Product::where('status', Product::STATUS_ACTIVE)
            ->whereNotNull('activation_expires_at')
            ->where('activation_expires_at', '<', now())
            ->update(['status' => Product::STATUS_EXPIRED]);
    
        // 2. Загружаем отфильтрованные продукты (если есть фильтры)
        $productsQuery = Product::query();
    
        if ($request->has('type')) {
            $productsQuery->where('type', $request->type);
        }
    
        if ($request->has('country')) {
            $productsQuery->where('country', $request->country);
        }
    
        if ($request->has('search')) {
            $productsQuery->where('code', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('has_warranty')) {
            $hasWarranty = $request->has_warranty === '1';
            $productsQuery->where(function ($query) use ($hasWarranty) {
                if ($hasWarranty) {
                    $query->whereNotNull('warranty');
                } else {
                    $query->whereNull('warranty');
                }
            });
        }
    
        // 3. Кастомная сортировка вручную
        $productsQuery->orderByRaw("
            CASE 
                WHEN status = 1 THEN 1         -- Active
                WHEN status = 0 THEN 2         -- New
                WHEN warranty IS NOT NULL THEN 3 -- Has Warranty
                WHEN status = 2 THEN 4         -- Expired
                ELSE 5
            END
        ");
    
        $products = $productsQuery->paginate(25);
    
        $section = 'products';
        return view('admin.dashboard', compact('section', 'products'));
    }
    
    


    public function adminProductAdd(Request $request)
    {
        $section = 'products__add';
        return view('admin.dashboard', compact('section'));
    }

public function adminPostProductAdd(Request $request)
{
    $request->validate([
        'product_codes' => 'required|string',
        'product_confirmation_codes' => 'required|string',
    ]);

    // Разбираем строки
    $codes = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $request->product_codes)), fn($v) => $v !== ''));
    $conf  = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $request->product_confirmation_codes)), fn($v) => $v !== ''));

    if (count($codes) === 0) {
        return back()->withInput()->with('error', 'No product codes provided.');
    }
    if (count($codes) !== count($conf)) {
        return back()->withInput()->with('error', 'Количество строк в обоих полях должно совпадать.');
    }

    // Карты и доп. настройки
    $productTypes = [
        'UR' => 1, // Urban
        'OP' => 2, // Optima
        'EL' => 3, // Element
        'HU' => 4, // Huracan
        'MA' => 5, // Matte
        'BL' => 6, // Black
    ];
    $validCountries = ['AZ', 'US', 'EU'];

    $addedProducts = [];
    $invalid = [];

    // Быстрый локальный контроль дубликатов в одном запросе
    $confUpper = array_map(fn($s) => strtoupper($s), $conf);
    $confCounts = array_count_values($confUpper);
    foreach ($confCounts as $k => $cnt) {
        if ($cnt > 1) {
            return back()->withInput()->with('error', "Duplicate confirmation code in input: {$k}");
        }
    }

    // Проверка формата confirmation-кодов
    foreach ($confUpper as $k) {
        if (!preg_match('/^[A-Z0-9]{12}$/', $k)) {
            return back()->withInput()->with('error', "Invalid confirmation code format: {$k}. Expect 12 chars A–Z0–9.");
        }
    }

    // Проверка уникальности в БД заранее (минимизируем ошибки при insert)
    $existsInDb = \App\Models\Product::query()
        ->whereIn('product_confirmation_code', $confUpper)
        ->pluck('product_confirmation_code')
        ->all();
    if (!empty($existsInDb)) {
        $dup = implode(', ', $existsInDb);
        return back()->withInput()->with('error', "These confirmation codes already exist: {$dup}");
    }

    // Построчно создаём
    foreach ($codes as $i => $code) {
        if (strlen($code) < 4) {
            $invalid[] = $code; continue;
        }

        $typePrefix = substr($code, 0, 2);
        $countrySuffix = substr($code, -2);

        if (!isset($productTypes[$typePrefix]) || !in_array($countrySuffix, $validCountries, true)) {
            $invalid[] = $code; continue;
        }

        // Проверка уникальности product.code (на всякий)
        if (Product::where('code', $code)->exists()) {
            $invalid[] = $code; continue;
        }

        // Берём соответствующий confirmation-код
        $pcc = $confUpper[$i];

        try {
            $product = Product::create([
                'code' => $code,
                'type' => $productTypes[$typePrefix],
                'country' => $countrySuffix,
                'verification_date' => null,
                'warranty' => null,
                'service_id' => null,
                'is_active' => false,
                'activation_expires_at' => null,
                'status' => Product::STATUS_ADDED,
                'product_confirmation_code' => $pcc,
            ]);
            $addedProducts[] = $product->code;
        } catch (\Throwable $e) {
            // На случай гонок/уникальных ограничений и прочего
            Log::error('Add product failed', ['code' => $code, 'err' => $e->getMessage()]);
            $invalid[] = $code;
        }
    }

    if (count($addedProducts) > 0) {
        $msg = count($addedProducts) . ' products added successfully.';
        if (count($invalid)) {
            $msg .= ' Skipped: ' . implode(', ', $invalid);
        }
        return redirect()->route('admin.add_product')->with('success', $msg);
    } else {
        return redirect()->route('admin.add_product')->with('error', 'No valid products were added.');
    }
}


    public function adminDeleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->warranty) {
            return redirect()->back()->with('error', 'Cannot delete product with an active warranty.');
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }

    public function adminSellProductPage()
    {
        $services = Service::where('cooperation', true)->get(); // Только те, у кого cooperation = 1
        $section = 'sell_products';
        return view('admin.dashboard', compact('section', 'services'));
    }

    public function adminSellProductPost(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'service_id' => 'required|exists:services,id',
            'duration_hours' => 'required|integer|min:1|max:120'
        ]);
    
        $serviceId = $request->service_id;
        $duration = (int) $request->duration_hours;
        $expiresAt = now()->addHours($duration);
    
        // Парсим коды (разделитель — запятая)
        $codes = explode(',', $request->code);
        $codes = array_map('trim', $codes);
        $codes = array_filter($codes); // удалим пустые
    
        // Маппинг типа
        $productTypes = [
            'UR' => 1,
            'OP' => 2,
            'EL' => 3,
            'HU' => 4,
            'MA' => 5,
            'BL' => 6,
        ];
        $validCountries = ['AZ', 'EU', 'US'];
    
        $added = [];
        $invalid = [];
    
        foreach ($codes as $code) {
            $product = Product::where('code', $code)->first();
    
            if (!$product) {
                // Пытаемся распарсить новый продукт
                $typePrefix = substr($code, 0, 2);
                $countrySuffix = substr($code, -2);
    
                if (!isset($productTypes[$typePrefix]) || !in_array($countrySuffix, $validCountries)) {
                    $invalid[] = $code;
                    continue;
                }
    
                $product = Product::create([
                    'code' => $code,
                    'type' => $productTypes[$typePrefix],
                    'country' => $countrySuffix,
                    'status' => Product::STATUS_ACTIVE,
                    'activation_expires_at' => $expiresAt,
                    'service_id' => $serviceId,
                ]);
            } else {
                // Обновляем существующий продукт
                $product->update([
                    'status' => Product::STATUS_ACTIVE,
                    'activation_expires_at' => $expiresAt,
                    'service_id' => $serviceId,
                ]);
            }
    
            $added[] = $code;
        }
    
        // Отправим SMS
        $service = Service::find($serviceId);
        if ($service && $service->phone && count($added)) {
            $codeList = implode(', ', $added);
            $message = "{$service->name}, \n"
                    . "bu mesajı aldığınız andan etibarən məhsulu aktivləşdirmək üçün {$duration} saat vaxtınız var. "
                    . "Bu müddət bitdikdən sonra məhsul etibarsız sayılacaq və Capsule şirkəti tərəfindən sizə texniki dəstək göstərilməyəcək.\n"
                    . "Məhsulu vaxtında aktivləşdirin. Əks halda, Capsule şirkətinin siyasətinə əsasən, müştəri sizin xidmətlərinizi ödəməmək hüququna malikdir.\n"
                    . "Aktivasiya kodu: {$codeList}"
                     ;
            $this->sendSmsNotification($service->phone, $message);
        }
    
        // Ответ пользователю
        if (count($added)) {
            return redirect()->route('admin.products')->with('success', count($added) . ' product(s) added/assigned successfully.');
        } else {
            return back()->with('error', 'No valid product codes were added or assigned.');
        }
    }
    
    

    public function adminDeactivateProduct($id)
    {
        $product = Product::findOrFail($id);

        if ($product->warranty) {
            return redirect()->back()->with('error', 'Cannot deactivate product with active warranty.');
        }

        $product->update([
            'status' => Product::STATUS_EXPIRED,
            'activation_expires_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Product deactivated successfully.');
    }

    public function updateProductStatus(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->warranty) {
            return redirect()->back()->with('error', 'Cannot change status of a product with warranty.');
        }

        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);

        $product->status = (int)$request->status;
        $product->save();

        return redirect()->back()->with('success', 'Product status updated.');
    }




    private function sendSmsNotification($clientPhone, $message)
    {
        $apiUrl = "https://sms.atatexnologiya.az/bulksms/api";
        $apiLogin = "Capsule";
        $apiPassword = "db8Q#5@H!1R";
        $title = "CAPSULE PPF";
        $controlId = time() . rand(1000, 9999); // Unique ID

        $xmlData = "<?xml version='1.0' encoding='UTF-8'?>
            <request>
                <head>
                    <operation>submit</operation>
                    <login>{$apiLogin}</login>
                    <password>{$apiPassword}</password>
                    <title>{$title}</title>
                    <scheduled>now</scheduled>
                    <isbulk>false</isbulk>
                    <controlid>{$controlId}</controlid>
                </head>
                <body>
                    <msisdn>{$clientPhone}</msisdn>
                    <message>{$message}</message>
                </body>
            </request>";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/xml',
            ])->withBody($xmlData, 'application/xml')
                ->withOptions(['verify' => false])
                ->post($apiUrl);

            Log::info('SMS API Request:', ['xml' => $xmlData]);
            Log::info('SMS API Response:', ['response' => $response->body()]);

            if (strpos($response->body(), '<responsecode>000</responsecode>') !== false) {
                return true;
            } else {
                Log::error('SMS sending failed', ['response' => $response->body()]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('SMS API Error: ' . $e->getMessage());
            return false;
        }
    }
}
