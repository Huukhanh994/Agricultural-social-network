<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Poll;

$factory->define(Poll::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence
    ];
});
