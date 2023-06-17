<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(
            [
                ['course' => 'Ensino Médio', 'education_id' => '1'],
                ['course' => 'Técnico em Informática', 'education_id' => '2'],
                ['course' => 'Técnico em Contabilidade', 'education_id' => '2'],
                ['course' => 'Técnico em Meio Ambiente', 'education_id' => '2'],
                ['course' => 'Administração', 'education_id' => '3'],
                ['course' => 'Administração Pública e Social', 'education_id' => '3'],
                ['course' => 'Agronomia', 'education_id' => '3'],
                ['course' => 'Análise e Desenvolvimento de Sistemas', 'education_id' => '3'],
                ['course' => 'Arquitetura e Urbanismo', 'education_id' => '3'],
                ['course' => 'Arquivologia', 'education_id' => '3'],
                ['course' => 'Artes Visuais', 'education_id' => '3'],
                ['course' => 'Biblioteconomia', 'education_id' => '3'],
                ['course' => 'Arquitetura e Urbanismo', 'education_id' => '3'],
                ['course' => 'Biologia', 'education_id' => '3'],
                ['course' => 'Biomedicina', 'education_id' => '3'],
                ['course' => 'Ciência da Computação', 'education_id' => '3'],
                ['course' => 'Ciências Contábeis', 'education_id' => '3'],
                ['course' => 'Ciências Econômicas', 'education_id' => '3'],
            ]
        );
    }
}
