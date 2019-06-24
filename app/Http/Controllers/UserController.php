<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
class UserController extends Controller
{
    public function show($id) {
        $current_user = User::find($id);
        $articles = Article::where('user_id', $id)->get();
        $art_count = count($articles);
    
        return view('article.user', ['user' => $current_user, 'art_count' => $art_count]);
    }
}
