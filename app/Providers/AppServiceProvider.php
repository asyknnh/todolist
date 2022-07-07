<?php

namespace App\Providers;

use App\Models\ToDo;
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
        view()->composer(['includes.sidebar','todos.create'], function ($view) {
            $view->with('todos', ToDo::where('user_id', '=', auth()->id())->get());
        });
    }
}
