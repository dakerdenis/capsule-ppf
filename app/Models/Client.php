<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default "clients"
    protected $table = 'clients';

    // Mass assignable fields
    protected $fillable = [
        'name',
        'mobile_number',
        'email',
        'warranties',
    ];

    // Cast the warranties field as an array
    protected $casts = [
        'warranties' => 'array',
    ];
}
