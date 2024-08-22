<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\CompanyDetails;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer(['frontend.layouts.navbar_header','frontend.layouts.footer','frontend.product_details','frontend.layouts.header','backend.layout.header','backend.layout.topnavbar','backend.layout.sidenavbar','backend.login'], function ($view) {
            $company = CompanyDetails::get()->first();
            $view->with(compact('company'));
        });

        View::creator('*', function ($view) {
            /** @var \Illuminate\View\View $view */
            $view->with('currentViewName', $view->getName());
        });
        $project_title = '| Flarish ';
        $project_copyright = 'Design and Development by Zariq Ltd';
        View::share('title', $project_title);
        View::share('copyright', $project_copyright);
    }
}
