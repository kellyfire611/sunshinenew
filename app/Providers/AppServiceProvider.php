<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Fix 1071 error
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Mặc định độ dài của chuỗi là 191 ký tự

        // Sử dụng giao diện Bootstrap 4 để hiển thị các LINK phân trang (pagination link)
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
