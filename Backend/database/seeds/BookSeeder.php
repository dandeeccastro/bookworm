<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("books")->insert(["title" => "Livro de Teste Numero 1", "description" => "Rodando um teste aqui de role", "author_id" => 1, "publisher_id" => 1]);
        DB::table("books")->insert(["title" => "Livro de Teste Numero 2", "description" => "Rodando um teste aqui de role", "author_id" => 1, "publisher_id" => 1]);
        DB::table("books")->insert(["title" => "Livro de Teste Numero 3", "description" => "Rodando um teste aqui de role", "author_id" => 1, "publisher_id" => 1]);
        DB::table("books")->insert(["title" => "Livro de Teste Numero 4", "description" => "Rodando um teste aqui de role", "author_id" => 1, "publisher_id" => 1]);
    }
}
