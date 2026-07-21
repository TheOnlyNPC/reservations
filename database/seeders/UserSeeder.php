<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB, Str, Carbon\Carbon, Hash;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'email' => $faker->email(),
                'password' => Hash::make(Str::random(10))
            ]);
        }
    }
}
