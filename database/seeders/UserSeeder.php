<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->delete();
        User::create([
            'name' => 'abdalrhman',
            'email' => 'abdalrhman@gmail.com',
            'password'=> Hash::make('12345678'),
            'is_admin'=> 1
        ]);
        User::create([
            'name' => 'abdalrhman',
            'email' => 'mo@gmail.com',
            'password'=> Hash::make('12345678'),
            'is_admin'=> 1
        ]);
    }
}
