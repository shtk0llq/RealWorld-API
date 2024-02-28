<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return new ArticleCollection($articles);
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($validated['title'], '-');

        $article = Article::create($validated);

        return new ArticleResource($article);
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return new ArticleResource($article);
    }

    public function update(UpdateArticleRequest $request, string $slug)
    {
        $validated = $request->validated();
        
        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title'], '-');        
        }

        $article = Article::where('slug', $slug)->firstOrFail();
        $article->update($validated);

        return new ArticleResource($article);
    }

    public function destroy(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $article->delete();

        return response(204);
    }
}
