<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Hewan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View::composer('layout.sidebar', function ($view) {
            // if (Auth::check()) {
            //     $peliharaan = Hewan::where('pengguna_id', Auth::id())
            //         ->select('jenis')
            //         ->distinct()
            //         ->get();

            //     $view->with('peliharaan', $peliharaan);
            // }
        // });
        View::composer('layout.sidebar', function ($view) {
            if (Auth::check() && Auth::user()->klien) {
                $klienId = Auth::user()->klien->id;
                $jenisPeliharaan = Hewan::where('klien_id', $klienId)
                    ->select('jenis')
                    ->distinct()
                    ->get();

                $view->with('jenisPeliharaan', $jenisPeliharaan);
            } else {
                $view->with('jenisPeliharaan', collect()); // kosong jika tidak login atau tidak punya relasi klien
            }
        });
    }
}
