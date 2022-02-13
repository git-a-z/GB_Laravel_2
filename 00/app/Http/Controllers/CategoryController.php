<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('category.index', ['category' => Category::all()]);
    }

    public function news(int $id) 
    {
        return view('news.index', ['news' => News::getNewsByCategoryId($id)]);
    }
}