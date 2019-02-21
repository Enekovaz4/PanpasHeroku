<?php

use Illuminate\Database\Seeder;

class comentarioUser_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('comentario_user')->insert([
                'comentario_id' => 1,
                'user_id' => 6,
            ]);
        
    }
}
