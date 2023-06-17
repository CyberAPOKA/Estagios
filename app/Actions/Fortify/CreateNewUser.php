<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Core\Constants\UserRaces;
use App\Models\UserAddress;
use App\Models\UserExperience;
use App\Models\UserFormation;
use App\Models\UserProfile;
use App\Models\UserSocial;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'name' => $input['name'],
            'social_name' => $input['social_name'],
            'cpf' => $input['cpf'],
            'rg' => $input['rg'],
            'home_phone' => $input['home_phone'],
            'cell_phone' => $input['cell_phone'],
            'fathers_name' => $input['fathers_name'],
            'mothers_name' => $input['mothers_name'],
            'birth_date' => $input['birth_date'],
            'deficiency' => $input['deficiency'],
            'race' => $input['race'],
        ]);

        UserAddress::create([
            'user_id' => $user->id,
            'city' => $input['city'],
            'number' => $input['number'],
            'district' => $input['district'],
            'zip_code' => $input['zip_code'],
            'complement' => $input['complement'],
            'street' => $input['street']
        ]);

        UserFormation::create([
            'user_id' => $user->id,
            'education' => $input['education'],
            'course' => $input['course'],
            'semester' => $input['semester'],
            'shift' => $input['shift'],
            'institution' => $input['institution'],
            'situation' => $input['situation']
        ]);

        UserExperience::create([
            'user_id' => $user->id,
            'certifications' => $input['certifications'],
            'other_knowledges' => $input['other_knowledges'],
            'professional_experiences' => $input['professional_experiences'],
            'cityhall_trainee' => $input['cityhall_trainee'],
            'start_date' => $input['start_date'],
            'end_date' => $input['end_date'],
            'secretary' => $input['secretary']
        ]);

        UserSocial::create([
            'user_id' => $user->id,
            'instagram' => $input['instagram'],
            'facebook' => $input['facebook'],
            'linkedin' => $input['linkedin'],
            'others' => $input['others'],
            'links' => $input['links']
        ]);

        // if ($request->hasFile('file_path')) {
        //     $path = $request->file('file_path')->store('currículos');
        // }

        return $user;
    }
}
