<?php

namespace App\Providers;


use App\Models\Order;
use App\Policies\Order_Policy;
use App\Models\Payment;
use App\Policies\PaymentPolicy;
use App\Models\BloodInventory;
use App\Policies\BloodInventoryPolicy;



use Illuminate\Support\ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    
    /**
     * Register Policies.
     */

     protected $policies = [
        BloodInventory::class => BloodInventoryPolicy::class,
        Order::class => Order_Policy::class,
        Payment::class => PaymentPolicy::class,
      ];
    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
