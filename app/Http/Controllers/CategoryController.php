<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request){

        $categories = ($request->categories);

        $filtered_articles = Article::wherehas('categories', function($query) use ($categories) {
            $query->whereIn('category_id', $categories);
        })->get();

       $allCategories = Category::all();

        return view('article.index', ['allBlogs' => $filtered_articles, 'allCategories' => $allCategories]);
    }
}
