<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Builder;
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
        //
        // Builder::mocro('search',function($field,$string){
        //     return $string ? $this->where($field,'like','%'.$string.'%'):$this;
        // });
    }
}
