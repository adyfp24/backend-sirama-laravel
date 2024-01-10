<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $Admin = new \App\Models\User();
        $Admin->username = 'admin';
        $Admin->email = 'admin@gmail.com';
        $Admin->password = Hash::make('admin123');
        $Admin->role = 1;
        // $Admin->remember_token = \Str::random(60);
        $Admin->created_at = now();
        $Admin->updated_at = now();
        $Admin->save();
    }
}
