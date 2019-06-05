<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function index(){
        $search = request('search_input');
        $search_results = Article::all()->where('blog_title', '=', $search);
        return view('article.search', compact('search_results'));

    }
}
