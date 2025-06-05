<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Survey & Inspection'],
            ['name' => 'Ship Services, Repairs and Maintenance'],
            ['name' => 'Supplies & Chandlery & Spares'],
            ['name' => 'Management & Operations'],
            ['name' => 'Port & Marine Services'],
            ['name' => 'Logistics & Transportation'],
            ['name' => 'Consultancy & Training'],
            ['name' => 'Industry & Offshore'],
            ['name' => 'Yachting & Leisure'],
            ['name' => 'Data, Tech & Other Services'],
        ]);
    }
}

