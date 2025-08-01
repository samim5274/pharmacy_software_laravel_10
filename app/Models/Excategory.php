<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subexcategory(){
        return $this->hasMany(Subexcategory::class, 'ex_category_id', 'id');
    }

    public function expenses()
    {
        return $this->hasMany(Expenses::class, 'catId', 'id');
    }

}
