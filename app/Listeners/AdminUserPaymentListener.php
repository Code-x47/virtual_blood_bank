<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Order;
use App\Models\Blood_Bank;
use App\Mail\UserPaymentMail;
use App\Events\UserPaymentEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminUserPaymentListener
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
        $admin = User::where('designation','admin')->get();
        $userOrder = Order::where('email',$event->email)->get();
 
        $summary = [];

        foreach($userOrder AS $order) {
            $bloodbankid = $order->blood_inventory->blood_bank_id;
            $bank = Blood_Bank::find($bloodbankid);
            $summary[] = [
           'email'=> $order->email,
           'quantity' => $order->quantity,
           'type' => $order->blood_inventory->blood_type,
           'blood_bank' => $bank->name
         ];
         }

         Mail::to($admin->pluck('email'))->send(new UserPaymentMail($summary));
    }  
}
