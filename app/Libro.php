<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function run()
    {
        $this->call([
            LibroTableSeeder::class,
        ]);
    }
}
