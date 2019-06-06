<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class CategoryController extends Controller
{
    public function index(){
        $category = request('category_input');
        
        $allBlogs = Article::where('blog_category', '=', $category)->get();
        return view('article.index', compact('allBlogs'));
        // return $search_results;
    }
}
