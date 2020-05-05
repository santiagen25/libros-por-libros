<?php

use Illuminate\Database\Seeder;

class Usuario_LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relaciones = [
            ['IDLibroFK2' => 1,
            'IDUsuarioFK3' => 1,
            'IDMezcla' => '1_1',
            'Relacion' => 1,
            'Favorito' => 1,
            'created_at' => date('Y-m-d H:i:s')],

            ['IDLibroFK2' => 2,
            'IDUsuarioFK3' => 1,
            'IDMezcla' => '2_1',
            'Relacion' => 1,
            'Favorito' => 0,
            'created_at' => date('Y-m-d H:i:s')]
        ];
            
        foreach ($relaciones as $relacion) {
            DB::table('Usuario_Libro')->insert([
                'IDLibroFK2' => $relacion['IDLibroFK2'],
                'IDUsuarioFK3' => $relacion['IDUsuarioFK3'],
                'IDMezcla' => $relacion['IDMezcla'],
                'Relacion' => $relacion['Relacion'],
                'Favorito' => $relacion['Favorito'],
                'created_at' => $relacion['created_at']
            ]);
        }
    }
}
