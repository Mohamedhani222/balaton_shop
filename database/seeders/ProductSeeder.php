<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [['ar' => 'product 1', 'tr' => 'product 1'], ['ar' => 'product 2', 'tr' => 'product 2'], ['ar' => 'product 3', 'tr' => 'product 3']];
        $cats = [['ar' => 'category 1', 'tr' => 'category 1'], ['ar' => 'category 2', 'tr' => 'category 2'], ['ar' => 'category 3', 'tr' => 'category 3']];


   $cat = Category::create([

       'name' =>$cats[0],
       'slug' => fake()->slug,
       'description' => ['ar' => 'some description', 'tr' => 'some description'],
       'image' => 'path_to_image.jpg', // You may need to set the image path accordingly
       'is_showing' => 1,
       'is_popular' => 1,
       'meta_title' => ['ar' => 'shirts', 'tr' => 'shirts'],
       'meta_keywords' => fake()->words(5, true),
       'meta_description' => ['ar' => 'shirts', 'tr' => 'shirts'],

   ]);

        foreach ($products as $product) { // Adjust the number of products as needed
            product::create([
                'category_id' => $cat->id, // Replace 10 with the number of categories you have
                'name' => $product,
                'slug' => fake()->slug,
                'short_description' => fake()->sentence,
                'description' => fake()->paragraph,
                'price' => fake()->randomFloat(2, 10, 1000),
                'selling_price' => fake()->randomFloat(2, 10, 1000),
                'image' => 'path_to_image.jpg', // You may need to set the image path accordingly
                'qty' => fake()->numberBetween(1, 100),
                'tax' => fake()->randomFloat(2, 0, 20),
                'status' => fake()->numberBetween(0, 1),
                'trend' => fake()->numberBetween(0, 1),
                'meta_title' => fake()->sentence(5),
                'meta_keywords' => fake()->words(5, true),
                'meta_description' => json_encode(['description' => fake()->sentence(10)]),
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }

    }

}
