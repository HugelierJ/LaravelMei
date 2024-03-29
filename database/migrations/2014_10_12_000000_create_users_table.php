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
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->integer("is_active")->default(1);
            $table->string("username")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email")->unique();
            $table->string("phone_number")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            $table
                ->foreignId("photo_id")
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table
                ->foreignId("gender_id")
                ->nullable()
                ->constrained("genders");
            $table
                ->string("password")
                ->nullable()
                ->default("NULL");
            $table->rememberToken();
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
        Schema::dropIfExists("users");
    }
};
