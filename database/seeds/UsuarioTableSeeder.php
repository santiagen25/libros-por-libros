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
            'Nombre' => 'Libros por Libros Cuenta Oficial',
            'Email' => 'librosporlibros2@gmail.com',
            'Nacimiento' => '2019-09-20 0:00:00',
            'Bloqueado' => false,
            'Password' => 'Libros2',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => true,
            'Nombre' => 'Angel Adam',
            'Email' => 'angel_adam@hotmail.es',
            'Nacimiento' => '2001-01-01 0:00:00',
            'Bloqueado' => false,
            'Password' => 'angel',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => false,
            'Nombre' => 'Santiago Torrabadella Ferrer',
            'Email' => 'santiagen25@gmail.com',
            'Nacimiento' => '1997-02-06 0:00:00',
            'Bloqueado' => true,
            'Password' => 'passSanti',
            'created_at' => date('Y-m-d H:i:s')],

            ['IDUsuario' => null,
            'esAdmin' => true,
            'Nombre' => 'Santi Torri',
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
