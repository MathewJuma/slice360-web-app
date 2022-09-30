<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

//these are used to create collection pagination
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use Wink\WinkPost;

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
        //this ensures that bootstrap is used for pagination
        Paginator::useBootstrap();



        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {

            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator (
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });



        /**
         * Fetch the 3 latest blogs posts
         * Pass data into all views
         */
        $three_blog_posts = WinkPost::orderBy('publish_date', 'DESC')->take(3)->get();

        View::share('three_blog_posts', $three_blog_posts);

    }
}
