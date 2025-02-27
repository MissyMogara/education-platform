<?php

namespace App\Providers;

use App\Policies\APICoursePolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Policies\UserPolicy;
use App\Models\User;

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
        Gate::policy(Course::class, APICoursePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
