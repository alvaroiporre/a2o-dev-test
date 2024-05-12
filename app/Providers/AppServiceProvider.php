<?php

namespace App\Providers;

use App\Contracts\ProblemSolverInterface;
use App\Services\ProblemsAlgorithms\Chess;
use App\Services\ProblemsAlgorithms\StringValue;
use App\Services\ProblemSolverService;
use Illuminate\Support\ServiceProvider;

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
        //
    }
}
