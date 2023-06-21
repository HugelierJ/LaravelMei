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
            $table->string("billing_name");
            $table->string("billing_address");
            $table->string("billing_state");
            $table->string("billing_city");
            $table->string("billing_zip_code");
            $table->string("billing_phone_number")->nullable();
            $table->string("billing_email");
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
