<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //    if (User::count() === 0) {
    //      User::create([
    //         'name' => 'Admin User',
    //         'email' => 'johnchidozie320@gmail.com',
    //         'phone' => '08153777284',
    //         'address' => 'RedDropz HQ',
    //         'password' => Hash::make('Chidozie101'), // secure your password!
    //         'designation' => 'admin',
    //         'email_verified_at' => now(),
    //     ]);
    // }
    // }

    public function run(): void {
        if (User::where('email', env('ADMIN_EMAIL'))->doesntExist()) {
            User::create([
                'name' => env('ADMIN_NAME'),
                'email' => env('ADMIN_EMAIL'),
                'phone' => '08153777284',
                'address' => 'RedDropz HQ',
                'password' => Hash::make(env('ADMIN_PASSWORD')),
                'designation' => 'admin',
                'email_verified_at' => now(),
            ]);
        }
    
    }


   
}
