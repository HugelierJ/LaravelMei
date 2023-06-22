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
        Schema::create("orders", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("billing_id")
                ->constrained()
                ->cascadeOnDelete();
            $table->string("status");
            $table->decimal("total_price", 6, 2);
            $table->string("session_id");
            $table->string("payment_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("order_product", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("order_id")
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId("product_id")
                ->constrained()
                ->cascadeOnDelete();
            $table->decimal("price")->default(0);
            $table->string("shoesize")->default(0);
            $table->integer("quantity")->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(["order_id", "product_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("orders");
    }
};
