<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class MonthController extends Controller
{
    public function show($key){

        switch ($key) {
            case 1:
            $month = 1;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();
                break;
            case 2:
            $month = 2;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();  
                break;
            case 3:
            $month = 3;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 4:
            $month = 4;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 5:
            $month = 5;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 6:
            $month = 6;
            $monthName = "June";
            $allBlogs = Article::whereMonth('created_at', $month)->get();  
            $allBlogs = $allBlogs->sortByDesc('created_at');
            return view('article.month', compact('allBlogs', 'monthName'));           
                break;
            case 7:
            $month = 7;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 8:
            $month = 8;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 9:
            $month = 9;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 10:
            $month = 10;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 11:
            $month = 11;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
            case 12:
            $month = 12;
            $articleByMonth = Article::whereMonth('created_at', $month)->get();    
                break;
        }
    }
}
