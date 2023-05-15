<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the cart_items table
        Schema::create("cart_items", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("cart_id")
                ->constrained("carts")
                ->cascadeOnDelete();
            $table
                ->foreignId("product_id")
                ->constrained()
                ->cascadeOnDelete();
            $table->integer("quantity");
            $table->string("shoesize")->nullable();
            $table->decimal("price", 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("cart_items");
    }
};
