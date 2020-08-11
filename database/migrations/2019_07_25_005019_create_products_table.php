<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->unique()->index();
            $table->string('title');
            $table->text('description');
            $table->string('slug')->unique()->index();
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_subcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('product_id')->index();
            $table->uuid('subcategory_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->on('products')->references('id');
            $table->foreign('subcategory_id')->on('subcategories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
