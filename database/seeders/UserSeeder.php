<?php

namespace Database\Seeders;

use App\Models\User;
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
        for ($i = 2; $i < 6; $i++) {
            User::create([
                "email" => "user$i@gmail.com",
                "password" => Hash::make("12345$i"),
                "name" => "Người Dùng $i",
                "phone" => "098765432$i",
                "address" => "1$i Cống quỳnh, TP.HCM"
            ]);
        }
    }
}
