<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rate::factory()
        ->count(12);
    }
}
