<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        //
        "name" => $faker->title,
        "owner->id" => function(){
            return factory(App\User::class)->create()->id;
        },
        "created_at" => $now,
        "updated_at" => $now,
        "desc" => $faker->sentence
    ];
});
