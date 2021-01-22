<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $maxCount = 5;

    public function run()
    {
        $articles = Article::all();
        foreach ($articles as $article) {
            $words = explode(' ', $article->text);
            $tagCount = rand(1, $this->maxCount);
            for ($i = 0; $i < $tagCount; $i++) {
                $article->tags()->create(['label' => $words[array_rand($words)]]);
            }
        }
    }
}
