<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['blog_title', 'blog_body', 'blog_image', 'blog_allow_comments', 'categories'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
