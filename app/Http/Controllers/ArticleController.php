<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Notifications\SubscribeMail;

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
        $currentUser = Auth::user();

        return view('article.index', compact('allBlogs', 'allCategories', 'currentUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        if((Auth::user()->articles()->count() >= 1) && (Auth::user()->subscription == 'free')) {
            return view('article.subscribe');
        }
        else {            
        return view('article.create_blog', compact('allCategories'));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if((Auth::user()->articles()->count() >= 1) && (Auth::user()->subscription == 'free')) {
            return view('article.subscribe');
        }
        else {

        $categories = $request->categories;

        $uniqueFileName = '';
        $file = $request->file('blog_image');
        $destinationPath = 'img/';
        if ($request->hasFile('blog_image')) {
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileExtension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $uniqueFileName = $fileName.time().'.'.$fileExtension;
            // dd($uniqueFileName);
            // $originalFile = $file->getClientOriginalName();
            $file->move($destinationPath, $uniqueFileName);
        }

        $article = new Article;
        $validatedData = $request->validate([
            'blog_title' => 'required',
            'blog_body' => 'required',
            'blog_allow_comments' => 'required',
        ]);
        // $article->blog_title = $request->blog_title;
        // $article->blog_body = $request->blog_body;
        // $article->blog_allow_comments = $request->blog_allow_comments;
        $article->fill($validatedData);
        $article->user_id = Auth::id();
        $article->blog_image = $uniqueFileName;

        $article->save();

        $category = Category::find($categories);
       
        $article->categories()->attach($category);

        return redirect('/article');  
        }
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
