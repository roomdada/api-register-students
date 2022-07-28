<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class ArticlesController extends Controller
{
  public function index()
  {
    return ArticleResource::collection(Article::with('comments', 'category')->latest()->inRandomOrder()->take(10)->get());
  }

  public function show(Article $article)
  {
    return new ArticleResource($article->load('comments', 'category'));
  }
}
