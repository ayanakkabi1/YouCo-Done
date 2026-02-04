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
        $user = User::Create(
            ['email' => 'chefpink@gmail.com',
                'name' => 'chef pink',
                'password' => Hash::make('admin123'),
                'role' => 'restaurateur',
            ]
        );
        $user->restaurants()->createMany([
            [
                'name'=>'Pasta safi',
                'ville'=>'Casablanca',
                'capacity'=>'100',
                'cuisine' =>'italienne',
            ],
            [
                'name' => 'mer eat',
                'ville'=>'Safi',
                'capacity'=>'30',
                'cuisine' =>'asiatique',
            ]
        ]);

    }
    
}
