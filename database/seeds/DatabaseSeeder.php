<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        // $this->call(PostsTagsPivotSeeder::class);

        $posts = Post::all();
        

        foreach ($posts as $post){
            $tags = Tag::all()->random(rand(0, Tag::all()->last()->id));

            $tagsArray = [];
            foreach ($tags as $tag) {
                $tagsArray[] = $tag->id;
            }
            $post->tags()->attach($tagsArray);
        }
    }
}
