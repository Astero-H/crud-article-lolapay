<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('index', compact('articles'));
    }

    public function show(int $id) {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }

    public function edit(int $id) {
        // edit article
    }

    public function update(Request $request, int $id) {
       // update article
    }

}
