<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Question;
use Faker\Generator as Faker;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(rand(100, 500)),
        'views'=>rand(0, 200),
        'answers'=>rand(0, 200),
        'votes'=>rand(0, 200),
        'user_id'=>\App\User::all()->random()->id,

    ];
});