<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Thread'=>'App\Policies\ThreadPolicy',
        'App\Reply' => 'App\Policies\ReplyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gates 总是接收一个用户实例作为第一个参数，
        //并且可以接收可选参数，比如相关的 Eloquent 模型：
        Gate::before(function ($user) {
           if ($user->name ===  '菩提道之')return true;
        });

        //
    }
}
