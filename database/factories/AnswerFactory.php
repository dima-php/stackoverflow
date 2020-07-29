<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'question_id' => \App\Models\Question::all()->random()->id,
        'body' => $faker->text(rand(50, 200)),
        'votes_count' => rand(0, 200),
    ];
});
