<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'ACI Pharmaceuticals',
                'contact_person' => 'Mr. Kamal',
                'phone' => '01712345678',
                'email' => 'aci@example.com',
                'address' => 'Tejgaon, Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Square Pharmaceuticals',
                'contact_person' => 'Mrs. Jahanara',
                'phone' => '01876543210',
                'email' => 'square@example.com',
                'address' => 'Mohakhali, Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beximco Pharma',
                'contact_person' => 'Mr. Rahman',
                'phone' => '01911223344',
                'email' => 'beximco@example.com',
                'address' => 'Dhanmondi, Dhaka',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
