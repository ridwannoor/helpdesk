<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
// use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        // require_once __DIR__ . '/../Helpers/Tanggal.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('id');

        // jika ingin menyesuaikan dengan dengan locale di laravel
        \Carbon\Carbon::setLocale(config('app.locale'));

        // $this->registerPolicies();
        // Passport::routes();

        // $this->registerPolicies();
        // Passport::routes();
        // Passport::tokensExpireIn(now()->addDays(15));
        // Passport::refreshTokensExpireIn(now()->addDays(30));
        // Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }

    public function shouldDiscoverEvents(){
        return true;
    }
}
