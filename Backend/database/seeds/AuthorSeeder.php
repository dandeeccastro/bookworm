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
        DB::table("authors")->insert(["name" => "Autor Teste Numero 1", "surname" => "Sobrenome Brabo Maaaaaan"]);
        DB::table("authors")->insert(["name" => "Autor Teste Numero 2", "surname" => "Sobrenome Brabo Maaaaaan"]);
        DB::table("authors")->insert(["name" => "Autor Teste Numero 3", "surname" => "Sobrenome Brabo Maaaaaan"]);
        DB::table("authors")->insert(["name" => "Autor Teste Numero 4", "surname" => "Sobrenome Brabo Maaaaaan"]);
    }
}
