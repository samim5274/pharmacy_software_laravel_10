<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subexcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'ex_category_id',
        'name',
    ];

    public function excategory(){
        return $this->belongsTo(Excategory::class, 'ex_category_id', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'subcatId', 'id');
    }
}
