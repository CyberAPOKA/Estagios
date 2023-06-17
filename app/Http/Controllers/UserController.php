<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Courses;
use App\Models\Education;
use App\Models\UserFile;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    public function test()
    {
        return view('test');
    }

    public function editProfile()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('users.edit.edit-profile', compact('user', 'profile'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // $request->validate(
        //     [
        //         'name' => ['required', 'string', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
        //         'social_name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
        //         'cpf' => ['required', 'size:11'],
        //         'rg' => ['required', 'min:9', 'max:10'],
        //         'home_phone' => ['required', 'regex:/^\(\d{2}\) \d{4}-\d{4}$/'],
        //         'cell_phone' => ['required', 'regex:/^\(\d{2}\) \d{1} \d{4}-\d{4}$/'],
        //         'fathers_name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
        //         'mothers_name' => ['required', 'regex:/^(?!(\b\p{L}+\b)$)[\p{L} ]*$/'],
        //         'birth_date' => ['required', 'date'],
        //         'race'  => ['required'],

        //     ],
        //     [
        //         'required' => 'O campo é obrigatório.',
        //         'name.regex' => 'O nome deve conter no mínimo 2 palavras e não deve conter números ou caracteres especiais.',
        //         'social_name.regex' => 'O nome deve conter no mínimo 2 palavras e não deve conter números ou caracteres especiais.',
        //         'cpf.size' => 'Este campo deve ter 11 dígitos!',
        //         'home_phone.regex' => 'Número de telefone residencial inválido!',
        //         'cell_phone.regex' => 'Número de telefone inválido!',
        //         'fathers_name.regex' => 'O nome não deve conter números ou caracteres especiais.',
        //         'mothers_name.regex' => 'O nome não deve conter números ou caracteres especiais.',
        //         'birth_date.date' => 'Este campo deve ser uma data válida!',

        //     ]
        // );

        try {
            $user->profile->update([
                'name' => $request->name,
                'social_name' => $request->social_name,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'birth_date' => $request->birth_date,
                'home_phone' => $request->home_phone,
                'cell_phone' => $request->cell_phone,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'deficiency' => $request->deficiency,
                'race' => $request->race
            ]);

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function editAddress()
    {
        $user = Auth::user();
        $address = $user->address;
        $cities = City::all();
        $districts = District::all();
        return view('users.edit.edit-address', compact('user', 'address', 'cities', 'districts'));
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        // $request->validate(
        //     [
        //         'city' => ['required'],
        //         'number' => ['required'],
        //         'district' => ['required'],
        //         'zip_code' => ['required', 'regex:/^[0-9]{5}-[0-9]{3}$/'],
        //         'street' => ['required'],
        //     ],
        //     [
        //         'required' => 'Este campo é obrigatório!',
        //         'zip_code.regex' => 'Este campo deve ser um CEP válido!',

        //     ]
        // );

        try {
            $data = [
                'city' => $request->city,
                'district' => $request->district,
                'number' => $request->number,
                'zip_code' => $request->zip_code,
                'street' => $request->street,
                'complement' => $request->complement,
            ];

            $data = array_filter($data, function ($value) {
                return !empty($value) || $value === 0;
            });

            if (!isset($data['complement']) || empty($data['complement'])) {
                $data['complement'] = null;
            }

            $user->address->update($data);

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function editFormation()
    {
        $user = Auth::user();
        $formation = $user->formation;
        $courses = Courses::all();
        $educations = Education::all();
        return view('users.edit.edit-formation', compact('user', 'formation', 'courses', 'educations'));
    }

    public function updateFormation(Request $request)
    {
        $user = Auth::user();

        // $request->validate(
        //     [
        //         'education' => ['required'],
        //         'course' => ['required'],
        //         'semester' => ['required'],
        //         'shift' => ['required'],
        //         'institution' => ['required'],
        //         'situation' => ['required'],

        //     ],
        //     [
        //         'required' => 'Este campo é obrigatório!',
        //     ]
        // );

        try {
            $user->formation->update([
                'education' => $request->education,
                'course' => $request->course,
                'semester' => $request->semester,
                'shift' => $request->shift,
                'institution' => $request->institution,
                'situation' => $request->situation,
            ]);

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function editExperience()
    {
        $user = Auth::user();
        $experience = $user->experience;
        return view('users.edit.edit-experience', compact('user', 'experience'));
    }

    public function updateExperience(Request $request)
    {
        $user = Auth::user();

        // $request->validate(
        //     [
        //         'certifications' => ['required'],
        //         'other_knowledges' => ['required'],
        //         'professional_experiences' => ['required'],
        //         'cityhall_trainee' => ['required'],
        //     ],
        //     [
        //         'required' => 'Este campo é obrigatório!',
        //     ]
        // );

        try {
            $user->experience->update([
                'certifications' => $request->certifications,
                'other_knowledges' => $request->other_knowledges,
                'semprofessional_experiencesester' => $request->professional_experiences,
                'cityhall_trainee' => $request->cityhall_trainee,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'secretary' => $request->secretary,
            ]);

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function editSocial()
    {
        $user = Auth::user();
        $social = $user->social;
        return view('users.edit.edit-social', compact('user', 'social'));
    }

    public function updateSocial(Request $request)
    {
        $user = Auth::user();

        try {
            $user->social->update([
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'others' => $request->others,
                'links' => $request->links
            ]);

            return redirect()->back()->with('success', 'Perfil atualizado!');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Ocorreu um erro!');
        }
    }

    public function editAccount()
    {
        $user = Auth::user();

        return view('users.edit.edit-account', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $request->validate(
            [
                'old_password' => ['required'],
                'new_password' => ['required', 'max:255', 'string', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'required' => 'Este campo é obrigatório!',
                'new_password.regex' => 'A senha não é válida!',
                'max' => 'Máximo de 255 caracteres.',
                'password_confirmation.same' => 'As senhas precisam ser iguais.',

            ]
        );
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with("error", "A senha antiga não corresponde");
        }

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with("success", "Senha alterada com sucesso!");
    }

    public function editFile()
    {
        $user = Auth::user();
        $files = $user->files;
        return view('users.edit.edit-file', compact('user', 'files'));
    }

    // public function updateFile(Request $request)
    // {
    //     $user = Auth::user();
    //     $existingFilesCount = UserFile::where('user_id', $user->id)->count();
    //     $allowedFilesCount = 5;

    //     if ($existingFilesCount >= $allowedFilesCount) {
    //         return redirect()->back()->with('error', 'Você atingiu o limite máximo de arquivos permitidos.')->setStatusCode(422);
    //     }

    //     if (!empty($request->allFiles()["file"])) {
    //         $newFilesCount = count($request->allFiles()["file"]);
    //         $totalFilesCount = $existingFilesCount + $newFilesCount;

    //         if ($totalFilesCount > $allowedFilesCount) {
    //             return redirect()->back()->with('error', 'Você pode enviar no máximo ' . $allowedFilesCount . ' arquivos.');
    //         }

    //         if (!empty($request->allFiles()["file"])) {
    //             for ($i = 0; $i < count($request->allFiles()["file"]); $i++) {
    //                 $file = $request->allFiles()["file"][$i];

    //                 $UserFile = new UserFile();
    //                 $UserFile->user_id = $user->id;
    //                 $UserFile->name = $file->getClientOriginalName();
    //                 $UserFile->type = $file->getClientOriginalExtension();
    //                 $UserFile->file_path = $file->store('curriculums/' . $user->id);
    //                 $UserFile->save();
    //             }
    //         }
    //     }
    // }

    public function updateFile(Request $request)
    {
        $user = Auth::user();
        $existingFilesCount = UserFile::where('user_id', $user->id)->count();
        $allowedFilesCount = 5;

        if ($existingFilesCount >= $allowedFilesCount) {
            return response()->json(['error' => 'Você atingiu o limite máximo de arquivos permitidos.'], 422);
        }

        if (!empty($request->allFiles()["file"])) {
            $newFilesCount = count($request->allFiles()["file"]);
            $totalFilesCount = $existingFilesCount + $newFilesCount;

            if ($totalFilesCount > $allowedFilesCount) {
                return response()->json(['error' => 'Você pode enviar no máximo ' . $allowedFilesCount . ' arquivos.'], 422);
            }

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
        }

        return response()->json(['message' => 'Arquivo(s) salvos com sucesso!']);
    }


    public function downloadFile($user_id, $file_path, $file_original_name)
    {
        $path = storage_path('app/curriculums/' . $user_id . '/' . $file_path);

        if (file_exists($path)) {
            return response()->download($path, $file_original_name);
        } else {
            return abort(404, 'File not found');
        }
    }

    public function deleteFile($user_id, $filename)
    {
        $file_path = storage_path('app/curriculums/' . $user_id . '/' . $filename);

        $file_path_delete = ('curriculums/' . $user_id . '/' . $filename);

        if (file_exists($file_path)) {
            unlink($file_path);

            $userFile = UserFile::where('user_id', $user_id)
                ->where('file_path', $file_path_delete)
                ->first();

            $userFile->delete();


            return response()->json(['message' => 'Arquivo excluído com sucesso']);
        } else {
            return response()->json(['message' => 'Arquivo não encontrado'], 404);
        }
    }
}
