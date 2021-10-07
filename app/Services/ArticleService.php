<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

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

        public function storeComment($article_id,$subject,$text){
            sleep(600);
            $comment=new Comment();
            $comment->article_id=$article_id;
            $comment->subject=$subject;
            $comment->text=$text;
            $comment->save();
        }
}
