<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasereturnorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_date',
        'user_id',
        'supplier_id',
        'chalan_reg',
        'total',
        'discount',
        'vat',
        'payable',
        'pay',
        'due'
    ];
}
