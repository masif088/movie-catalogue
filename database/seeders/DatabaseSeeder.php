<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Genre::create(
            ['title'=>'Drama',
            'colors'=>'btn-info'],
        );
        Genre::create(
            ['title'=>'Action',
                'colors'=>'btn-primary']
        );
        Genre::create(
            ['title'=>'Animation',
                'colors'=>'btn-success'],
        );Genre::create(
        ['title'=>'Sci-Fi',
            'colors'=>'btn-secondary'],
        );Genre::create(
        ['title'=>'Horror',
            'colors'=>'btn-danger'],
        );


        for ($i = 0; $i <20 ; $i++) {
            $movie=Movie::create([
                'title'=>"Movie $i",
                'director'=>"Mr. $i",
                'summary'=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam autem until 96 character",
            ]);
            $rand=rand(1,5);
            $now=[0];
            while(!in_array($rand,$now)){
                MovieGenre::create([
                    'movie_id'=>$movie->id,
                    'genre_id'=>$rand
                ]);
                $now[]=$rand;
                $rand=rand(1,5);
            }
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
