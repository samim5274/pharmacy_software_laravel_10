<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genericName',
        'brand_id',
        'category_id',
        'purchase_price',
        'price',
        'stock',
        'manufacture_date',
        'expiry_date',
        'description',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'medicine_id','id');
    }

    public function purchasecart(){
        return $this->hasMany(Purchasecart::class, 'medicine_id','id');
    }
}
