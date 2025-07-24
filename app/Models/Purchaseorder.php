<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchaseorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'delivary_date',
        'user_id',
        'chalan_reg',
        'total',
        'discount',
        'vat',
        'payable',
        'pay',
        'due',
        'status'
    ];

    public function user(){
        return $this->belongsTo(Admin::class, 'user_id','id');
    }
}
