<?php

use Illuminate\Database\Seeder;
use App\Coordenada;
class CoordenadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Coordenada::class, 2)->create();//
    }
}
