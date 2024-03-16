<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Zaimportuj model artykułu

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        // Walidacja danych z formularza
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Zapisz artykuł do bazy danych
        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = $validatedData['content'];
        $article->created_at = now(); // Ustaw datę utworzenia na bieżący czas
        $article->save();

        // Przekieruj użytkownika po dodaniu artykułu
        return redirect('/add-article')->with('success', 'Article added successfully!');
    }
}
