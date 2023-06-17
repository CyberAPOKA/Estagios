<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;
use App\Models\UserFormation;
use App\Models\UserExperience;
use App\Models\UserSocial;
use App\Models\UserFile;

use App\Models\City;
use App\Models\District;
use App\Models\Courses;
use App\Models\Education;


class RegisterController extends Controller
{
    public function create()
    {
        $cities = City::all();
        $districts = District::all();
        $courses = Courses::all();
        $educations = Education::all();

        return view('auth.register', compact('cities', 'districts', 'courses', 'educations'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'unique', 'email'],
                'password' => ['required', 'max:255', 'string', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
                'password_confirmation' => ['required', 'same:password'],

                'name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
                'social_name' =>  ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
                'cpf' => ['required', 'size:11', 'cpf'],
                'rg' => ['required', 'cpf', 'min:9', 'max:10'],
                'home_phone' => ['required', 'regex:/^\(\d{2}\) \d{4}-\d{4}$/'],
                'cell_phone' => ['required', 'regex:/^\(\d{2}\) \d{1} \d{4}-\d{4}$/'],
                'fathers_name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
                'mothers_name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
                'birth_date' => ['required', 'date'],
                'race'  => ['required'],

                'city' => ['required'],
                'number' => ['required'],
                'district' => ['required'],
                'zip_code' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/'],
                'street' => ['required'],

                'education' => ['required'],
                'course' => ['required'],
                'semester' => ['required'],
                'shift' => ['required'],
                'institution' => ['required'],
                'situation' => ['required'],

                'certifications' => ['required'],
                'other_knowledges' => ['required'],
                'professional_experiences' => ['required'],
                'cityhall_trainee' => ['required'],
            ],
            [
                'required' => 'Este campo é obrigatório!',
                'email.email' => 'Email inválido.',
                'password.regex' => 'A senha não é válida!',
                'max' => 'Máximo de 255 caracteres.',
                'password_confirmation.same' => 'As senhas precisam ser iguais.',

                'name.regex' => 'O nome não deve conter números ou caracteres especiais',
                'social_name.regex' => 'O nome não deve conter números ou caracteres especiais',
                'cpf.size' => 'Este campo deve ter 11 dígitos!',
                'cpf.cpf' => 'CPF inválido',
                'home_phone.regex' => 'Número de telefone residencial inválido!',
                'cell_phone.regex' => 'Número de telefone inválido!',
                'fathers_name.regex' => 'O nome não deve conter números ou caracteres especiais',
                'mothers_name.regex' => 'O nome não deve conter números ou caracteres especiais',
                'birth_date' => 'Este campo deve ser uma data válida!',

                'zip_code.regex' => 'Este campo deve ser um CEP válido!',

            ]
        );

        $user = User::create(
            [
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]
        );

        UserProfile::create(
            [
                'user_id' => $user->id,
                'name' => $request->input('name'),
                'social_name' => $request->input('social_name'),
                'cpf' => $request->input('cpf'),
                'rg' => $request->input('rg'),
                'home_phone' => $request->input('home_phone'),
                'cell_phone' => $request->input('cell_phone'),
                'fathers_name' => $request->input('fathers_name'),
                'mothers_name' => $request->input('mothers_name'),
                'birth_date' => $request->input('birth_date'),
                'deficiency' => $request->input('deficiency'),
                'race' => $request->input('race')
            ]
        );

        UserAddress::create(
            [
                'user_id' => $user->id,
                'city' => $request->input('city'),
                'number' => $request->input('number'),
                'district' => $request->input('district'),
                'zip_code' => $request->input('zip_code'),
                'complement' => $request->input('complement'),
                'street' => $request->input('street')
            ]
        );

        UserFormation::create(
            [
                'user_id' => $user->id,
                'education' => $request->input('education'),
                'course' => $request->input('course'),
                'semester' => $request->input('semester'),
                'shift' => $request->input('shift'),
                'institution' => $request->input('institution'),
                'situation' => $request->input('situation')
            ]
        );

        UserExperience::create(
            [
                'user_id' => $user->id,
                'certifications' => $request->input('certifications'),
                'other_knowledges' => $request->input('other_knowledges'),
                'professional_experiences' => $request->input('professional_experiences'),
                'cityhall_trainee' => $request->input('cityhall_trainee'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'secretary' => $request->input('secretary')
            ]
        );

        UserSocial::create(
            [
                'user_id' => $user->id,
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
                'linkedin' => $request->input('linkedin'),
                'others' => $request->input('others'),
                'links' => $request->input('links')
            ]
        );

        if (!empty($request->allFiles()["file"])) {
            for ($i = 0; $i < count($request->allFiles()["file"]); $i++) {
                $file = $request->allFiles()["file"][$i];

                $UserFile = new UserFile();
                $UserFile->user_id = $user->id;
                $UserFile->name = $file->getClientOriginalName();
                $UserFile->type = $file->getClientOriginalExtension();
                $UserFile->file_path = $file->store('curriculums/' . $user->id);
                $UserFile->save();
            }
        }

        return redirect('/login');
    }
}
