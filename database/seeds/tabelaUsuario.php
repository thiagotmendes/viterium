<?php

use Illuminate\Database\Seeder;

class tabelaUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'name' => "Thiago",
            'email' => 'teste@teste.com.br',
            'password' => bcrypt('teste1234'),
        ]);
    }
}
