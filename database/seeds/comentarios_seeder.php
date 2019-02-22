<?php

use App\User;
use App\Receta;
use Illuminate\Database\Seeder;

class comentarios_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $users;
        $id_no = 1;
        //Todos los usuarios, menos los que tengan el ID de perfil indicado (1 >> ADMIN)
        $users = User::where('perfil_id', '<>', $id_no)->get();
        static $recetas;
        $recetas = Receta::all();



            DB::table('comentarios')->insert([
                'padre' => null,
                'mensaje' => "Me encanta esta receta!",
                'user_id' => 6,
                'receta_id' => 1,
                'time' => time(),
                'leido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             DB::table('comentarios')->insert([
                'padre' => null,
                'mensaje' => "Creo que tengo que cambiar de horno... :(",
                'user_id' => 4,
                'receta_id' => 4,
                'time' => time(),
                'leido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             DB::table('comentarios')->insert([
                'padre' => null,
                'mensaje' => "Estoy a la espera de la siguiente receta...",
                'user_id' => 5,
                'receta_id' => 1,
                'time' => time(),
                'leido' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
