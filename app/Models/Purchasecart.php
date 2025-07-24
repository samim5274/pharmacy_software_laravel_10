<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasecart extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',

        'user_id',
        'chalan_reg',
        'medicine_id',

        'order_qty',
        'delivery_qty',
        
        'status',
        'remark',
        'purchase_price',
        'price',
        'total_purchase_price',
    ];

    public function medicine(){
        return $this->belongsTo(Product::class, 'medicine_id','id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'user_id','id');
    }
}
