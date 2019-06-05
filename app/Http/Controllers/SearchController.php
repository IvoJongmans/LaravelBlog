<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function index(){
        $search = request('search_input');
        // $search = "12%";
        $allBlogs = Article::where('blog_title', 'LIKE', '%'. $search . '%')->get();
        return view('article.index', compact('allBlogs'));
        // return $search_results;
    }
}
