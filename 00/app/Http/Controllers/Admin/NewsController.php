<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsSaveRequest;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', ['news' => News::all()]);
    }

    public function delete(News $id)
    {
        $id->delete();
        return redirect()->route('admin::news::catalog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $id)
    {
        $category = Category::all();
        $categoryArray = [];
        foreach($category as $item) {
            $categoryArray[$item->id] = $item->title;
        }

        return view('admin.news.update', [
            'news' => $id,
            'categoryArray' => $categoryArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminNewsSaveRequest $request, $id)
    {
        $news = News::find($id);

        if (isset($news)) {
            $title = $request->input('title');
            $text = $request->input('text');
            $category_id = $request->input('category_id');

            $news->fill([
                'title' => htmlspecialchars($title),
                'text' => htmlspecialchars($text),
                'category_id' => htmlspecialchars($category_id),
            ]);
            $news->save();

            return redirect()->route('admin::news::catalog');
        } else {
            echo 'Can\'t find any news...';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(AdminNewsSaveRequest $request, News $news)
    {
        $title = $request->input('title');
        $text = $request->input('text');
        $category_id = $request->input('category_id');

        $news->fill([
            'title' => htmlspecialchars($title),
            'text' => htmlspecialchars($text),
            'category_id' => htmlspecialchars($category_id),
        ]);
        $news->save();

        return redirect()->route('admin::news::catalog');
    }

    public function new()
    {
        $category = Category::all();
        $categoryArray = [];
        foreach($category as $item) {
            $categoryArray[$item->id] = $item->title;
        }
        return view('admin.news.create', ['categoryArray' =>  $categoryArray]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
