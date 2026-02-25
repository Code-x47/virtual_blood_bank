<?php
namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderService {

    //THIS METHOD IS RESPONSIBLE FOR PLACING ORDERS
        public function MakeOrder($delivery_address, $order_date, $data) {
        
        $user = Auth::user();
        $cart = Cart::where('user_id',$user->id)
                     ->get();
        $transactionId = 'txn_' . Str::random(10);


        foreach($cart as $cart_id){
        $order = new Order;
        $order->user_id = $user->id;
        $order->blood_inventory_id = $cart_id->blood_inventory_id;
        $order->quantity = $cart_id->quantity;
        $order->price = $cart_id->price;
        $order->transaction_id = $transactionId;
        $order->delivery_address = $delivery_address;
        $order->order_date = $order_date;
        $order->email = $user->email;
        
        $order->save();
        
        $cart_id->delete();
        
        }

        }

        public function ViewOrder() {
            return Order::where('user_id',Auth::id())
                        ->whereIn('status', ['pending','rejected'])
                        ->get();
        }
}