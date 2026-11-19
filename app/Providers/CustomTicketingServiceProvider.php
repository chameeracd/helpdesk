<?php

namespace App\Providers;

use App\Listeners\TicketChangeNotification;
use App\Listeners\SendCustomerTicketEmail;
use daacreators\CreatorsTicketing\Events\TicketAssigned;
use daacreators\CreatorsTicketing\Events\TicketCreated;
use daacreators\CreatorsTicketing\Events\TicketReplyAdded;
use daacreators\CreatorsTicketing\Events\TicketStatusChanged;
use daacreators\CreatorsTicketing\TicketingServiceProvider;
use Illuminate\Support\Facades\Event;

class CustomTicketingServiceProvider extends TicketingServiceProvider
{

    protected function registerEvents(): void
    {
        //emails
        Event::listen(TicketCreated::class, [SendCustomerTicketEmail::class, 'created']);
        Event::listen(TicketAssigned::class, [SendCustomerTicketEmail::class, 'assigned']);
        Event::listen(TicketReplyAdded::class, [SendCustomerTicketEmail::class, 'replied']);

        //push
        Event::listen(TicketStatusChanged::class, [TicketChangeNotification::class, 'status']);
    }
}
