<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuthorBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("author_book",function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("author_id")->nullable();
            $table->unsignedBigInteger("book_id")->nullable();
        });
        Schema::table("author_book",function (Blueprint $table){
            $table->foreign("author_id")->references("id")->on("authors")->onDelete("set null");
            $table->foreign("book_id")->references("id")->on("books")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("author_book");
    }
}
