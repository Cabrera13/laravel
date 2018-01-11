<?php

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->words( 2, true),
        'type' => $faker->word,
        'price' => $faker->randomFloat(2, 5,60),
        'image' => $faker->imageUrl(640, 480),
        'author' => $faker->name,
    ];
});