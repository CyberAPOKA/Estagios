<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Core\Constants\AdminTypes;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ADMINISTRADOR
        DB::table('admins')->insert([
            'email'         => 'admin@argon.com',
            'password'      => Hash::make('secret'),
            'name'          => 'Admin',
            'type'          => AdminTypes::ADMIN,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        //RECRUTADOR
        DB::table('admins')->insert([
            'email'         => 'recruiter@argon.com',
            'password'      => Hash::make('secret'),
            'name'          => 'Recrutador',
            'type'          => AdminTypes::RECRUITER,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('admins')->insert([
            'email'         => 'administrative@argon.com',
            'password'      => Hash::make('secret'),
            'name'          => 'Administrativo',
            'type'          => AdminTypes::ADMINISTRATIVE,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        DB::table('admins')->insert([
            'email'         => 'secretary@argon.com',
            'password'      => Hash::make('secret'),
            'name'          => 'Secretaria',
            'type'          => AdminTypes::SECRETARY,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        //RH
        DB::table('admins')->insert([
            'email'         => 'rh@argon.com',
            'password'      => Hash::make('secret'),
            'name'          => 'RH',
            'type'          => AdminTypes::RH,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);
    }
}
