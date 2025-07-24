<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg',
        'date',
        'user_id',
        'medicine_id',
        'qty',
        'unit_price',
        'total_price',
        'exp_date',
        'mfg_date',
        'status'
    ];

    public function medicine(){
        return $this->belongsTo(Product::class, 'medicine_id','id');
    }

    public function user(){
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
