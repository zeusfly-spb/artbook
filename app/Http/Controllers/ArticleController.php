<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $builder = Article::query();
        $paginator = $builder->orderByDesc('id')->paginate($request->per_page);
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
}
