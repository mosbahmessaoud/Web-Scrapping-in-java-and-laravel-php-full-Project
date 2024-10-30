<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        // Check if there is a search term in the request
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('authors', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('abstract', 'LIKE', "%{$searchTerm}%");
        }

        // Paginate the results (10 articles per page)
        $articles = $query->paginate(10);

        // Return the index view with the articles
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        // Return the show view for a single article
        return view('articles.show', compact('article'));
    }
}