<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('authors')->paginate(10);
        return view('articles', ['articles' => $articles]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        // Walidacja danych z formularza
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        // Zapisz artykuł do bazy danych
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = htmlspecialchars($validatedData['content']);
        $article->created_at = now();
        $article->save();

        $article->authors()->sync($validatedData['authors']);


        // Przekieruj użytkownika po dodaniu artykułu
        return redirect('/articles')->with('success', 'Article added successfully!');
    }
    public function edit($id)
    {
        $article = Article::find($id);
        return view('edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = Article::find($id);

        $article->title = $validatedData['title'];
        $article->text = htmlspecialchars($validatedData['content']);
        $article->save();

        return redirect('/articles')->with('success', 'Article updated successfully!');
    }
}
