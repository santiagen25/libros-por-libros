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
            'Titulo' => 'Me ha gustado el libro',
            'Comentario' => 'Ha sido un libro muy chulo, lo recomiendo a todo el mundo que le guste la ciencia ficcion.',
            'Puntuacion' => 8,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 1,
            'created_at' => date('Y-m-d H:i:s')],

            ['IDValoracion' => null,
            'Titulo' => 'No lo recomiendo...',
            'Comentario' => 'Me ha decepcionado bastante, no se lo recomiendo a nadie.',
            'Puntuacion' => 2,
            'IDLibroFK' => 1,
            'IDUsuarioFK' => 2,
            'created_at' => date('Y-m-d H:i:s')],

            ['IDValoracion' => null,
            'Titulo' => 'Me ha gustado el libro Las Pruebas',
            'Comentario' => 'Es el mejor de la trilogia, sin duda. Y eso que los demás son buenos.',
            'Puntuacion' => 6,
            'IDLibroFK' => 2,
            'IDUsuarioFK' => 1,
            'created_at' => date('Y-m-d H:i:s')]
        ];
            
        foreach ($valoraciones as $valoracion) {
            DB::table('valoracion')->insert([
                'IDValoracion' => $valoracion['IDValoracion'],
                'Titulo' => $valoracion['Titulo'],
                'Comentario' => $valoracion['Comentario'],
                'Puntuacion' => $valoracion['Puntuacion'],
                'IDLibroFK' => $valoracion['IDLibroFK'],
                'IDUsuarioFK' => $valoracion['IDUsuarioFK'],
                'created_at' => $valoracion['created_at']
            ]);
        }
    }
}
