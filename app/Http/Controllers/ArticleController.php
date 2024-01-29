<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        $article = Article::findOrFail($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, int $id) {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'Article updated with success');
    }

    public function create() {
        return view('create');
    } 

    public function store(Request $request) {
        
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Article::create($request->all());
        return redirect()->route('articles.index')
                         ->with('success', 'Article created with success');
    } 

    public function delete(int $id) {
        Article::findOrFail($id)->delete();    
        return back()->with('success', 'Article deleted with success');;
    }
}
