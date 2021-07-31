<?php

use App\Models\User;
use Illuminate\Support\Str;
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
        User::insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'celphone' => '11999999999',
            'admin' => true,
            'super' => true,
            'remember_token' => Str::random(60),
        ]);
    }
}
