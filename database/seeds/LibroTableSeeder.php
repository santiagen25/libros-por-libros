<?php

use Illuminate\Database\Seeder;

class LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libros = [
            ['IDLibro' => null,
            'Autor' => 'Autor Prueba1',
            'Descripcion' => 'Descripcion del Libro Prueba1',
            'Nombre' => 'Libro Prueba1',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 1],

            ['IDLibro' => null,
            'Autor' => 'Autor Prueba2',
            'Descripcion' => 'Descripcion del Libro Prueba2',
            'Nombre' => 'Libro Prueba2',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 2],

            ['IDLibro' => null,
            'Autor' => 'Autor Prueba3',
            'Descripcion' => 'Descripcion del Libro Prueba3',
            'Nombre' => 'Libro Prueba3',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 3]
        ];
            
        foreach ($libros as $libro) {
            DB::table('libro')->insert([
                'IDLibro' => $libro['IDLibro'],
                'Autor' => $libro['Autor'],
                'Descripcion' => $libro['Descripcion'],
                'Nombre' => $libro['Nombre'],
                'Genero' => $libro['Genero'],
                'ISBN' => $libro['ISBN']
            ]);
        }
    }
}
