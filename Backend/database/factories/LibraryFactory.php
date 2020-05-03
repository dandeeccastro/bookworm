<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Library;
use Faker\Generator as Faker;

$factory->define(Library::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "sort_by" => "Dewer",
        "ticket_mode" => "Dewer",
        "book_amount" => 0
    ];
});
