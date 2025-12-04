<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class SalesPickupRequest extends Notification
{
    use Queueable;

    protected $pickup;

    public function __construct($pickup)
    {
        $this->pickup = $pickup;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'pickup_id' => $this->pickup->id,
            'sales_name' => $this->pickup->sales->name,
            'customer' => $this->pickup->customer,
            'message' => "Pengambilan alat baru dari {$this->pickup->sales->name} untuk {$this->pickup->customer}.",
        ];
    }
}
