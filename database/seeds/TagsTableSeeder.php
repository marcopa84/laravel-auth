<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 6 ; $i++) { 
            $tag = new Tag;
            $tag->description = $faker->word;
            $tag->save();
        }
    }
}
