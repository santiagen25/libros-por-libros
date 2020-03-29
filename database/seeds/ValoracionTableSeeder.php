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
            'Puntuacion' => 8,
            'MeGusta' => 0,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 1],

            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado este libro',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion',
            'Puntuacion' => 10,
            'MeGusta' => 0,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 2],

            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado el libro Las Pruebas',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion',
            'Puntuacion' => 6,
            'MeGusta' => 0,
            'IDLibroFK' => 2,
            'IDUsuarioFK' => 1]
        ];
            
        foreach ($valoraciones as $valoracion) {
            DB::table('valoracion')->insert([
                'IDValoracion' => $valoracion['IDValoracion'],
                'Titulo' => $valoracion['Titulo'],
                'Comentario' => $valoracion['Comentario'],
                'Puntuacion' => $valoracion['Puntuacion'],
                'MeGusta' => $valoracion['MeGusta'],
                'IDLibroFK' => $valoracion['IDLibroFK'],
                'IDUsuarioFK' => $valoracion['IDUsuarioFK']
            ]);
        }
    }
}
