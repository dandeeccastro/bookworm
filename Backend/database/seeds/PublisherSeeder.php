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
        DB::table('publishers')->insert(["name" => "Editora ABC"]);
        DB::table('publishers')->insert(["name" => "Editora 123"]);
        DB::table('publishers')->insert(["name" => "Editora só que não"]);
    }
}
