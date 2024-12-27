<?php

namespace Database\Seeders;

use App\Models\ShippingDep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingDepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cites = ['aleppo', 'damascus', 'homs', 'latakia', 'daraa'];
        foreach($cites as $city){
            ShippingDep::factory()->create([
                'governorate' => $city,
            ]);
        }
    }
}
