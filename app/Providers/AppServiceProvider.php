<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Hewan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;



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
        // View::share('peliharaan', Hewan::select('jenis')->distinct()->get());
        // View::share('peliharaan', Auth::check() ? Auth::user()->peliharaan : []);
    }

}
