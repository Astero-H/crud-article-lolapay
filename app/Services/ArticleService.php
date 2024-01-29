<?php 

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    /**
     * Get all articles
     *
     * @return array 
     */
    public function getAllArticles()
    {
        return Article::orderBy('created_at', 'desc')->paginate(6);
    }

    /**
     * Get an article by its id
     *
     * @param [type] $id
     * @return Article
     */
    public function getArticleById($id)
    {
        return Article::findOrFail($id);
    }


    /**
     * Update an article
     *
     * @param [type] $request
     * @param [type] $id
     * @return Article
     */
    public function updateArticle($request, $id)
    {
        $article = $this->getArticleById($id);
        $article->update($request->all());
        return $article;
    }

    /**
     * Create an article
     *
     * @param [type] $request
     * @return Article
     */
    public function createArticle($request)
    {
        return Article::create($request->all());
    }


    /**
     * Delete an article
     *
     * @param [type] $id
     * @return void
     */
    public function deleteArticle($id)
    {
        $article = $this->getArticleById($id);
        $article->delete();
    }
}