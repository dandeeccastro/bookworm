<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookLibrary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_library', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("book_id")->nullable();
            $table->unsignedBigInteger("library_id")->nullable();
            $table->string("dewey")->nullable();
            $table->integer("index")->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table("book_library", function (Blueprint $table) {
            $table->foreign("book_id")->references("id")->on("books")->onDelete("set null");
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
        Schema::dropIfExists("book_library");
    }
}
