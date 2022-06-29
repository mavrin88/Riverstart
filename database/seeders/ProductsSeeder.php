<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $product = Product::create([
                'name' => $faker->name,
                'price' =>  $faker->numberBetween(1000, 9000),
                'active' =>  $faker->boolean,
            ]);

            $category = $faker->numberBetween(1, 5);

            $categories = Category::find($category);
            $product->categories()->attach($categories);
        }
    }
}
