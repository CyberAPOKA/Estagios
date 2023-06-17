<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CitySeeder::class,
            CourseSeeder::class,
            DistrictSeeder::class,
            EducationSeeder::class,
            UserSeeder::class,
            UserProfileSeeder::class,
            AdminSeeder::class,
            UserAddressSeeder::class,
            UserFormationSeeder::class,
            DepartamentSeeder::class,
            // RequestSeeder::class,
            RequestCourseSeeder::class,
            // ProgressSeeder::class,
            // ResumeSeeder::class
        ]);
    }
}
