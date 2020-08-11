<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->unique()->index();
            $table->uuid('order_id');
            $table->uuid('product_id');
            $table->string('product_title');
            $table->decimal('price', 14, 2);
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('order_id')->on('orders')->references('id');
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
        Schema::dropIfExists('order_items');
    }
}
