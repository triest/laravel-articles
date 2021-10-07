<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    public function newLike($article_id){
        $like=new Like();
        $like->article_id=$article_id;
        $like->user_id=Auth::id();
        $like->save();
        $article=Article::select(['count_like'])->where(['id'=>$article_id])->first();
        if($article->count_like<1000){
            return $article->count_like+1;
        }else {
            return $article->count_likes_beautiful;
        }
    }
}
