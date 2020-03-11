<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dni'=>'regex:"[0-9]{8}[A-Za-z]{1}"',
            'nombre' => 'required|max:255',
            'apellido1'=>'required|max:255',
            'apellido2'=>'required|max:255',
            'telefono' => 'required|max:9',
            'fNacimiento' => 'required',
            'foto'=> 'image|mimes:jpeg,png|max:3000',

        ];
    }
}
