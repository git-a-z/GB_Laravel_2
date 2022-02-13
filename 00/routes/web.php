<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '<h1 style="text-align:center;">Hello, world!</h1>';
});

Route::get('/01', function () {
    return view('homework01');
});

Route::get('/02', function () {
    return view('homework02');
});

// Route::get('/home', [HomeController::class, 'index'])
//     ->name('home');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category::catalog');

Route::get('/category/news/{id}', [CategoryController::class, 'news'])
    ->where('id', '[0-9]+')
    ->name('category::news');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news::catalog');

Route::get('/news/card/{id}', [NewsController::class, 'card'])
    ->where('id', '[0-9]+')
    ->name('news::card');

Route::get('/locale/{lang}', [LocaleController::class, 'index'])
    ->where('lang', '\w+')
    ->name('locale');

// admin

// category
Route::group([
    'prefix' => '/admin/category',
    'as' => 'admin::category::',
    'middleware' => ['auth', 'is.admin'],
], function() {
    Route::get('/', [AdminCategoryController::class, 'index'])
        ->name('catalog');

    Route::get('/new', [AdminCategoryController::class, 'new'])
        ->name('new');

    Route::post('/create', [AdminCategoryController::class, 'create'])
        ->name('create');

    Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])
        ->name('edit');

    Route::post('/update/{id}', [AdminCategoryController::class, 'update'])
        ->name('update');

    Route::match(['post', 'get'], '/delete/{id}', [AdminCategoryController::class, 'delete'])
        ->name('delete');
});

// news
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'middleware' => ['auth', 'is.admin'],
], function() {
    Route::get('/', [AdminNewsController::class, 'index'])
        ->name('catalog');

    Route::get('/new', [AdminNewsController::class, 'new'])
        ->name('new');

    Route::post('/create', [AdminNewsController::class, 'create'])
        ->name('create');

    Route::get('/edit/{id}', [AdminNewsController::class, 'edit'])
        ->name('edit');

    Route::post('/update/{id}', [AdminNewsController::class, 'update'])
        ->name('update');

    Route::match(['post', 'get'], '/delete/{id}', [AdminNewsController::class, 'delete'])
        ->name('delete');  
});

// user
Route::group([
    'prefix' => '/admin/user',
    'as' => 'admin::user::',
    'middleware' => ['auth', 'is.admin'],
], function() {
    Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])
        ->name('catalog');

    Route::get('/new', [App\Http\Controllers\Admin\UserController::class, 'new'])
        ->name('new');

    Route::post('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])
        ->name('create');

    Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])
        ->name('edit');

    Route::post('/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])
        ->name('update');

    Route::match(['post', 'get'], '/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete'])
        ->name('delete');  
});

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// profile
Route::group([
    'prefix' => '/admin/profile',
    'as' => 'admin::profile::',
    'middleware' => ['auth'],
], function() {
    Route::get('/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])
        ->name('edit');

    Route::post('/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])
        ->name('update');
});
