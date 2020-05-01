<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LibraryUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("library_id")->nullable();
            $table->timestamps();
        });
        Schema::table("library_user", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users")->onDelete("set null");
            $table->foreign("library_id")->references("id")->on("libraries")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("library_user");
    }
}
