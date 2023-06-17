<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\District;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $cities = City::all();
        $districts = District::all();

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $user) {
            DB::table('user_addresses')->insert([
                'user_id'       => $user->id,
                'city'          => $cities->random()->city,
                'district'      => $districts->random()->district,
                'number'        => $faker->buildingNumber,
                'zip_code'      => $faker->postcode,
                'complement'    => $faker->citySuffix,
                'street'        => $faker->streetName,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);
        }
    }
}
