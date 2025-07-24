<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Tablet', 'description' => 'Oral solid medication'],
            ['name' => 'Capsule', 'description' => 'Gelatin-coated oral medication'],
            ['name' => 'Syrup', 'description' => 'Liquid medication for oral use'],
            ['name' => 'Injection', 'description' => 'Medication administered via injection'],
            ['name' => 'Ointment', 'description' => 'Topical application medication'],
            ['name' => 'Drops', 'description' => 'For eye, ear, or nasal use'],
            ['name' => 'Inhaler', 'description' => 'Used for respiratory issues'],
            ['name' => 'Powder', 'description' => 'Granular form for oral or suspension use'],
            ['name' => 'Suppository', 'description' => 'Medication inserted into rectum or vagina'],
            ['name' => 'Lotion', 'description' => 'Liquid medication for skin application'],
            ['name' => 'Spray', 'description' => 'Aerosol or pump spray medication'],
            ['name' => 'Gel', 'description' => 'Semi-solid medication for topical use'],
            ['name' => 'Sachet', 'description' => 'Single-dose powder or liquid packs'],
            ['name' => 'IV Fluid', 'description' => 'Intravenous fluids like saline or glucose'],
            ['name' => 'Vaccine', 'description' => 'For immunization purposes'],
            ['name' => 'Herbal', 'description' => 'Plant-based or natural medicine'],
            ['name' => 'Homeopathic', 'description' => 'Alternative medicine system'],
            ['name' => 'Others', 'description' => 'Other categories not listed above'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
