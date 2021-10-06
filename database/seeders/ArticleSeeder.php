<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $article = Article::factory()->has(Comment::factory()->has(User::factory())->count(10))->has(
                Tag::factory(rand(1, 5))
        )->count(20)->create();;
    }
}
