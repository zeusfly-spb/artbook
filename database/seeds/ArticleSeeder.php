<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $count = 20;

    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i < $this->count; $i++) {
            Article::create([
                'text' => $faker->realText(500),
                'published_at' => $faker->dateTimeThisCentury()
            ]);
        }
    }
}
