<?php

use Illuminate\Database\Seeder;

class follow_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('user_user')->insert([
                'follower' => 4,
                'followed' => 2,
            ]);

            DB::table('user_user')->insert([
                'follower' => 3,
                'followed' => 4,
            ]);

            DB::table('user_user')->insert([
                'follower' => 3,
                'followed' => 5,
            ]);

            DB::table('user_user')->insert([
                'follower' => 3,
                'followed' => 6,
            ]);

            DB::table('user_user')->insert([
                'follower' => 5,
                'followed' => 6,
            ]);

            DB::table('user_user')->insert([
                'follower' => 5,
                'followed' => 3,
            ]);

            DB::table('user_user')->insert([
                'follower' => 6,
                'followed' => 5,
            ]);

            

    }
}
