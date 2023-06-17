<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
           
                'email' => 'required|email|exists:users',
                'password' => ['required', 'max:255', 'string', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
                'password_confirmation' => ['required', 'same:password']
           
        ];
    }


    public function messages()
    {
        return [

                'required' => 'Este campo é obrigatório!',
                'email.email' => 'Email inválido.',
                'email.exists' => 'Email incorreto.',
                'password' => 'A senha não é válida!',
                'max' => 'Máximo de 255 caracteres.',
                'password_confirmation.same' => 'As senhas precisam ser iguais.'
        ];
    }
}
