<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable=[
        'dni','nombre','apellido1','apellido2','telefono','fNacimiento','foto',
        ];

    //importante para poder asignar la primarykey a un string(DNI)
    protected $primaryKey = 'dni'; // or null

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
}
