<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name'    => 'Example Ltd',
            'address' => 'Dhaka, Bangladesh',
            'email'   => 'info@example.com',
            'phone'   => '01762164746',
            'website' => 'https://example.com',
        ]);
    }
}
