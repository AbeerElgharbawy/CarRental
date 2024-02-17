<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

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
        $unreadCount = Contact::where('is_read', 0)->count();
        $unreadMessage = Contact::where('is_read', 0)->get();
        View::share('unreadCount', $unreadCount);
        View::share('unreadMessage', $unreadMessage);
        Paginator::useBootstrap();
        
    }
}
