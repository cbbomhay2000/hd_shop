<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'image' =>'ssssssssssss.jpg',
            'status' =>'2',
            'password' => bcrypt('123123123')
        ];
        User::create($user);
    }
}
