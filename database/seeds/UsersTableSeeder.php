<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //only 4 cause 1 it's a real user
        for ($i = 0; $i < 20; $i++) {
            $NewUser = new User;
            $NewUser->name = $faker->name();
            $NewUser->email = $faker->email();
            $NewUser->password = Hash::make('12345678');

            $NewUser->save();
        }
    }
}
