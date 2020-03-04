<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable=[
        'id','paciente','nMedicina','dosis','cada','stock'
    ];

}
