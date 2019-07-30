<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public $times = 10;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        for ($i = 0; $i < 3; $i++) {
            $category = factory('App\Models\Category')->create();

            $subcategories1 = factory('App\Models\Subcategory', $this->times / 2)->create([
                'category_id' => $category->id
            ]);

            $subcategories2 = factory('App\Models\Subcategory', $this->times / 2)->create([
                'category_id' => $category->id
            ]);

            $products1 = factory('App\Models\Product', $this->times / 2)->create();
            $products2 = factory('App\Models\Product', $this->times / 2)->create();

            $products1->map(function ($product) use ($subcategories1) {
                $product->subcategories()->sync($subcategories1->pluck('id')->toArray() ?? []);
                factory('App\Models\Image')->create([
                    'product_id' => $product->id
                ]);
            });

            $products2->map(function ($product) use ($subcategories2) {
                $product->subcategories()->sync($subcategories2->pluck('id')->toArray() ?? []);
                factory('App\Models\Image')->create([
                    'product_id' => $product->id
                ]);
            });
        }
    }
}
