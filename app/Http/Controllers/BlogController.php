<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class BlogController extends Controller
{
    public function categoryIndex()
    {
        return view('blog.category.index', [
            'categories' => Category::where('published', 1)->paginate(10)
        ]);
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('blog.category.show', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(10)
        ]);
    }
    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('blog.article.show', [
            'article' => $article,
            'categories' => $article->categories()->get()
            ]);
    }
}
