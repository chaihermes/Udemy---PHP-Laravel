<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Aqui está registrando o componente e dando a ele o nome de alerta. Como se fosse o
        //name das rotas.
        Blade::component('componentes.alerta', 'alerta');
    }
}
