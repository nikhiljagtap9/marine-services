<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::insert([
            ['name' => 'Basic', 'price' => 0],
            ['name' => 'Silver', 'price' => 99],
            ['name' => 'Gold', 'price' => 149],
            ['name' => 'Platinum', 'price' => 399],
        ]);
    }
}

