<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ActionsWithArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActionsWithArticleRequest $request)
    {
        $data1 = $request->validated();

        $data2 = $this->validate($request, [
            'name' => 'unique:articles',
        ]);

        $data = array_merge($data1, $data2);

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()->route('articles.index')->withSuccess('Статья успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActionsWithArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ActionsWithArticleRequest $request, Article $article)
    {
        $data1 = $request->validated();

        $data2 = $this->validate($request, [
            'name' => 'unique:articles,name,' . $article->id,
        ]);

        $data = array_merge($data1, $data2);

        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')->withSuccess('Статья успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index')->withSuccess('Статья успешно удалена!');
    }
}
