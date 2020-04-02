<?php

use Illuminate\Database\Seeder;

class Usuario_ValoracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
            ['IDUsuarioFK4' => 1,
            'IDValoracionFK3' => 2,
            'IDMezcla' => '1_2',
            'created_at' => date('Y-m-d H:i:s')],
        ];
            
        foreach ($likes as $like) {
            DB::table('Usuario_Valoracion')->insert([
                'IDUsuarioFK4' => $like['IDUsuarioFK4'],
                'IDValoracionFK3' => $like['IDValoracionFK3'],
                'IDMezcla' => $like['IDMezcla'],
                'created_at' => $like['created_at'],
            ]);
        }
    }
}
