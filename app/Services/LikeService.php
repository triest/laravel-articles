<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LikeService
{
    public function newLike($article_id){
        $article=Article::select(['count_like'])->where(['id'=>$article_id])->first();
        if(!$article){
            return false;
        }
        if (Cookie::get('article_like_' . $article->slug)) {
            return $article->count_like;
        }
        Cookie::queue('article_like_' . $article->slug, 'value', 120);
        $like=new Like();
        $like->article_id=$article_id;
        $like->user_id=Auth::id();
        $like->save();
        if($article->count_like<1000){
            return $article->count_like+1;
        }else {
            return $article->count_likes_beautiful;
        }
    }
}
