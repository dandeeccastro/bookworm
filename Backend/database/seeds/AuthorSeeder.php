<?php

use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert(["name" => "J. K. Rowling"]);
        DB::table('authors')->insert(["name" => "Tom Clancy"]);
        DB::table('authors')->insert(["name" => "Arthur Conan Doyle"]);
        DB::table('authors')->insert(["name" => "Haruki Murakami"]);
        DB::table('authors')->insert(["name" => "Mia Couto"]);
        DB::table('authors')->insert(["name" => "Leonardo Padura"]);
        DB::table('authors')->insert(["name" => "Jorge Amado"]);
        DB::table('authors')->insert(["name" => "Machado de Assis"]);
    }
}
