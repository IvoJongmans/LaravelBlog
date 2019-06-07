<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    protected $fillable = ['article_id', 'sport', 'food', 'leisure'];
    
    public function article() {
        return $this->belongsTo(Article::class);
    }
}
