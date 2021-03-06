<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Services\ArticleService;
use App\Services\TagService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleService=new ArticleService();
        $articles=$articleService->forArticlesPage();
        $tagService=new TagService();
        $tags=$tagService->getTagsForMainPage();

        return view('article.index')->with(compact('articles','tags'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $articleService = new ArticleService();
        $article = $articleService->showBySlug($slug);
        if (!$article) {
            abort(404);;
        }
        return view('article.view')->with(compact('article'));
    }



    public function tag($tag)
    {
        $tag = Tag::select(['*'])->where(['slug' => $tag])->first();
        if (!$tag) {
            abort(404);
        }
        $articleService = new ArticleService();

        $articles = $articleService->articleByTag($tag);

        $tagService=new TagService();
        $tags=$tagService->getTagsForMainPage();


        return view('article.index')->with(compact('articles','tags'));
    }

}
