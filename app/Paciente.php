<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{


    //importante para poder asignar la primarykey a un string(DNI)
    protected $primaryKey = 'dni'; // or null

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
}
