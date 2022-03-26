<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generetor as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $new_post = new Post();

            $new_post->title = $faker->words(3, true);
        }
    }
}
