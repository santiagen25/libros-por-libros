<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function run()
    {
        $this->call([
            LikesTableSeeder::class,
        ]);
    }
}
