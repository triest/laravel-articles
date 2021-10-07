<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class ArticleService
{
    private $main_page_limit = 6;

    private $articles_per_page = 10;


    public function showBySlug($slug)
    {
        $article = Article::select(['*'])->where(['slug' => $slug])->with('tag', 'comment', 'comment.user')->first();

        if (!$article) {
            return null;
        }

        $article->newView();
        return $article;
    }

    public function forMainPage()
    {
        $articles = Article::select(['id', 'title', 'description', 'slug','count_view','count_like'])->orderBy('created_at', 'desc')->limit(
                $this->main_page_limit
        )->get();
        return $articles;
    }

    public function forArticlesPage()
    {
        $articles = Article::select(
                'id',
                'title',
                'description',
                'slug',
                'created_at',
                'count_like',
                'count_view'
        )->orderBy('created_at', 'desc')->paginate(
                $this->articles_per_page
        );
        return $articles;
    }

    public function storeComment($article_id, $subject, $text)
    {
        sleep(600);
        $comment = new Comment();
        $comment->article_id = $article_id;
        $comment->subject = $subject;
        $comment->text = $text;
        $comment->save();
    }

    public function articleByTag(Tag $tag){
        return $tag->articles()->paginate($this->articles_per_page);

    }
}
