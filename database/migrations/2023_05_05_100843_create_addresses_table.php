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
            $table->string("name");
            $table->string("city");
            $table->string("state");
            $table->string("zip_code");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("address_user", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("address_id")
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->cascadeOnDelete();
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
        Schema::dropIfExists("addresses");
    }
};
