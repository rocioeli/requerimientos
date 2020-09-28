<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracion.users')->insert([
            'id_trabajador' => 1,
            'usuario'       => 'ealvarez',
			'password' 		=> Hash::make('123456'),
            'estado'        => 1,
			'acceso'        => 1,
			'rol'           => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        	'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }
}
