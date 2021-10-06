<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        $url = route('articles.index');

        return view('article.index', compact('articles', 'url'));
    }
}
