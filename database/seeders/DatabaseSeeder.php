<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Categories;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    User::updateOrCreate([
        'firstName' => "admin",
        'lastName'  => 'yowl',
        'login'    => 'yowl administrator',
        'email'  => 'admin@yowl.com',
        'gender' => 'Homme',
        'role'  => 'admin',
         'birthday' => '2026-04-19',
         'password' =>Hash::make('admin123'),
         'verified_at'=> now(),
         'is_verified' => true


    ]);
       $cat = new  Categories();
       $cat->run();



    }
}
