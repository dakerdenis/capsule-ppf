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
}
