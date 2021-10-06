<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Article extends Model
{
    use HasFactory, Sluggable;

    protected $appends = ['short_description'];


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

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function view(){
        return $this->hasMany(View::class);
    }

    public function newLike(){

    }

    public function newView(){
            if(Cookie::get('article_'.$this->id)) {
                $cookie = Cookie::make('article_' . $this->id, 'value', 120);
                $view = new View();
                $view->save();
                $this->view()->save($view);
            }
            return;
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
