<?php

namespace App\Providers;
use App\Services\VoteRules\UserApprovalRule;
use App\Services\VoteService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\VoteRepositoryInterface;
use App\Services\VoteRules\NoSelfVoteRule;
use App\Services\VoteRules\NoDuplicateVoteRule;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VoteService::class, function ($app) {
            return new VoteService(
                $app->make(VoteRepositoryInterface::class),
                [
                    $app->make(UserApprovalRule::class),
                    $app->make(NoSelfVoteRule::class),
                    $app->make(NoDuplicateVoteRule::class),
                ]
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
