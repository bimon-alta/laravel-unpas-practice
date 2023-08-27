<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
      // Menggunakan bootstrap instead TAILWIND pada Paginator
      // karena LARAVEL default nya Paginator using TAILWIND
      Paginator::useBootstrap();


      /**
       * fitur GATE di sini
       * GATE bisa dianggap layer otorisasi yang lebih PAS DIGUNAKAN di sisi CLIENT APP (FrontEnd - Blade)
       * GATE Juga BISA DIGUNAKAN di sisi Controller (Aslinya bisa diletakkan dimana saja)
      */
      Gate::define('auth_as_admin', function(User $user) {
        return $user->is_admin;
      });

    }
}
