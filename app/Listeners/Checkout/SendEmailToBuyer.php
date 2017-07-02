<?php

namespace App\Listeners\Checkout;

use App\Events\Checkout\SaleCreated;
use App\Mail\Checkout\SaleConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToBuyer
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function handle(SaleCreated $event)
    {
        Mail::to($event->sale->buyer_email)->send(new SaleConfirmation($event->sale));
    }
}
