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
        Schema::create("product_categories", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->foreignId("gender_id")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create("product_productcategory", function (Blueprint $table) {
            $table->id();
            // $table->bigInteger()->unsigned();
            $table->foreignId("product_id");
            $table->ForeignId("productcategory_id");
            $table->timestamps();
            $table->softDeletes();

            $table->unique(["product_id", "productcategory_id"]);
            $table
                ->foreign("product_id")
                ->references("id")
                ->on("products")
                ->onDelete("cascade");
            $table
                ->foreign("productcategory_id")
                ->references("id")
                ->on("product_categories")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("product_categories");
    }
};
