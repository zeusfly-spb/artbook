<?php

namespace App\Http\Controllers;

use App\Article;
use Exception;
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
            response()->json(['error' => 'Статья не найдена'], 500);
        return $result;
    }

    public function addLike(Request $request)
    {
        try {
            $article = Article::find($request->article_id);
            $article->increment('likes');
            $result = response()->json(['likes' => $article->likes]);
        } catch (Exception $e) {
            $result = response()->json(['error' => "Ошибка установки лайка: {$e->getMessage()}"], 500);
        }
        return $result;
    }

    public function addView(Request $request)
    {
        try {
            $article = Article::find($request->article_id);
            $article->increment('views');
            $result = response()->json(['views' => $article->views]);
        } catch (Exception $e) {
            $result = response()->json(['error' => "Ошибка добавления просмотра: {$e->getMessage()}"], 500);
        }
        return $result;
    }
}
