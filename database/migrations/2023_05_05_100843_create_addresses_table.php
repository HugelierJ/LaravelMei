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
        Schema::create("addresses", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->string("home_address");
            $table->string("secondary_address")->nullable();
            $table->string("city");
            $table->string("state");
            $table->string("zip_code");
            $table->string("type")->nullable();
            $table->boolean("is_billing_address")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("addresses");
    }
};
