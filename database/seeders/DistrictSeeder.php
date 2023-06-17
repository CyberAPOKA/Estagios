<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(
            [
                ['district' => 'Centro'],
                ['district' => 'Scharlau'],
                ['district' => 'Feitoria'],
                ['district' => 'Morro do Espelho'],
                ['district' => 'Campina'],
                ['district' => 'Cristo Rei'],
                ['district' => 'Jardim América'],
                ['district' => 'Rio dos Sinos'],
                ['district' => 'São Miguel'],
                ['district' => 'Santo André'],
                ['district' => 'Pinheiro'],
                ['district' => 'Santos Dumont'],
                ['district' => 'Arroio da Manteiga'],
                ['district' => 'Rio Branco'],
                ['district' => 'São José'],
                ['district' => 'Santa Teresa'],
                ['district' => 'Padre Reus'],
                ['district' => 'Campestre'],
                ['district' => 'Duque de Caxias'],
                ['district' => 'Vicentina'],
                ['district' => 'São João Batista'],
                ['district' => 'Fião'],
                ['district' => 'Boa Vista'],
                ['district' => 'Fazenda São Borja'],
                ['district' => 'Loteamento Parque Recreio'],
                ['district' => 'Zona Rural']
            ]
        );
    }
}
