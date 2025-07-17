<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $products = [
            [
                'name' => 'Wireless Headphones',
                'description' => 'Noise-cancelling over-ear wireless headphones.',
                'price' => 2999.00,
                'stock_quantity' => 15,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Waterproof smart watch with health tracking.',
                'price' => 1999.00,
                'stock_quantity' => 25,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable mini Bluetooth speaker with bass.',
                'price' => 999.00,
                'stock_quantity' => 40,
            ],
            [
                'name' => 'Laptop Stand',
                'description' => 'Adjustable aluminum laptop stand.',
                'price' => 599.00,
                'stock_quantity' => 30,
            ],
            [
                'name' => 'USB-C Hub',
                'description' => '7-in-1 USB-C hub with HDMI and SD card reader.',
                'price' => 899.00,
                'stock_quantity' => 50,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
