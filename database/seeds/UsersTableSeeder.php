<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {

        \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('123mkt456'),
            'type'=>'1',
            'first_access'=>'0'
        ]);
        $this->command->info('Admin User created with username admin@admin.com.br and password 123mkt456');
    }

}
