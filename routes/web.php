<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminServicesController;
use App\Http\Controllers\AdminWarrantyController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MailController;

use Intervention\Image\Facades\Image;

//! MAIN PAGE ROUTES + CATALOG
//*************************** */
//*************************** */
Route::get('/', function () {
    return redirect('/en');
});
Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|de']], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/catalog', [PageController::class, 'catalog'])->name('catalog');
});
Route::get('/catalog', fn() => redirect('/en/catalog'));
//*************************** */
//*************************** */



//**********USER CHECK*************/
Route::get('/user/check', function () {
    return view('check_warranty');
})->name('warranty.check');
Route::post('/user/check', [UserVerificationController::class, 'checkuser'])->name('user.check');


//!Verification Page for all users -> need to add maximum values of attempts per minute.
//*************************** */
//*************************** */
Route::get('/verification', [VerificationController::class, 'ShowVerificationForm'])->name('verification');
Route::post('/verification', [VerificationController::class, 'verification_check'])->name('verification.post');
//*************************** */
//*************************** */


//!Admin page
//*************************** */
//*************************** */
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
//*************************** */
//*************************** */




//! Admin authenticated MIddleware (ONLY AUTHORIZED ADMIN CAN ACCESS)
//*************************** */
Route::middleware('auth_admin')->group(function () {
    Route::get('/admin/sell-products', function () {
        $section = 'sell_products'; // Название соответствует твоему blade-файлу
        return view('admin.dashboard', compact('section'));
    })->name('admin.sell_products');
    Route::get('/admin/sell-products', [AdminProductsController::class, 'adminSellProductPage'])->name('admin.sell_products');
    Route::post('/admin/sell-products', [AdminProductsController::class, 'adminSellProductPost'])->name('admin.sell_product_post');
    Route::post('/admin/products/{id}/status', [AdminProductsController::class, 'updateProductStatus'])->name('admin.update_product_status');

    //dashboard admin page - admin panel only could be accessed by authenticated adminstrators
    Route::get('/admin', [AdminController::class, 'showAdminPage'])->name('admin.dashboard');
    //PRODUCTS + SERVICES + WARANTIES
    Route::prefix('admin')->group(function () {        
        Route::post('/logout-all-session', [AdminController::class, 'logoutAllSessions'])->name('admin.logout_all_sessions');

        //* SELL PRODUCTS*/

        //*PRODUCTS
        Route::get('/products', [AdminProductsController::class, 'adminProducts'])->name('admin.products');
        Route::prefix('products')->group(function () {
            Route::get('/add', [AdminProductsController::class, 'adminProductAdd'])->name('admin.add_product');
            Route::post('/add', [AdminProductsController::class, 'adminPostProductAdd'])->name('admin.add_post_product');
            Route::delete('/delete/{id}', [AdminProductsController::class, 'adminDeleteProduct'])->name('admin.delete_product');
            Route::post('/deactivate/{id}',  [AdminProductsController::class, 'adminDeactivateProduct'])->name('admin.deactivate_product');
        });


        //* SERVICES ***///
        Route::get('/services', [AdminServicesController::class, 'adminServices'])->name('admin.services');
        Route::prefix('services')->group(function () {
            Route::get('/{id}', [AdminServicesController::class, 'adminSingleService'])->name('admin.service');
            Route::get('/{id}/edit', [AdminServicesController::class, 'adminEditService'])->name('admin.edit_service');
            Route::post('/{id}/edit', [AdminServicesController::class, 'adminPostEditService'])->name('admin.edit_post_service');
            Route::delete('/{id}', [AdminServicesController::class, 'adminDeleteService'])->name('admin.delete_service');
            Route::get('/add', [AdminServicesController::class, 'adminAddService'])->name('admin.add_service');
            Route::post('/add', [AdminServicesController::class, 'adminPostAddService'])->name('admin.add_post_service');
            Route::post('/{id}/reset-counter',[AdminServicesController::class, 'resetServiceCounter'])->name('admin.reset_service_counter');
        });


        //**Clients (FOR FUTURE)
        Route::get('/clients', [ClientsController::class, 'adminClients'])->name('admin.clients');
        Route::prefix('clients')->group(function () {});


        //* WARRANTIES
        Route::get('/warranties', [AdminWarrantyController::class, 'adminWarranties'])->name('admin.warranties');
        Route::prefix('warranties')->group(function () {
            Route::get('/{id}', [AdminWarrantyController::class, 'adminSingleWarranty'])->name('admin.warranty');
            Route::get('/{id}/edit', [AdminWarrantyController::class, 'adminSingleWarranty'])->name('admin.edit_warranty');
            Route::post('/{id}', [AdminWarrantyController::class, 'adminEditPostWarranty'])->name('admin.edit_post_warranty');
            Route::delete('/delete/{id}', [AdminWarrantyController::class, 'deleteWarranty'])->name('admin.delete_warranty');
        });
    });
});
//*************************** */

//!Warranty system for Services
//*************************** */
Route::get('/warranty', [WarrantyController::class, 'warrantyPage'])->name('warranty');
Route::post('/warranty', [WarrantyController::class, 'warrantyLogin'])->name('service.post_login');
//!Warranty only logged in
Route::middleware('auth_service')->group(function () {
    Route::prefix('warranty')->group(function () {
        Route::get('/register', [WarrantyController::class, 'warrantyregister'])->name('service.register');
        Route::post('/register', [WarrantyController::class, 'warrantyPostRegister'])->name('service.post_register');
    });
});
Route::get('/warranty-success', [WarrantyController::class, 'warrantySuccess'])->name('service.success');

Route::get('/warranty/{id}', [WarrantyController::class, 'singleWarranty'])->name('service.warranty');
Route::get('/warranty/{id}/pdf', [WarrantyController::class, 'generatePdf'])->name('service.warranty.pdf');

//*************************** */
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('/send-email', [MailController::class, 'sendMail'])->name('send.email');

Route::fallback(function () {
    return 'Error 404 Not Found';
});
