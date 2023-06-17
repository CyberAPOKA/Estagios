<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $user) {
            DB::table('user_profiles')->insert([
                'user_id'       => $user->id,
                'name'          => $faker->name,
                'social_name'   => $faker->name,
                'cpf'           => $faker->unique()->randomNumber(9),
                'rg'            => $faker->unique()->randomNumber(9),
                'home_phone'    => $faker->phoneNumber(),
                'cell_phone'    => $faker->phoneNumber(),
                'fathers_name'  => $faker->name,
                'mothers_name'  => $faker->name,
                'birth_date'    => $faker->date(),
                'deficiency'    => implode(",", $faker->randomElements(['physical', 'intellectual', 'multiple', 'tea'], 2)),
                'race'          => $faker->randomElement(['white', 'black', 'yellow', 'indigenous', 'brown']),
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
