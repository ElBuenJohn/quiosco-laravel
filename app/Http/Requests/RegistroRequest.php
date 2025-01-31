<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'string'],
            'email'=> ['required','email','unique:users,email'],
            'password'=> [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
           ]
        ];
    }

    public function messages()
    {
        return [
            'name' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no es valido',
            'email.unique' => 'El correo ya esta registrado',
            'password.unique' => 'la contraseña debe contener al menos 8 caracteres, un símbolo y un número'
        ];
    }
}
