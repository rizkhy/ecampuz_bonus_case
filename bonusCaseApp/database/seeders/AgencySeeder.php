<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::truncate();

        for ($i = 0; $i < 5; $i++) {
            Agency::create([
                'name' => 'Agency ' . $i,
                'description' => 'Description ' . $i,
            ]);
        }
    }
}
