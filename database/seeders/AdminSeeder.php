<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;




class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password=Hash::make('ampark');
        $insert = new User();
        $insert->name='Amani';
        $insert->email='amani@gmail.com';
        $insert->password= $password;
        $insert->save();
    }
}
