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
        DB::table('books')->insert(["title" => "Spoppy", "year" => 1999, "edition" => "1a","author_id" => 1, "publisher_id" => 1]);
        DB::table('books')->insert(["title" => "Spooky", "year" => 1985, "edition" => "1a","author_id" => 2, "publisher_id" => 2]);
        DB::table('books')->insert(["title" => "Scary", "year" => 1958, "edition" => "1a","author_id" => 3, "publisher_id" => 3]);
        DB::table('books')->insert(["title" => "Ohnononon", "year" => 1899, "edition" => "1a","author_id" => 4, "publisher_id" => 1]);
        DB::table('books')->insert(["title" => "Plz no plz aaa", "year" => 2000, "edition" => "1a","author_id" => 5, "publisher_id" => 2]);
        DB::table('books')->insert(["title" => "Scawy", "year" => 1999, "edition" => "1a","author_id" => 6, "publisher_id" => 3]);
        DB::table('books')->insert(["title" => "N sei mais mano", "year" => 1977, "edition" => "1a","author_id" => 7, "publisher_id" => 1]);
        DB::table('books')->insert(["title" => "Isso é só pra teste", "year" => 1900, "edition" => "1a","author_id" => 8, "publisher_id" => 2]);
        DB::table('books')->insert(["title" => "N tem faker de title", "year" => 1000, "edition" => "1a","author_id" => 1, "publisher_id" => 3]);
        DB::table('books')->insert(["title" => "Então eu só choro", "year" => 1232, "edition" => "1a","author_id" => 2, "publisher_id" => 2]);
        DB::table('books')->insert(["title" => "Fé no pai", "year" => 199, "edition" => "1a","author_id" => 3, "publisher_id" => 1]);
        DB::table('books')->insert(["title" => "Que o inimigo cai", "year" => 1922, "edition" => "1a","author_id" => 4, "publisher_id" => 2]);
        DB::table('books')->insert(["title" => "Rajada de fé", "year" => 192, "edition" => "1a","author_id" => 5, "publisher_id" => 3]);
    }
}
