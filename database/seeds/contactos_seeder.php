<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class contactos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 11; $i++) {

            $timestamp = mt_rand(1, time());
            $randomDate = date('Y-m-d H:i:s', $timestamp);

            DB::table('contactos')->insert([
                'nombre' => $faker->firstname,
                'correo' => $faker->safeEmail,
                'asunto' => $faker->sentence(mt_rand(2, 5)),//frase de 2 a 5 palabras
                'mensaje' => $faker->paragraph(mt_rand(2, 5)),//párrafo de 2 a 5 frases
                'leido' => $faker->numberBetween(0,1),
                'created_at' => $randomDate,
                'updated_at' => $randomDate,
            ]);
        }
    }
}
