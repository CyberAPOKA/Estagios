<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserAddress;
use App\Models\UserFormation;
use App\Models\UserExperience;
use App\Models\UserSocial;
use App\Models\UserFile;
class AuthController extends Controller
{

    public function register(Request $request)
    {
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
