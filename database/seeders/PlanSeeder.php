<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::insert([
            ['name' => 'Basic', 'price' => 0,'allow_port' => 1,'allow_category'=> 1],
            ['name' => 'Silver', 'price' => 99,'allow_port' => 1,'allow_category'=> 1],
            ['name' => 'Gold', 'price' => 149,'allow_port' => 3,'allow_category'=> 1],
            ['name' => 'Platinum', 'price' => 399,'allow_port' => 7,'allow_category'=> 2],
        ]);
    }
}

