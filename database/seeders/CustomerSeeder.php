<?php

namespace Database\Seeders;

use App\Models\customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Faker = \Faker\Factory::create();

        for($i =1; $i <= 15 ; $i++)
        {
            customer::create([

                'user_id' => User::inRandomOrder()->first()->id,
                'user_name'=> $Faker ->sentence(2),
                'first_name'=>$Faker ->sentence(1),
                'Last_name'=>$Faker ->sentence(1),
                'email'=>$Faker ->email(1),
                'Salary'=>$Faker ->numberBetween(2700,8000),
                'status'=>$Faker ->boolean(),
            ]);
        }
    }
}
