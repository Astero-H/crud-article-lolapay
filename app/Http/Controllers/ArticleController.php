<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Services\ArticleService;

class ArticleController extends Controller
{

    protected $articleService;

    /**
     *
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    public function index() {
        $articles = $this->articleService->getAllArticles();
        return view('index', compact('articles'));
    }

    public function show(int $id) {
        $article = $this->articleService->getArticleById($id);
        return view('show', compact('article'));
    }

    public function edit(int $id) {
        $article = $this->articleService->getArticleById($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, int $id) {

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $this->articleService->updateArticle($request,$id);

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

        $this->articleService->createArticle($request);
        return redirect()->route('articles.index')
                         ->with('success', 'Article created with success');
    } 

    public function delete(int $id) {
        $this->articleService->deleteArticle($id);
        return back()->with('success', 'Article deleted with success');;
    }
}
