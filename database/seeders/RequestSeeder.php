<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Core\Constants\RequestStatus;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $departamentIds = Departament::pluck('id')->toArray();

        foreach (range(1, 150) as $index) {
            DB::table('requests')->insert([
                'departament_id' => $faker->randomElement($departamentIds),
                'level' => $faker->randomElement(['Técnico', 'Médio', 'Superior']),
                'hiring_type' => $faker->randomElement(['new', 'replace']),
                'hiring_amount' => $faker->randomDigit(),
                'trainee_name' => $faker->name(),
                'secretary_phone' => $faker->phoneNumber(),
                'responsible' => $faker->name(),
                'information' => $faker->text(),
                'status' => $faker->randomElement(RequestStatus::values()),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
