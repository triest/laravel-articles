<?php


namespace App\Services;


use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    public function newLike($article_id){
        $like=new Like();
        $like->article_id=$article_id;
        $like->user_id=Auth::id();
        $like->save();
        $count=Like::select()->where(['article_id'=>$article_id])->count();
        return $count;
    }
}
