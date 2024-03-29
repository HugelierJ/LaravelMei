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
        Schema::create("billings", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->string("state");
            $table->string("city");
            $table->string("zip_code");
            $table->string("phone_number")->nullable();
            $table->string("email");
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
        Schema::dropIfExists("billings");
    }
};
