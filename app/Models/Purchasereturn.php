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
        'purchase_price',
        'return_qty',
        'return_date',
        'reason',
    ];

    public function medicine(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
