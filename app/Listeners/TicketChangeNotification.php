<?php

namespace App\Listeners;

use daacreators\CreatorsTicketing\Events\TicketStatusChanged;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TicketChangeNotification
{
    public function status(TicketStatusChanged $event): void
    {

        if ($event->ticket?->assignee) {
            Notification::make()
                ->title($event->ticket->ticket_uid . ': Status Changed to `' . $event->newStatus->name .'`')
                ->sendToDatabase($event->ticket->assignee);
        }
    }
}
