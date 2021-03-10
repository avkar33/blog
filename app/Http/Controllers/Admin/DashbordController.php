<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class DashbordController extends Controller
{
    //DashbordController
    public function dashbord()
    {
        return view('admin.dashbord', [
            'articles' => Article::orderByCreated()->published(1)->paginate(3, ['*'], 'articles'),
            'categories' => Category::orderByCreated()->published(1)->paginate(3, ['*'], 'categories'),
            'count_categories' => Category::count(),
            'count_articles' => Article::count(),
            'delimiter' => ''
        ]);
    }
}
