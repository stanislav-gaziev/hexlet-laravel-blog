<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActionsWithArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

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

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(ActionsWithArticleRequest $request, $id)
    {
        $data1 = $request->validated();

        $article = Article::findOrFail($id);
        $data2 = $this->validate($request, [
            'name' => 'unique:articles,name,' . $article->id,
        ]);

        $data = array_merge($data1, $data2);

        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')->withSuccess('Статья успешно изменена!');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index')->withSuccess('Статья успешно удалена!');
    }
}
