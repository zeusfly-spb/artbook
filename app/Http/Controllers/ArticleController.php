<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $paginator = Article::query()->orderByDesc('id')->paginate($request->per_page);
        $articles = $paginator->items();
        $paginatorData = [
            'total' => $paginator->total(),
            'lastPage' => $paginator->lastPage(),
            'perPage' => $paginator->perPage(),
            'currentPage' => $paginator->currentPage()
        ];
        return response()->json([
            'articles' => $articles,
            'paginator_data' => $paginatorData
        ]);
    }

    public function show(string $slug)
    {
        $article = Article::with('tags')->where('slug', $slug)->first();
        $result = $article ? response()->json($article->toArray()) :
            response()->json(['error' => 'Статья не найдена'], 400);
        return $result;
    }
}
