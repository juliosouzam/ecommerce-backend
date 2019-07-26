<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->uuid('id')->index();
            $table->uuid('cart_id');
            $table->uuid('product_id');
            $table->string('product_title');
            $table->decimal('price', 14, 2);
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cart_id')->on('carts')->references('id');
            $table->foreign('product_id')->on('products')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
