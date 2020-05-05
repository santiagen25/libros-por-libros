<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsuarioTableSeeder::class,
            LibroTableSeeder::class,
            ValoracionTableSeeder::class,
            Usuario_LibroTableSeeder::class,
            Usuario_ValoracionTableSeeder::class,
        ]);
    }
}
