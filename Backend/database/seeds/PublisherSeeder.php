<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("publishers")->insert(["name"=>"Publisher Teste Numero 1", "information" => "Uma publisher de teste de role"]);
        DB::table("publishers")->insert(["name"=>"Publisher Teste Numero 2", "information" => "Uma publisher de teste de role"]);
        DB::table("publishers")->insert(["name"=>"Publisher Teste Numero 3", "information" => "Uma publisher de teste de role"]);
        DB::table("publishers")->insert(["name"=>"Publisher Teste Numero 4", "information" => "Uma publisher de teste de role"]);
    }
}
