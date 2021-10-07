<?php


namespace App\Services;


use App\Models\Article;

class ArticleService
{
        private $main_page_limit=10;

        public function showBySlug($slug){
            $article=Article::select(['*'])->where(['slug'=>$slug])->with('tag','comment','comment.user')->withCount('like','view' )->first();

            if(!$article){
                return null;
            }

            $article->newView();
            return $article;
        }

        public function forMainPage(){
            $articles=Article::select(['id','title', 'description','slug'])->orderBy('created_at','desc')->limit($this->main_page_limit)->get();
            return $articles;
        }
}
