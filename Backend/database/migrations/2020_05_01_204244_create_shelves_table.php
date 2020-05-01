<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->integer("rows")->unsigned();
            $table->unsignedBigInteger("capacity");
            $table->unsignedBigInteger("index");
            $table->unsignedBigInteger("library_id")->nullable();
            $table->timestamps();
        });
        Schema::table("shelves", function (Blueprint $table) {
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
        Schema::dropIfExists('shelves');
    }
}
