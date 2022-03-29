<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;

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
            $new_post->image = $faker->imageUrl(250,250, 'animals', true);
            $new_post->description = $faker->sentence();
            $new_post->save();
        }
    }
}
