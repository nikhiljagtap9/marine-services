<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        SubCategory::insert([
            ['name' => 'Pre-Purchase & Special Condition Surveys', 'category_id' => 1],
            ['name' => 'P&I Condition Surveys', 'category_id' => 1],
            ['name' => 'On-hire & Off-hire Surveys', 'category_id' => 1],
            ['name' => 'SIRE 2.0 / RightShip 2.0 Pre-Vetting', 'category_id' => 1],
            ['name' => 'Bunker / Draft / Hold-Tank Surveys', 'category_id' => 1],
            ['name' => 'Hull Damage / Cargo Damage Inspections', 'category_id' => 1],
            ['name' => 'Ultrasonic Tests', 'category_id' => 1],
            ['name' => 'Technical / Accident Investigations', 'category_id' => 1],
            ['name' => 'Superintendency & Representations', 'category_id' => 1],

            ['name' => 'Hull and Structural Repairs', 'category_id' => 2],
            ['name' =>  'Mechanical and Engine Repairs', 'category_id' => 2],
            ['name' =>  'Alternator & Electrical Equipment', 'category_id' => 2],
            ['name' =>  'Marine Electronics Repairs', 'category_id' => 2],
            ['name' =>  'Boilers & Heating Systems', 'category_id' => 2],
            ['name' =>  'Air Conditioning & Refrigeration', 'category_id' => 2],
            ['name' =>  'Mechanical & Structural Equipment', 'category_id' => 2],
            ['name' =>  'Pumps & Pumping Equipment', 'category_id' => 2],
            ['name' =>  'Propulsion Systems and Stern Tube', 'category_id' => 2],
            ['name' =>  'Ballast Water Treatment Systems', 'category_id' => 2],
            ['name' =>  'Cargo Handling Equipment', 'category_id' => 2],
            ['name' =>  'Heavy Lifting', 'category_id' => 2],
            ['name' =>  'Diving & Underwater Services', 'category_id' => 2],
            ['name' =>  'Dredging', 'category_id' => 2],
            ['name' =>  'Cleaning Services', 'category_id' => 2],
            ['name' =>  'Waste Management', 'category_id' => 2],
            ['name' =>  'Life Saving Appliances Services / Inspections', 'category_id' => 2],
            ['name' =>  'Crane & Grab Rental', 'category_id' => 2],
            ['name' =>  'Shipyard & Dry Dock Services', 'category_id' => 2],
            ['name' =>  'Laboratory & Analysis', 'category_id' => 2],
            
            ['name' =>  'Ship Chandlers - Ship Suppliers (General)', 'category_id' => 3],
            ['name' =>  'Bridge and Navigation Equipment Suppliers', 'category_id' => 3],
            ['name' =>  'Engine Room & Mechanical Equipment Suppliers', 'category_id' => 3],
            ['name' =>  'Deck Machinery and Hydraulic Equipment Suppliers', 'category_id' => 3],
            ['name' =>  'Structural & Hull Equipment Suppliers', 'category_id' => 3],
            ['name' =>  'Electrical Systems and Automation Suppliers', 'category_id' => 3],
            ['name' =>  'Bunker & Oil Suppliers', 'category_id' => 3],
            ['name' =>  'Air Conditioning & Refrigeration Suppliers', 'category_id' => 3],
            ['name' =>  'Fresh Water Suppliers', 'category_id' => 3],
            ['name' =>  'Chemical Suppliers', 'category_id' => 3],
            ['name' =>  'Life Saving Appliances Suppliers', 'category_id' => 3],

            ['name' =>  'Ship Owners / Managers / Operators', 'category_id' => 4],
            ['name' =>  'Charterers / Chartering', 'category_id' => 4],
            ['name' =>  'Crewing Services', 'category_id' => 4],
            ['name' =>  'Ship Tracking', 'category_id' => 4],
            ['name' =>  'P&I Clubs & Correspondents', 'category_id' => 4],
            ['name' =>  'Insurance / Legal Services', 'category_id' => 4],

            ['name' =>  'Port Authorities', 'category_id' => 5],
            ['name' =>  'Port / Terminal Services', 'category_id' => 5],
            ['name' =>  'Port Agents', 'category_id' => 5],
            ['name' =>  'Pilots', 'category_id' => 5],
            ['name' =>  'Towage & Salvage', 'category_id' => 5],
            ['name' =>  'Security & Watchmen', 'category_id' => 5],

            ['name' =>  'Freight Forwarder', 'category_id' => 6],
            ['name' =>  'Logistics / Transport / Freight', 'category_id' => 6],
            ['name' =>  'Warehousing', 'category_id' => 6],
            ['name' =>  'Taxi & Transportation', 'category_id' => 6],

            ['name' =>  'Maritime Consultancy', 'category_id' => 7],
            ['name' =>  'Maritime Training', 'category_id' => 7],
            ['name' =>  'Publications', 'category_id' => 7],
            ['name' =>  'Classification Societies / Flag States', 'category_id' => 7],


            ['name' =>  'Ship Builders / Engineering', 'category_id' => 8],
            ['name' =>  'Manufacturing', 'category_id' => 8],
            ['name' =>  'Offshore Services', 'category_id' => 8],
            ['name' =>  'Oil and Gas', 'category_id' => 8],
            ['name' =>  'Metals and Mining', 'category_id' => 8],
            ['name' =>  'Fishing', 'category_id' => 8],
            ['name' =>  'Environmental', 'category_id' => 8],


            ['name' =>  'Yacht Builders', 'category_id' => 9],
            ['name' =>  'Yacht Chartering', 'category_id' => 9],
            ['name' =>  'Yacht Equipment', 'category_id' => 9],
            ['name' =>  'Marina', 'category_id' => 9],
            ['name' =>  'Tourism & Hospitality', 'category_id' => 9],
            ['name' =>  'Hotels', 'category_id' => 9],
            ['name' =>  'Travel / Entertainment', 'category_id' => 9],
            
            ['name' =>  'Information Technology', 'category_id' => 10],
            ['name' =>  'Weather & Routing Services', 'category_id' => 10],
            ['name' =>  'Charts', 'category_id' => 10],
            ['name' =>  'Other', 'category_id' => 10]
        ]);
    }
}

