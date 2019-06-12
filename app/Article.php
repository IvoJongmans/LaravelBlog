<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Article extends Model
{
    protected $fillable = ['blog_title', 'blog_body', 'blog_image', 'blog_allow_comments', 'user_id'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function user() {
        return $this->hasOne(User::class);
    }
}
