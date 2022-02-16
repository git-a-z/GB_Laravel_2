<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index() 
    {
        return view('news.index', ['news' => News::orderBy('id', 'desc')->paginate(10)]);
    }

    public function card(News $id) 
    {
        return view('news.card', ['card' => $id]);
    }
}