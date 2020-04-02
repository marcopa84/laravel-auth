<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // dd(Post::inRandomOrder()->first()->id);
        for ($i=0; $i < 100; $i++) { 
            $newComment = new Comment;
            $newComment->post_id = Post::inRandomOrder()->first()->id;
            $newComment->name = $faker->name();
            $newComment->body = $faker->text(255);
            $newComment->save();
        }
    }
}
