<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    private $likeServise=null;

    /**
     * LikeController constructor.
     * @param null $likeServise
     */
    public function __construct()
    {
        $this->likeServise = new LikeService();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $count=$this->likeServise->newLike($request->article_id);

         return response()->json(['count'=>$count])->setStatusCode(200);

    }

}
