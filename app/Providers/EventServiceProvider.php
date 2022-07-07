<?php

namespace App\Providers;

use App\Models\Persona;
use App\Models\Prestamo;
use App\Observers\PersonaObserver;
use App\Observers\PrestamoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {        
        Persona::observe(PersonaObserver::class);
        Prestamo::observe(PrestamoObserver::class);
    }
}
