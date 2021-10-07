<?php


namespace App\Services;


use App\Models\Tag;

class TagService
{
        public function getTagsForMainPage(){
             $tags=Tag::select(['slug','title'])->has('articles')->withCount('articles')->orderBy('articles_count','desc')->limit(100)->distinct()->get();
             return $tags;
        }
}
