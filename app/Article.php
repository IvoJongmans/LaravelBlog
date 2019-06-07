<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['blog_title', 'blog_body', 'blog_image', 'blog_allow_comments'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function categories() {
        return $this->hasMany(Category::class);
    }
}
