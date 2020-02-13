<?php

use Illuminate\Database\Seeder;

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
            'Nacimiento' => null,
            'Bloqueado' => false,
            'Password' => 'prueba1'],

            ['IDUsuario' => null,
            'esAdmin' => false,
            'Nombre' => 'Nombre Prueba2',
            'Email' => 'prueba2@gmail.com',
            'Nacimiento' => null,
            'Bloqueado' => false,
            'Password' => 'prueba2'],

            ['IDUsuario' => null,
            'esAdmin' => false,
            'Nombre' => 'Nombre Prueba3',
            'Email' => 'prueba3@gmail.com',
            'Nacimiento' => null,
            'Bloqueado' => true,
            'Password' => 'prueba3']
        ];
            
        foreach ($usuarios as $usuario) {
            DB::table('Usuario')->insert([
                'IDUsuario' => $usuario['IDUsuario'],
                'esAdmin' => $usuario['esAdmin'],
                'Nombre' => $usuario['Nombre'],
                'Email' => $usuario['Email'],
                'Nacimiento' => $usuario['Nacimiento'],
                'Bloqueado' => $usuario['Bloqueado'],
                'Password' => $usuario['Password']
            ]);
        }
    }
}
