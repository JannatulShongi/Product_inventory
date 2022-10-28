<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $products = [
            [
                'id' => '1',
                'parent_id' => null,
                'name' => 'Product 1',
                'description' => 'Product 1 Description',
                'price' => '100',
                'unit' => 'KG',
                'quantity' => '10',
            ],
            [
                'id' => '2',
                'parent_id' => null,
                'name' => 'Product 2',
                'description' => 'Product 2 Description',
                'price' => '200',
                'unit' => 'KG',
                'quantity' => '20',
            ],
            [
                'id' => '3',
                'parent_id' => null,
                'name' => 'Product 3',
                'description' => 'Product 3 Description',
                'price' => '300',
                'unit' => 'KG',
                'quantity' => '30',
            ],
            [
                'id' => '4',
                'parent_id' => null,
                'name' => 'Product 4',
                'description' => 'Product 4 Description',
                'price' => '400',
                'unit' => 'KG',
                'quantity' => '40',
            ],
            [
                'id' => '5',
                'parent_id' => null,
                'name' => 'Product 5',
                'description' => 'Product 5 Description',
                'price' => '500',
                'unit' => 'KG',
                'quantity' => '50',
            ],
            [
                'id' => '6',
                'parent_id' => null,
                'name' => 'Product 6',
                'description' => 'Product 6 Description',
                'price' => '600',
                'unit' => 'KG',
                'quantity' => '60',
            ],
            [
                'id' => '7',
                'parent_id' => null,
                'name' => 'Product 7',
                'description' => 'Product 7 Description',
                'price' => '700',
                'unit' => 'KG',
                'quantity' => '70',
            ],
            [
                'id' => '8',
                'parent_id' => null,
                'name' => 'Product 8',
                'description' => 'Product 8 Description',
                'price' => '800',
                'unit' => 'KG',
                'quantity' => '80',
            ],
            [
                'id' => '9',
                'parent_id' => null,
                'name' => 'Product 9',
                'description' => 'Product 9 Description',
                'price' => '900',
                'unit' => 'KG',
                'quantity' => '90',
            ],
            [
                'id' => '10',
                'parent_id' => null,
                'name' => 'Product 10',
                'description' => 'Product 10 Description',
                'price' => '1000',
                'unit' => 'KG',
                'quantity' => '100',
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
