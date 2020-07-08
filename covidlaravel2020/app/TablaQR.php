<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablaQR extends Model
{
    protected $table='TablaQR';
    protected $fillable = [
        'id','remember_token','impreso',
    ];
}
