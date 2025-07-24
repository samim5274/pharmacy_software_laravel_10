<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'facebook_id',
        'google_id',
        'github_id',
        'password',
        'photo',
        'phone',
        'address',
        'dob',
        'branch_id',
        'role',
        'status',
    ];

    public function order(){
        return $this->hasMany(Admin::class, 'user_id', 'id');
    }

    public function cart(){
        return $this->hasMany(Admin::class, 'user_id', 'id');
    }

    public function purchaseOrder(){
        return $this->hasMany(Purchaseorder::class, 'user_id','id');
    }

    public function purchaseCart(){
        return $this->hasMany(Purchasecart::class, 'user_id','id');
    }
}
