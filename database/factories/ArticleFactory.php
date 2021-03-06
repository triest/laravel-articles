<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title' => $this->faker->title,
                'description'=>$this->faker->realText(2000),
                'main_image_url'=>"https://via.placeholder.com/150C/O https://placeholder.com/",
                'main_image_short_url'=>"https://via.placeholder.com/150C/O https://placeholder.com/"
        ];
    }
}
