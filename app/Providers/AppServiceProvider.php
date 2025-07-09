<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProviderDetail;
//use Illuminate\Support\Facades\URL;//need to remove

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
        View::composer('*', function ($view) {
            $user = Auth::user();

            if ($user) {
                $view->with('user', $user);

                if ($user->user_type === 'service_provider') {
                    $providerDetail = ServiceProviderDetail::where('user_id', $user->id)->first();
                    $view->with('providerDetail', $providerDetail);
                }
            }
            //need to remove after ngrok url testing
            // if (env('APP_ENV') !== 'local') {
            //     URL::forceScheme('https');
            // }

            // // OR force HTTPS always during ngrok testing
            // URL::forceScheme('https');
        });
    }
}
