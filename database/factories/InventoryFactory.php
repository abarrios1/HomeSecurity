<?php

use Faker\Generator as Faker;

$factory->define(App\inventory::class, function (Faker $faker) {
    return [
        'uid' => $faker->uuid,
        'mac' => $faker->macAddress,
        'manufacturer' => $faker->company, 
        'model' => $faker->swiftBicNumber, 
        'serial' => $faker->swiftBicNumber, 
        'product' => $faker->swiftBicNumber, 
        'vendor' => $faker->company, 
        'dateIssued' => $faker->dateTime($max = 'now', $timezone = null), 
        
    ];
});
