<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['admin', 'user'];

        foreach ($arr as $key => $value) {
            $user = new User();
            $user->name = $value;
            $user->email = $value.'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();

            $user->assignRole($value);
        }
    }
}
