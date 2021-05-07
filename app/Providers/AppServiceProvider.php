<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Auth;

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
    public function boot(Dispatcher $events)
    {
         $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add('MENU DE NAVEGACÓN');

            if(Auth::user()->role == 'admin'){
                $event->menu->add(
                    [
                        'text'=>'Escritorio',
                        'url'=>route('dashboard'),
                        'icon'=>'fas fa-tachometer-alt'
                    ],
                    [
                        'text'=>'Perfil',
                        'url'=>route('profile'),
                        'icon'=>'fas fa-id-card'
                    ],
                    [
                        'text'=>'Usuarios',
                        'url'=>route('users.index'),
                        'icon'=>'fas fa-users'
                    ],
                    [
                        'text'=>'Bloques',
                        'url'=>route('blocks.index'),
                        'icon'=>'fas fa-building'
                    ],
                    [
                        'text'=>'Departamentos',
                        'url'=>route('departments.index'),
                        'icon'=>'fas fa-house-user'
                    ],
                    [
                        'text'=>'Controles',
                        'url'=>route('controls.index'),
                        'icon'=>'fas fa-gamepad'
                    ],
                    [
                        'text'=>'Actividades',
                        'url'=>route('activities.index'),
                        'icon'=>'fas fa-file-alt'
                    ]
                );
            }else{
                $event->menu->add(
                    [
                        'text'=>'Escritorio',
                        'url'=>route('dashboard'),
                        'icon'=>'fas fa-tachometer-alt'
                    ],
                    [
                        'text'=>'Perfil',
                        'url'=>route('profile'),
                        'icon'=>'fas fa-id-card'
                    ],
                    [
                        'text'=>'Departamentos',
                        'url'=>route('departments.index'),
                        'icon'=>'fas fa-house-user'
                    ],
                    [
                        'text'=>'Controles',
                        'url'=>route('controls.index'),
                        'icon'=>'fas fa-gamepad'
                    ],
                    [
                        'text'=>'Actividades',
                        'url'=>route('activities.index'),
                        'icon'=>'fas fa-file-alt'
                    ]
                );
            }

            
        });
    }
}
