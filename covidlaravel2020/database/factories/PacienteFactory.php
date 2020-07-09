<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->name,
        'apellido'=>$faker->lastName,
        'CI'=>12,
        'correo'=>$faker->unique()->safeEmail,
        'Celular'=>20,
        
        //
    ];
});
