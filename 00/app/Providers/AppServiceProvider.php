<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = [
            [
                'title' => 'home',
                'alias' => 'home',
            ],
            [
                'title' => 'news',
                'alias' => 'news::catalog',
            ],
            [
                'title' => 'categories',
                'alias' => 'category::catalog',
            ],
            [
                'title' => 'admin',
                'alias' => 'admin::news::catalog',
            ],
        ];
        \View::share('menu', $menu);

        $adminMenu = [
            [
                'title' => 'edit news',
                'alias' => 'admin::news::catalog',
            ],
            [
                'title' => 'add news',
                'alias' => 'admin::news::new',
            ],
            [
                'title' => 'edit categories',
                'alias' => 'admin::category::catalog',
            ],
            [
                'title' => 'add category',
                'alias' => 'admin::category::new',
            ],
            [
                'title' => 'news',
                'alias' => 'news::catalog',
            ],
            [
                'title' => 'categories',
                'alias' => 'category::catalog',
            ],
        ];
        \View::share('adminMenu', $adminMenu);

        \View::share('noMoreNews', 'no more news');

        \View::share('noMoreCategory', 'no more categories');
    }
}
