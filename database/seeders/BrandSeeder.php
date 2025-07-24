<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandSeeder extends Seeder
{
    
    public function run(): void
    {
        $brands = [
            ['name' => 'Square', 'description' => 'Square Pharmaceuticals Ltd.'],
            ['name' => 'Incepta', 'description' => 'Incepta Pharmaceuticals Ltd.'],
            ['name' => 'Beximco', 'description' => 'Beximco Pharmaceuticals Ltd.'],
            ['name' => 'ACME', 'description' => 'ACME Laboratories Ltd.'],
            ['name' => 'Opsonin', 'description' => 'Opsonin Pharma Ltd.'],
        ];

        Brand::insert($brands);
    }
}
