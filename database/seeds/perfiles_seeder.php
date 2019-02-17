<?php

use Illuminate\Database\Seeder;

class perfiles_seeder extends Seeder
{
    protected $_arr_perfiles = [
        [
            'nombre' => 'Administrador', 'descripcion' => 'Usuario tipo Root',
        ],
        [
            'nombre' => 'Usuario', 'descripcion' => 'Usuario Normal',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_arr_perfiles as $row) {
            DB::table('perfiles')->insert([
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
            ]);
        }
    }
}
