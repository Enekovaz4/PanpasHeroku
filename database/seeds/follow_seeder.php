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
                'follower' => 2,
                'followed' => 3,
            ]);

            DB::table('user_user')->insert([
                'follower' => 3,
                'followed' => 2,
            ]);

            DB::table('user_user')->insert([
                'follower' => 2,
                'followed' => 6,
            ]);

            DB::table('user_user')->insert([
                'follower' => 2,
                'followed' => 9,
            ]);

            DB::table('user_user')->insert([
                'follower' => 2,
                'followed' => 6,
            ]);

            DB::table('user_user')->insert([
                'follower' => 5,
                'followed' => 7,
            ]);

            DB::table('user_user')->insert([
                'follower' => 7,
                'followed' => 6,
            ]);

            DB::table('user_user')->insert([
                'follower' => 9,
                'followed' => 2,
            ]);

            DB::table('user_user')->insert([
                'follower' => 8,
                'followed' => 7,
            ]);

            DB::table('user_user')->insert([
                'follower' => 6,
                'followed' => 7,
            ]);

            DB::table('user_user')->insert([
                'follower' => 10,
                'followed' => 2,
            ]);

    }
}
