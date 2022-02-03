<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiResponder;

    public function index(): JsonResponse
    {
        return $this->dataResponse(Article::query()->get());
    }

    public function update($id, Request $request): JsonResponse
    {
        Article::query()->findOrFail($id)->update([
            'points' => $request->get('points')
        ]);
        return $this->successResponse('data.saved');
    }
}
