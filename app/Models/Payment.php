<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['meter_id', 'last_month', 'this_month', 'usage', 'tariff', 'penalty', 'billing_month', 'status'];
}
