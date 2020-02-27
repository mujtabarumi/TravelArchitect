<?php

namespace App\Providers;

use App\Events\ContactUs;
use App\Events\NewSearchPackage;
use App\Listeners\ContactUsEmailNotification;
use App\Listeners\SendEmailForNewSearchPackage;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        NewSearchPackage::class => [
            SendEmailForNewSearchPackage::class
        ],
        ContactUs::class => [
            ContactUsEmailNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
