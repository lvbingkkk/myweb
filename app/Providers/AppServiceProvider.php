<?php

namespace App\Providers;

use App\Channel;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;


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
//        if($this->app->isLocal()){
//            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
//        }

    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Carbon::setLocale('zh');
        View::share('channels', Channel::all());

//        注册自定义验证规则：
        Validator::extend('spamfree','App\Rules\SpamFree@passes');
    }

    /*public function boot()
    {
        Carbon::setLocale('zh');
        View::composer('*',function ($view){
//            chanels 属于不会经常变动的数据，所以我们可以选择使用缓存机制来优化：
            $channels = Cache::rememberForever('channels',function ()
            {
                return Channel::all();
            }
            );
            $view->with('channels',$channels);
        });
    }*/




}
