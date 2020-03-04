<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{

    protected $fillable=[
        'dni','nombre','apellido1','apellido2', 'telefono','fNacimiento','foto'
        ];
    protected $primaryKey='dni';
}
