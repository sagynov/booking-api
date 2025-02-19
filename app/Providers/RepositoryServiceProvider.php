<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ResourceRepositoryInterface;
use App\Repositories\ResourceRepository;

use App\Interfaces\BookingRepositoryInterface;
use App\Repositories\BookingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResourceRepositoryInterface::class, ResourceRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
