<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'chavel',
                    'email' => 'chavelratu@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('123456789'),
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Jonathan Marco',
                    'email' => 'marcojonathan@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('123456789'),
                    'remember_token' => Str::random(20),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'William',
                    'email' => 'willwill@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('123456789'),
                    'remember_token' => Str::random(20),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Nathaniel Raphael',
                    'email' => 'raphaelnath@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('123456789'),
                    'remember_token' => Str::random(20),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Jeszica Mae',
                    'email' => 'jesziemae@gmail.com',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('123456789'),
                    'remember_token' => Str::random(20),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );
    }
}
