<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\ActorsInMovie;
use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::insert([
            'name'=>'драма'
        ]);
        Genre::insert([
            'name'=>'биография'
        ]);
        Genre::insert([
            'name'=>'боевик'
        ]);
        Genre::insert([
            'name'=>'документальный'
        ]);
        Actor::insert([
            'name'=>'Франсуа Клюзе'
        ]);
        Actor::insert([
            'name'=>'Омар Си'
        ]);
        User::insert([
            'login'=>'admin',
            'password'=>Hash::make('admin'),
            'isAdmin'=>true,
        ]); 
        for($i = 1; $i<=15; $i++){
            Film::insert([
                'name'=>'1+1',
                'url'=>'shrek.mp4',
                'description'=>'1+1',
                'poster'=>'shrek.jpg',
                'director'=>'Эндрю Адамсон',
                'genre_id'=>1,
            ]);

            ActorsInMovie::insert([
                'actor_id'=>1,
                'film_id'=>$i,
            ]);
            ActorsInMovie::insert([
                'actor_id'=>2,
                'film_id'=>$i,
            ]);

            
        }
    }
}
