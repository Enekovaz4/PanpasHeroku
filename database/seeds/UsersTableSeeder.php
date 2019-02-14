<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  >> usuarios genéricos fijos

            ////$timestamp = mt_rand(1, time());
            ////$randomDate = date('Y-m-d H:i:s', $timestamp);


                DB::table('users')->insert([
                    'username' => 'panpas',
                    'name' => 'admin',
                    'lastname' => 'Admin',
                    'email' => 'admin@gmail.com',
                    ////'email_verified_at' => now(),
                    'email_verified_at' => '2014-07-28 19:04:11',
                    'password' => Hash::make('admin'),
                    'perfil_id' => 1,
                    'avatar' => "https://cdn.zuid-afrika.nl/media/review/59/12/5912172197710.JPG",
                    'created_at' => '2014-07-28 19:04:11',
                    'updated_at' => '2014-07-28 19:04:11',
                ]);


                DB::table('users')->insert([
                    'username' => 'usu',
                    'name' => 'usu',
                    'lastname' => 'Usu',
                    'email' => 'usu@gmail.com',
                    ////'email_verified_at' => now(),
                    'email_verified_at' => now(),
                    'password' => Hash::make('xxxxxx'),
                    'avatar' => "https://c.pxhere.com/photos/9f/cf/man_profile_person_adult_face_portrait_white_human-1203120.jpg!d",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


                DB::table('users')->insert([
                    'username' => 'Eneko',
                    'name' => 'Eneko',
                    'lastname' => 'Apellido',
                    'email' => 'Eneko@gmail.com',
                    ////'email_verified_at' => now(),
                    'email_verified_at' => now(),
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://omoro.ru/wp-content/uploads/2018/02/smileys-4.jpg",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Robert',
                    'name' => 'Robert',
                    'lastname' => 'Baluta',
                    'email' => 'Robert@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://nikewrites.files.wordpress.com/2016/11/pexels-photo.jpg?w=940",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Ibai',
                    'name' => 'Ibai',
                    'lastname' => 'Alberdi',
                    'email' => 'Ibai@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://cdn4.picryl.com/photo/1910/01/01/chinook-female-profile-640.jpg",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Jon',
                    'name' => 'Jon',
                    'lastname' => 'Artola',
                    'email' => 'JonA@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://tse3.mm.bing.net/th?id=OIP.0qKvjuefI8ZQnXwQilmM6QHaE8&pid=Api",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Yaiza',
                    'name' => 'Yaiza',
                    'lastname' => 'Muñoz',
                    'email' => 'Yaiza@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://tse2.mm.bing.net/th?id=OIP.aa0Bx2M8Xq5l6rTkeYXHUgHaLH&pid=Api",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'David',
                    'name' => 'David',
                    'lastname' => 'Zabal',
                    'email' => 'David@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://openclipart.org/image/2400px/svg_to_png/294182/Bearded-Man-Profile.png",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Ander',
                    'name' => 'Ander',
                    'lastname' => 'Gonzalez',
                    'email' => 'Ander@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://www.nameyourpets.com/images/pets/Donkey.jpg",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Iker',
                    'name' => 'Iker',
                    'lastname' => 'Apaolaza',
                    'email' => 'Iker@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "http://www.realnashvillenews.com/wp-content/uploads/2016/08/tomato-fest-man-800x600.png",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('users')->insert([
                    'username' => 'Josu',
                    'name' => 'Josu',
                    'lastname' => 'Gomez',
                    'email' => 'Josu@gmail.com',
                    'email_verified_at' => now(),
                    ////'email_verified_at' => $randomDate,
                    'password' => Hash::make('usuario'),
                    'avatar' => "https://tse1.mm.bing.net/th?id=OIP.cxcqa9RvhGnRd8x3N2oBdgHaHn&pid=Api",
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    }
}
