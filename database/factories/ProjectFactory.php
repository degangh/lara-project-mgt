<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
        
    return [
        //
        "name" => $faker->title,
        "owner_id" => function(){
            return factory(App\User::class)->create()->id;
        },
        "desc" => $faker->sentence
    ];
});
