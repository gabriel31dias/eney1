<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
        User::create([
          'name'=>'admin',
          'email'=>'admin@admin',
          'tipo_user'=>'3',
          'password'=> Hash::make('admin123'),
        ]);

    }
}
