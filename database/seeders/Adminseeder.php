<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'image' =>'ssssssssssss.jpg',
            'status' =>'2',
            'password' => bcrypt('123123123')
        ];
        Admin::create($admin);
    }
}
