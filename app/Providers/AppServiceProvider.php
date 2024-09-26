<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ContratoRepository;
use App\UseCases\ListarContratosUseCase;
use App\UseCases\CriarContratoUseCase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(ContratoRepository::class, function ($app) {
            return new ContratoRepository();
        });

        $this->app->singleton(ListarContratosUseCase::class, function ($app) {
            return new ListarContratosUseCase($app->make(ContratoRepository::class));
        });

        $this->app->singleton(CriarContratoUseCase::class, function ($app) {
            return new CriarContratoUseCase($app->make(ContratoRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
