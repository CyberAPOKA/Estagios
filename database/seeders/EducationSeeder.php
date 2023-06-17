<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education')->insert(
            [
                ['education' => 'Ensino Médio'],
                ['education' => 'Ensino Técnico'],
                ['education' => 'Ensino Superior']

            ]
        );
    }
}
