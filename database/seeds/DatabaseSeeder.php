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

        for ($i = 0; $i < $this->times; $i++) {
            $category = factory('App\Models\Category')->create();

            $subcategories = factory('App\Models\Subcategory', $this->times)->create([
                'category_id' => $category->id
            ]);

            $products = factory('App\Models\Product', $this->times)->create();

            $products->map(function ($product) use ($subcategories) {
                $product->subcategories()->sync($subcategories->pluck('id')->toArray() ?? []);
            });
        }
    }
}
