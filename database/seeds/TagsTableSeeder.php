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
        $tags = [
            'cronaca',
            'economia',
            'politica',
            'mondo',
            'salute',
            'scienze'

        ];

        foreach ($tags as $tag) {
            $Newtag = new Tag;
            $Newtag->description = $tag;
            $Newtag->save();
        }
        
    }
}
