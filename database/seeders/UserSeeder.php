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
     */
    public function run(): void
    {
        User::create([
            'name'=>'moamen',
            'email'=>'moamen@example.com',
            'password'=>Hash::make('12345678'),
            'role'=>'admin'  ///this user is admin
        ]);
        User::create([
            'name'=>'abdelrahman',
            'email'=>'abdelrahman@example.com',
            'photo'=>'abdelrahman.jpg',
            'password'=>Hash::make('12345678'),
            'role'=>'user',
            'status'=>'approved'
        ]);
        User::create([
            'name'=>'sara',
            'email'=>'sara@example.com',
            'photo'=>'sara.jpg',
            'password'=>Hash::make('12345678'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'salah',
            'email'=>'salah@example.com',
            'photo'=>'salah.jpg',
            'password'=>Hash::make('12345678'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'omar',
            'email'=>'omarmarmoush@example.com',
            'photo'=>'marmoush.jpg',
            'password'=>Hash::make('12345678'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'ali',
            'email'=>'alimaaloul@example.com',
            'photo'=>'maaloul.jpg',
            'password'=>Hash::make('12345678'),
            'role'=>'user'
        ]);
    }
}
