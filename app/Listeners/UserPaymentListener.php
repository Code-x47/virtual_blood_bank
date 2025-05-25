<?php

namespace App\Listeners;

use App\Models\Order;
use App\Mail\UserPaymentMail;
use App\Events\UserPaymentEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPaymentListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserPaymentEvent $event): void
    {
        $myOrder = Order::where('email',$event->email)->get();
        foreach($myOrder As $order) {
          Mail::to($event->email)->send(new UserPaymentMail($order->email,$order->quantity,$order->blood_inventory->blood_type));
        }
       
    }
}
