<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request){

        // dd($request->categories);

       // $categories = Category::find($request->categories);
           $categories = ($request->categories);

           $filtered_articles = Article::wherehas('categories', function($query) use ($categories) {
             $query->whereIn('category_id', $categories);
           })->get();

        //    Article::whereIn('id', function($query) use ($categories) {
        //      $query->whereIn('id', [1,2,3,4,5]);
        //    });
      
    //    dd($categories);
       // $x = $categories->wherePivotIn('category_id', $categories);
        // $articles = Category::wud('aricles');

      
         
    //   /  dd($articles);
        // $x = $category->article();

      //  dd($x:all());

       $allCategories = Category::all();

        return view('article.index', ['allBlogs' => $filtered_articles, 'allCategories' => $allCategories]);
    }
}
