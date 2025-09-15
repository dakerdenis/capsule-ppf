<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Warranty;
class Service extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'warranty_phone', // ✅ добавили это
        'city',
        'country',
        'logo',
        'cooperation',
        'list_of_products',
        'email',
        'password',
    ];
    

    protected $casts = [
        'list_of_products' => 'array',
    ];

    // Fix for preventing double hashing
    public function setPasswordAttribute($value)
    {
        if (\Illuminate\Support\Facades\Hash::needsRehash($value)) {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }

    public function warranties()
    {
        return $this->hasMany(Warranty::class);
    }
}
