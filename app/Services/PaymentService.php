<?php
namespace App\Services;

use App\Jobs\AdminJob;
use App\Jobs\OrderJob;
use App\Models\BloodInventory;
use App\Models\Order;
use App\Models\Payment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class PaymentService {

public function PayOnDelivery($total,$mypdf) {
    DB::beginTransaction();
     try{

      $order = Order::where('user_id',Auth::id())->get();
   
      $user = Auth::user();
      // $orderWithoutPayment = $order->filter(function ($myOrder) {
      //  return !Payment::Where('order_id',$myOrder->id)->exists();
      //  });  

      $orderWithoutPayment = Order::where('user_id', Auth::id())
          ->whereDoesntHave('payment')
          ->get();

   
      if($orderWithoutPayment->isEmpty()){
      return [
        "All orders have already been paid",
        ];
     }
      foreach($orderWithoutPayment as $orders){
      
        $inventory = BloodInventory::where("id",$orders->blood_inventory_id)
        ->lockForUpdate()
        ->first();
        
        
        if($inventory->quantity < $orders->quantity) {
          
         $orders->update([
             'status' => 'rejected'
           ]);

         throw new Exception("Insufficient blood stock for order ID: {$orders->id}");  
          
         }

        $inventory->quantity -= $orders->quantity;
        
        $inventory->save();


        $pay = new Payment;
        $pay->order_id = $orders->id;
        $pay->amount = $orders->price;
        $pay->payment_method = "cash_on_delivery";
        $pay->gross_total = $total;
        $pay->user_id = Auth::id();
        $pay->payment_status = "pending";
        $pay->transaction_id = $orders->transaction_id;
        $pay->email = Auth::user()->email;
       
        $paid = $pay->save();

        
        $orders->status = "approved";
        $orders->save();
        
 
        Bus::chain([
         new OrderJob(Auth::user()->email),
         new AdminJob()
        ])->dispatch();
         //event(new UserPaymentEvent($user->email));
        }

        DB::commit();

       

       }  catch (\Exception $e) {
        DB::rollBack(); // Rollback in case of error
        return response()->json([
            "message" => "An error occurred: " . $e->getMessage()
        ], 500);
    }
 }


    public function LatestTransaction() {
            $latestTransaction = Order::where('user_id', Auth::id())
            ->latest()
            ->value('transaction_id');

        return Order::where('user_id', Auth::id())
            ->where('transaction_id', $latestTransaction)
            ->get();
    }


    public function PaymentReciept() {
        
    }




}