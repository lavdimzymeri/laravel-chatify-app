<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentPacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('payment_packs')->insert([
            [
                'name' => 'Basic Pack',
                'description' => 'Get the essentials',
                'price' => 10.00,
            ],
        ]);
    }
    
}
