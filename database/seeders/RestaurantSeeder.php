<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::create([
            'name'=>'chef pink',
            'email'=>'chefpink@gmail.com',
            'password'=>Hash::make('admin123'),
            'role'=>'restaurateur',
        ]);
    }
}
