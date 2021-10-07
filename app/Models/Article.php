<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $appends = ['short_description','count_view_beautiful','count_likes_beautiful'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
                'slug' => [
                        'source' => 'title'
                ]
        ];
    }

    public function getShortDescriptionAttribute()
    {
        if (strlen($this->description) > 100) {
            return substr($this->description, 0, 100)."...";
        } else {
            return $this->description;
        }
    }

    public function getCountViewBeautifulAttribute(){
         if($this->count_view>1000){
            return  strval($this->count_view_beautiful=$this->count_view % 1000)."K";
         }else{
            return  $this->count_view_beautiful=$this->count_view;
         }
    }
    public function getCountLikesBeautifulAttribute(){
         if($this->count_like>1000){
            return  strval($this->count_likes_beautiful=$this->count_like % 1000)."K";
         }else{
            return  $this->count_likes_beautiful=$this->count_like;
         }
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function view(){
        return $this->hasMany(View::class);
    }

    public function newLike(){

    }

    public function newView()
    {
        if (Cookie::get('article_view_' . $this->slug)) {
            return;
        }
        Cookie::queue('article_view_' . $this->slug, 'value', 120);
        $view = new View();
        $view->save();
        $this->view()->save($view);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
