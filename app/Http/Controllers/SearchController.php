<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class SearchController extends Controller
{
    public function index(){

        $allCategories = Category::all();

        $search = request('search_input');

        $allBlogs = Article::where('blog_title', 'LIKE', '%'. $search . '%')->get();
        
        return view('article.index', compact('allBlogs', 'allCategories'));
    }
}
