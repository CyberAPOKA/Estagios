<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserFormationSeeder extends Seeder
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

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $user) {
            DB::table('user_formations')->insert([
                'user_id'       => $user->id,
                'education'          => $faker->randomElement(['Ensino Médio', 'Ensino Técnico', 'Ensino Superior']),
                'course'      => $faker->randomElement($courses->pluck('course')->toArray()),
                'semester'        => $faker->randomDigit . 'º',
                'shift'          => $faker->randomElement(['Manhã', 'Tarde', 'Noite']),
                'institution'    => $faker->catchPhrase,
                'situation'          => $faker->randomElement(['Em andamento', 'Finalizado', 'Trancado']),
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
