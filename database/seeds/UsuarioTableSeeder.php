<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            ['IDUsuario' => null,
            'esAdmin' => true,
            'Nombre' => 'Nombre Prueba1',
            'Email' => 'prueba1@gmail.com',
            'Nacimiento' => '1995-01-01 0:00:00',
            'Bloqueado' => false,
            'Password' => 'prueba1',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => false,
            'Nombre' => 'Nombre Prueba2',
            'Email' => 'prueba2@gmail.com',
            'Nacimiento' => '1995-01-01 0:00:00',
            'Bloqueado' => false,
            'Password' => 'prueba2',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => false,
            'Nombre' => 'Nombre Prueba3',
            'Email' => 'prueba3@gmail.com',
            'Nacimiento' => '1995-01-01 0:00:00',
            'Bloqueado' => true,
            'Password' => 'prueba3',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => true,
            'Nombre' => 'Santiago Torrabadella Ferrer',
            'Email' => 'santi_torri97@hotmail.com',
            'Nacimiento' => '1997-02-06 0:00:00',
            'Bloqueado' => false,
            'Password' => 'passSanti',
            'created_at' => date('Y-m-d H:i:s')]
        ];
            
        foreach ($usuarios as $usuario) {
            DB::table('Usuario')->insert([
                'IDUsuario' => $usuario['IDUsuario'],
                'esAdmin' => $usuario['esAdmin'],
                'Nombre' => $usuario['Nombre'],
                'Email' => $usuario['Email'],
                'Nacimiento' => $usuario['Nacimiento'],
                'Bloqueado' => $usuario['Bloqueado'],
                'Password' => Hash::make($usuario['Password']),
                'created_at' => $usuario['created_at']
            ]);
        }
    }
}
