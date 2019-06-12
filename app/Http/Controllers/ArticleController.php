<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Illuminate\Http\Request;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allBlogs = Article::all()->sortByDesc('created_at');
        $allCategories = Category::all();

        // $allSports = Article::whereHas('categories', function ($query) {
        //             $query->where('sport', '=', 1);
        //             })->get();
        // $allSportsFood = Article::whereHas('categories', function ($query) {
        //             $query->where([['sport', '=', 1], ['food', '=', 1]]);
        //             })->get();
        // $allSportsLeisure = Article::whereHas('categories', function ($query) {
        //             $query->where([['sport', '=', 1], ['leisure', '=', 1]]);
        //             })->get();

        // $allFood = Article::whereHas('categories', function ($query) {
        //             $query->where('food', '=', 1);
        //             })->get();
        // $allFoodSports = Article::whereHas('categories', function ($query) {
        //             $query->where([['food', '=', 1], ['sport', '=', 1]]);
        //             })->get();
        // $allFoodLeisure = Article::whereHas('categories', function ($query) {
        //             $query->where([['food', '=', 1], ['leisure', '=', 1]]);
        //             })->get();


        // $allLeisure = Article::whereHas('categories', function ($query) {
        //             $query->where('leisure', '=', 1);
        //             })->get();
        //  $allLeisureSport = Article::whereHas('categories', function ($query) {
        //             $query->where([['leisure', '=', 1], ['sport', '=', 1]]);
        //             })->get();
        //  $allLeisureFood = Article::whereHas('categories', function ($query) {
        //             $query->where([['leisure', '=', 1], ['food', '=', 1]]);
        //             })->get();

        // $allSportsCount = $allSports->count();
        // $allFoodCount = $allFood->count();
        // $allLeisureCount = $allLeisure->count();

        return view('article.index', compact('allBlogs', 'allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        
        return view('article.create_blog', compact('allCategories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = $request->categories;
        // dd($categories);
        $originalFile = '';
        $file = $request->file('blog_image');
        $destinationPath = 'img/';
        if ($request->hasFile('blog_image')) {
            $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $originalFile);
        }
        // $originalFile = $file->getClientOriginalName();
        // $file->move($destinationPath, $originalFile);

        // $path = $request->blog_image_path->store('blog_images');

        $article = new Article;
        $article->blog_title = $request->blog_title;
        $article->blog_body = $request->blog_body;
        $article->blog_allow_comments = $request->blog_allow_comments;
        $article->user_id = Auth::id();
        $article->blog_image = $originalFile;

        $article->save();

        $category = Category::find($categories);
       
        $article->categories()->attach($category);

        

    //code for making a new article
    // $userId = Auth::id();
      
    // $attributes = request()->validate([
    //     'blog_title' => ['required', 'min:3'],
    //     'blog_body' => ['required', 'min:3'],  
    //     'blog_allow_comments' => ['required']       
    // ]);

    // $file = $request->file('blog_image');
    // $destinationPath = 'img/';
    // $originalFile = $file->getClientOriginalName();
    // $file->move($destinationPath, $originalFile);

    // $path = $request->blog_image_path->store('blog_images');

    // $attributes += ['blog_image' => $originalFile, 'user_id' => $userId];


    // $catId = Article::create($attributes);  

   

    // $catarr = $request->categories;


    //     $catatt = ['article_id' => $catId->id];

    //     if (in_array("sport", $catarr)) {
    //         $catatt +=['sport' => 1];
    //     }
    //     if (in_array("food", $catarr)) {
    //         $catatt +=['food' => 1];
    //     }
    //     if (in_array("leisure", $catarr)) {
    //         $catatt +=['leisure' => 1];
    //     }

    // Category::create($catatt);

    return redirect('/article');  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article_update = Article::find($article->id);

        $article_update->update(request(['blog_title', 'blog_body']));


        return redirect('article/'.$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
