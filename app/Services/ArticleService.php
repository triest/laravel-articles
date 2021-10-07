<?php


namespace App\Services;


use App\Models\Article;

class ArticleService
{
        public function showBySlug($slug){
            $article=Article::select(['*'])->where(['slug'=>$slug])->with('tag','comment','comment.user')->withCount('like','view' )->first();

            if(!$article){
                return null;
            }

            $article->newView();
            return $article;
        }
}
