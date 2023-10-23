<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Business Plan', 
                'slug' => 'business-plan', 
                'stripe_plan' => 'price_1LmB1SCXbPPKAWayGsb1DAkq', 
                'price' => 10, 
                'description' => 'Business Plan'
            ],
            [
                'name' => 'Premium', 
                'slug' => 'premium', 
                'stripe_plan' => 'price_1LnwbTCXbPPKAWay3ByKpcfq', 
                'price' => 20, 
                'description' => 'Premium'
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
