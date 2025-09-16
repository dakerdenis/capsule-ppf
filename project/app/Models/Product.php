<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    const STATUS_ADDED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_EXPIRED = 2;

    use HasFactory;

    protected $fillable = [
        'code',
        'verification_date',
        'warranty',
        'type',
        'service_id',
        'country',
        'verification_counter',
        'status',
        'activation_expires_at',
        'activation_expires_at' => 'datetime',
        'product_confirmation_code',
    ];

    protected $casts = [
        'verification_date' => 'date',
        'activation_expires_at' => 'datetime',
    ];
    // ✅ Динамическая проверка активности
    public function getIsActiveAttribute($value)
    {
        if ($this->activation_expires_at && now()->greaterThan($this->activation_expires_at)) {
            return false;
        }

        return $value;
    }
    public static function generateConfirmationCode(): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < 12; $i++) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $code;
    }

}
