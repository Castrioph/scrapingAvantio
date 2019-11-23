<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feed;
use Faker\Generator as Faker;

$factory->define(Feeds::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->body,
        'image' => $faker->image,
        'source' => $faker->source,
        'publisher' => $faker->publisher,
    ];
});
