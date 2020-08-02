<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coordenada;
use Faker\Generator as Faker;

$factory->define(Coordenada::class, function (Faker $faker) {
    return [
        'latitud'=> 50,
        'longitud'=>50,
        //
    ];
});
