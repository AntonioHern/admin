<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required',
            'apellido1'=>'required|max:255',
            'apellido2'=>'required|max:255',
            'foto'=> 'image|mimes:jpeg,png|max:3000',
            'password' => 'min:6',
        ];
    }
}
