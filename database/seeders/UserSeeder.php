<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserExperience;
use App\Models\UserFormation;
use App\Models\UserProfile;
use App\Models\UserSocial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Courses;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $courses = Courses::all();

        $christian = User::create([
            'email'         => 'dev@hotmail.com',
            'password'      => Hash::make('123123123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserProfile::create([
            'user_id'       => $christian->getKey(),
            'name'          => 'Christian André Steffens',
            'social_name'   => 'APOKA',
            'cpf'           => '999.999.999-99',
            'rg'            => '999.999.999-99',
            'home_phone'    => '51 3635-9999',
            'cell_phone'    => '51 99999-9999',
            'fathers_name'  => 'fathers name',
            'mothers_name'  => 'mothers name',
            'birth_date'    => '01-01-2000',
            'deficiency'    => '',
            'race'          => 'white',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserAddress::create([
            'user_id'       => $christian->getKey(),
            'city'          => 'city',
            'district'      => 'district',
            'number'        => '99',
            'zip_code'      => 'zip_code',
            'complement'    => 'complement',
            'street'        => 'street',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserFormation::create([
            'user_id'           => $christian->getKey(),
            'education'         => $faker->randomElement(['Ensino Médio', 'Ensino Técnico', 'Ensino Superior']),
            'course'            => $faker->randomElement($courses->pluck('course')->toArray()),
            'semester'          => $faker->randomDigit . 'º',
            'shift'             => $faker->randomElement(['Manhã', 'Tarde', 'Noite']),
            'institution'       => $faker->catchPhrase,
            'situation'         => $faker->randomElement(['Em andamento', 'Finalizado', 'Trancado']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserExperience::create([
            'user_id'                   => $christian->getKey(),
            'certifications'            => 'certifications',
            'other_knowledges'          => 'other_knowledges',
            'professional_experiences'  => 'professional_experiences',
            'cityhall_trainee'          => 'yes',
            'start_date'                => '01-01-2020',
            'end_date'                  => '01-01-2025',
            'secretary'                 => 'SEMAD',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        UserSocial::create([
            'user_id'           => $christian->getKey(),
            'instagram'         => 'instagram',
            'facebook'          => 'facebook',
            'linkedin'          => 'linkedin',
            'others'            => 'others',
            'links'             => 'links',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'email' => $faker->unique()->email,
                'password' => bcrypt('S3nHaD3v!'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
