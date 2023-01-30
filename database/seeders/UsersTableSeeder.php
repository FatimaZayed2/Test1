<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Fatima',
            'email' => 'Fatima@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name' => 'Zahra',
            'email' => 'Zahra@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name' => 'Noor',
            'email' => 'Noor@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
