<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tag;
use App\Article;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i <7 ; $i++) { 
        	Category::create([
        		'user_id'=> $faker->numberBetween($min=1, $max=4),
        		'title' => $faker->title,
        		'keyword' => $faker->text($maxNbChars = 200),
        		'description' => $faker->text($maxNbChars = 200),
        		'name' => $faker->name
        		]);
        };

        for ($i=0; $i <7 ; $i++) { 
        	Tag::create([
        		'user_id'=> $faker->numberBetween($min=1, $max=4),
        		'title' => $faker->title,
        		'keyword' => $faker->text($maxNbChars = 200),
        		'description' => $faker->text($maxNbChars = 200),
        		'name' => $faker->name
        		]);
        };

        for ($i=0; $i <7 ; $i++) { 
            $article = Article::create([
                'user_id'=> $faker->numberBetween($min=1, $max=4),
                'title' => $faker->title,
                'keyword' => $faker->text($maxNbChars = 200),
                'description' => $faker->text($maxNbChars = 200),
                'attendance' => 0,
                'name' => $faker->name,
                'monthYear' => $faker->month($max = 'now').' '.$faker->year($max = 'now'),
                'content' => $faker->text,
                'status' => 'posted',
            ]);
            $article->tags()->sync([$faker->numberBetween($min=1, $max=7), $faker->numberBetween($min=1, $max=7), $faker->numberBetween($min=1, $max=7)]);
            $article->categories()->sync([$faker->numberBetween($min=1, $max=7),$faker->numberBetween($min=1, $max=7),$faker->numberBetween($min=1, $max=7)]);
        };
    }
}
