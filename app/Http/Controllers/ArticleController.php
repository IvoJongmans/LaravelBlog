<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

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

        return view('article.index', compact('allBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    $attributes = request()->validate([
        'blog_title' => ['required', 'min:3'],
        'blog_body' => ['required', 'min:3'],  
        'blog_allow_comments' => ['required']       
    ]);

    $categories =  $request->input('categories'); 
    $categoriesstring = implode(",",$categories);

    $file = $request->file('blog_image');
    $destinationPath = 'img/';
    $originalFile = $file->getClientOriginalName();
    $file->move($destinationPath, $originalFile);

    //    $path = $request->blog_image_path->store('blog_images');

    $attributes += ['blog_image' => $originalFile,
                    'categories' => $categoriesstring];

    Article::create($attributes);      

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
