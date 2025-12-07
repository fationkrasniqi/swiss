<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_prefix', 'phone_number', 'canton', 'services', 'hours', 'total_price', 'service_date'
    ];
}