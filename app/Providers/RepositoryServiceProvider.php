<?php

namespace App\Providers;

use App\Contracts\AttributeContract;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\OrderContract;
use App\Contracts\PostContract;
use App\Contracts\ProductContract;
use App\Repositories\AttributeRepository;
use App\Repositories\BrandRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        PostContract::class             =>          PostRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        OrderContract::class            =>          OrderRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}