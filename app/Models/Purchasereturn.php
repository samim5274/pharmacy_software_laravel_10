<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasereturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'chalan_reg',
        'product_id',
        'supplier_id',
        'return_qty',
        'return_date',
        'reason',
    ];
}
