<?php

use Faker\Generator as Faker;
use Carbon\Carbon;


$factory->define(App\Task::class, function (Faker $faker) {
    return [
        "project_id" => function(){},
        "name" => $faker->title,
        "user_id" => function(){},
        "due_time" => $faker->dateTimeBetween("now", "+2 years")->format("Y-m-d")
        
    ];
});