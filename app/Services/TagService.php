<?php


namespace App\Services;


use App\Models\Tag;

class TagService
{
        public function getTagsForMainPage(){
             $tags=Tag::select()->has('articles')->distinct()->get();
             return $tags;
        }
}
