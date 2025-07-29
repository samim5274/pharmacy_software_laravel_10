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

    public function user(){
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }
}
