<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('authors')->orderBy('created_at', 'desc')->paginate(10);
        return view('articles', ['articles' => $articles]);
    }

    public function create()
    {
        $authors = Author::all();
        return view('create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
        ]);

        $article = new Article();
        $article->title = $validatedData['title'];
        $article->text = htmlspecialchars($validatedData['content']);
        $article->created_at = now();
        $article->save();

        $article->authors()->sync($validatedData['authors']);


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

    public function showApi($id)
    {
        $article = Article::with('authors')->find($id);

        if ($article) {
            return response()->json($article);
        } else {
            return response()->json(['error' => 'Article not found'], 404);
        }
    }

    public function articlesByAuthor($id)
    {
        $author = Author::find($id);

        if ($author) {
            $articles = $author->articles;
            return response()->json($articles);
        } else {
            return response()->json(['error' => 'Author not found'], 404);
        }
    }

    public function topAuthors()
    {
        $oneWeekAgo = Carbon::now()->subWeek();

        $topAuthors = DB::table('articles')
            ->join('article_author', 'articles.id', '=', 'article_author.article_id')
            ->join('authors', 'article_author.author_id', '=', 'authors.id')
            ->select('authors.name', DB::raw('count(*) as total_articles'))
            ->where('articles.created_at', '>', $oneWeekAgo)
            ->groupBy('authors.name')
            ->orderBy('total_articles', 'desc')
            ->take(3)
            ->get();

        return response()->json($topAuthors);
    }
}
