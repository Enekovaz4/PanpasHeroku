<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    protected $_arr_users = [
        [
            'username' => 'panpas', 'name' => 'admin', 'lastname' => 'Admin', 'email' => 'panpas.zm@gmail.com', 'password' => 'admin', 'perfil_id' => 1, 'avatar' => "https://cdn.zuid-afrika.nl/media/review/59/12/5912172197710.JPG",
        ],
        [
            'username' => 'usu', 'name' => 'usu', 'lastname' => 'Usu', 'email' => 'usu@gmail.com', 'password' => 'xxxxxx', 'avatar' => "https://c.pxhere.com/photos/9f/cf/man_profile_person_adult_face_portrait_white_human-1203120.jpg!d",
        ],
        [
            'username' => 'Eneko', 'name' => 'Eneko', 'lastname' => 'Apellido', 'email' => 'Eneko@gmail.com', 'password' => 'usuario', 'avatar' => "https://omoro.ru/wp-content/uploads/2018/02/smileys-4.jpg",
        ],
        [
            'username' => 'Pedro', 'name' => 'Pedro', 'lastname' => 'Crespo', 'email' => 'Pedro@gmail.com', 'password' => 'usuario', 'avatar' => "https://nikewrites.files.wordpress.com/2016/11/pexels-photo.jpg?w=940",
        ],
        [
            'username' => 'Sonia', 'name' => 'Sonia', 'lastname' => 'Ortiz', 'email' => 'Sonia@gmail.com', 'password' => 'usuario', 'avatar' => "http://naxio.com.ar/sites/default/files/imagen/blog/foto_perfil.jpeg",
        ],
        [
            'username' => 'Xabi', 'name' => 'Xabi', 'lastname' => 'Perez', 'email' => 'XabiA@gmail.com', 'password' => 'usuario', 'avatar' => "https://tse3.mm.bing.net/th?id=OIP.0qKvjuefI8ZQnXwQilmM6QHaE8&pid=Api",
        ],
    ];//$_arr_users

    protected $_arr_localization = [
        [
            'country' => 'Spain', 'city' => 'Donostia',
        ],
        [
            'country' => 'Spain', 'city' => 'Renteria',
        ],
        [
            'country' => 'Spain', 'city' => 'Irún',
        ],
        [
            'country' => 'Spain', 'city' => 'Bilbao',
        ],
        [
            'country' => 'Spain', 'city' => 'Barcelona',
        ],
        [
            'country' => 'Spain', 'city' => 'Burgos',
        ],
        
    ];//$_arr_localization

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  >> usuarios genéricos fijos
        $contador = 0;
        foreach ($this->_arr_users as $row) {
            $contador++;

            if($contador == 1) {
                ////$fecha_cr_up =  Carbon::create(2014, 07, 28, 19, 04, 11);
                $fecha_cr_up = Carbon::parse('2014-07-28 19:04:11');
                $fecha_verif = Carbon::parse('2014-07-28 19:04:11')->addMinutes(mt_rand(1, 5));
                DB::table('users')->insert([
                    'username' => $row['username'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'country' => $this->_arr_localization[0]['country'],
                    'city' => $this->_arr_localization[0]['city'],
                    'email' => config('mail.from.address', 'panpas.zm@gmail.com'),
                    'email_verified_at' => $fecha_verif,
                    'password' => Hash::make($row['password']),
                    'perfil_id' => 1,
                    'avatar' => $row['avatar'],
                    'notif_creation' => 0,
                    'created_at' => $fecha_cr_up,
                    'updated_at' => $fecha_cr_up,
                ]);

            } else {
                $localization_index = mt_rand(0, (count($this->_arr_localization) - 1));
                //Aleatoriamente: fecha/hora de X años atrás hasta ahora
                $fecha_actual_x_anios_antes = Carbon::now('Europe/Madrid')->subYears(5);
                $fecha_actual = Carbon::now('Europe/Madrid');
                $fecha_cr_up = date( 'Y-m-d H:i:s', mt_rand( strtotime($fecha_actual_x_anios_antes), strtotime($fecha_actual) ) );
                $fecha_verif =  Carbon::parse($fecha_cr_up)->addMinutes(mt_rand(1, 5));
                DB::table('users')->insert([
                    'username' => $row['username'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'country' => $this->_arr_localization[$localization_index]['country'],
                    'city' => $this->_arr_localization[$localization_index]['city'],
                    'email' => $row['email'],
                    'email_verified_at' => $fecha_verif,
                    'password' => Hash::make($row['password']),
                    'avatar' => $row['avatar'],
                    'notif_creation' => 0,
                    'created_at' => $fecha_cr_up,
                    'updated_at' => $fecha_cr_up,
                ]);
            }
        }
    }
}
