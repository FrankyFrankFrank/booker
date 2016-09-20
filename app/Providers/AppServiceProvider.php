<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Project;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view)
        {
          $project = Project::first();
          $view->with('project', $project);
        });

        $emptyUsers = User::doesntHave('roles');
        $emptyUsers->each( function($user) {
          $user->addRole('Visitor');
        });
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
