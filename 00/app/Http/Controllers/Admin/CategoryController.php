<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategorySaveRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', ['category' => Category::all()]);
    }

    public function delete(Category $id)
    {
        $id->delete();
        return redirect()->route('admin::category::catalog');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $id)
    {
        return view('admin.category.update', ['category' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategorySaveRequest $request, $id)
    {
        $category = Category::find($id);

        if (isset($category)) {
            $title = $request->input('title');

            $category->fill([
                'title' => htmlspecialchars($title),
            ]);
            $category->save();

            return redirect()->route('admin::category::catalog');
        } else {
            echo 'Can\'t find any categories...';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(AdminCategorySaveRequest $request, Category $category)
    {
        $title = $request->input('title');

        $category->fill([
            'title' => htmlspecialchars($title)
        ]);
        $category->save();

        return redirect()->route('admin::category::catalog');
    }

    public function new()
    {
        return view('admin.category.create');
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
