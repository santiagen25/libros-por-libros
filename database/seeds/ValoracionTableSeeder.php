<?php

use Illuminate\Database\Seeder;

class ValoracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valoraciones = [
            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado el libro prueba1',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion',
            'Puntuacion' => 0,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 1],

            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado el libro prueba2',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion',
            'Puntuacion' => 0,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 2],

            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado el libro prueba3',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion',
            'Puntuacion' => 0,
            'IDLibroFK' => 2,
            'IDUsuarioFK' => 1]
        ];
            
        foreach ($valoraciones as $valoracion) {
            DB::table('Valoraciones')->insert([
                'IDValoracion' => $valoraciones['IDValoracion'],
                'Titulo' => $valoraciones['Titulo'],
                'Comentario' => $valoraciones['Comentario'],
                'Puntuacion' => $valoraciones['Puntuacion'],
                'IDLibroFK' => $valoraciones['IDLibroFK'],
                'IDUsuarioFK' => $valoraciones['IDUsuarioFK']
            ]);
        }
    }
}
