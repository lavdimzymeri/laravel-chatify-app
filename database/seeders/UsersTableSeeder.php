<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
          $user = \App\Models\User::create([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@chatify.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'profile_photo_path' => null, 
                'bio' => 'Bio for User ' . $i,
                'status' => 'Active',
            ]);
            $user->syncRoles('moderator');
        }
    }
}
