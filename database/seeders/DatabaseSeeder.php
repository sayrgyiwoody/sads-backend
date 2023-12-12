<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $roles = ['client', 'sales', 'logistics', 'warehouse', 'factory', 'admin'];

        for ($i = 0; $i < count($roles); $i++) {
            \App\Models\User::factory()->create([
                'name' => 'user',
                'email' => $roles[$i].'@gmail.com',
                'password' => Hash::make('flowerwave'),
                'role' => $roles[$i],
            ]);
        }

        $this->call([ProductSeeder::class]);

        // $products = [
        //     'Burmese Bliss', 'Golden Sunshine Tea', 'Mango Tango Delight', 'Rangoon Rosewater Elixir', 'Emerald Green Chai', 'Citrus Fusion Fizz',
        //     'Coconut Cream Dream', 'Jasmine Serenade Soda', 'Papaya Paradise Punch', 'Lychee Lullaby',
        //     'Tropical Twilight Nectar', 'Orchid Oasis Euphoria', 'Starfruit Saprking Sorbet',
        //     'Ginger Zing Zest', 'Lush Lemongrass Infustion', 'Ruby Red Guava Gusto',
        //     'Blueberry Burst Breeze', 'Pineapple Pizzass Quencher', 'Passionfruit Pomegranate Bliss',
        //     'Exotic Cucumber Limeade'
        // ];

        // for ($i = 0; $i < count($products); $i++) {
        //     \App\Models\Product::factory()->create([
        //         'product_name' => $products[$i],
        //         'product_price' => rand(5000, 10000),
        //         'bottles_per_box' => rand(10, 100),
        //     ]);
        // }






    }
}
