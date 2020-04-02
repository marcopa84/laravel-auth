<?php

use Illuminate\Database\Seeder;

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 150; $i++) {
            $newPost = new Post;
            $newPost->title = $faker->sentence(3);
            $newPost->body = $faker->text(255);
            $newPost->slug = rand(1, 100) . '-' . Str::slug($newPost->title);
            $newPost->user_id = rand(1, 5);
            $newPost->published = rand(0,1);

            $newPost->save();
        }
    }
}
