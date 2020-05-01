<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("edition")->nullable();
            $table->integer("year")->unsigned();
            $table->integer("series_position")->unsigned()->nullable();
            $table->unsignedBigInteger("publisher_id")->nullable();
            $table->unsignedBigInteger("author_id")->nullable();
            $table->unsignedBigInteger("series_id")->nullable();
            $table->timestamps();
        });
        Schema::table("books", function (Blueprint $table) {
            $table->foreign("publisher_id")->references("id")->on("publishers")->onDelete("set null");
            $table->foreign("author_id")->references("id")->on("authors")->onDelete("set null");
            $table->foreign("series_id")->references("id")->on("series")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
