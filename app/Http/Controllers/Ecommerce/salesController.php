<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Inventory;
use App\Models\Blood_Bank;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use App\Jobs\AdminJob;
use App\Jobs\OrderJob;
use PDF;

class salesController extends Controller
{
//This Method Displays All The Blood Banks And Available Blood;
    public function Products() {
        $specificBank = Blood_Bank::all();
        
        return view("sales.viewProduct",compact('specificBank'));
    }

    public function buyproduct($id) {
         $user = Blood_Bank::find($id);
         $userData = $user->user_id;
         $product = Blood_Inventory::with('bloodbank')->where("blood_bank_id",$id)->orderBy('blood_type','asc')->get();
         $company = Blood_Inventory::with('bloodbank')->where("blood_bank_id",$id)->first();
        if(auth()->id() !== $userData) {
          return response([
            "Message"=>"You Are Not Authorized To View"
          ]);
        }
        return view('sales.chooseProduct',compact('product','company'));
    }



  // Customer Section Of The Controller
    public function customer_view() {
        $specificBank = Blood_Bank::all();
        return view("sales.customerSalesPoint",compact('specificBank'));
    }

    public function customer_buy($id) {
    $product = Blood_Inventory::with('bloodbank')->where("blood_bank_id",$id)->orderBy('blood_type','asc')->get();
    $company = Blood_Inventory::with('bloodbank')->where("blood_bank_id",$id)->first();
    return view('sales.customerChooseProduct',compact('product','company'));
    }

    public function add2cart(Request $req,$id){
     $item = Blood_Inventory::find($id);
     $item_id = $item->id;
     $item_type = $item->blood_type;
    
     $cart = new Cart;
     $cart->user_id = auth()->id();
     $cart->blood_inventory_id = $item_id;
     $cart->blood_type = $item_type;
     $cart->quantity = $req->quantity;
     $cart->price = $req->quantity * $item->price;
     $cart->email = auth()->user()->email;
     
     $cart->save();

     return redirect()->back();
    }

    public function myCart() {
      $items = Cart::where('user_id',auth()->id())->get();
      return view('sales.cart',compact('items'));
    }

    public function order(Request $req, $id) {
      $user = auth()->id();
      $cart = Cart::where('user_id',$user)->get();

      $user_id = auth()->user()->id;
      foreach($cart as $cart_id){
       $order = new Order;
       $order->user_id = $user_id;
       $order->blood_inventory_id = $cart_id->blood_inventory_id;
       $order->quantity = $cart_id->quantity;
       $order->price = $cart_id->price;
       $order->delivery_address = $req->delivery_address;
       $order->order_date = $req->order_date;
       $order->email = auth()->user()->email;
      
       $order->save();
   
       $cartData = $cart_id->id;
       $cart_remove = Cart::find($cartData);
      
       $cart_remove->delete();
      }
      return redirect('/user_dashboard');
    }




    public function view_order() {

      $order = Order::where('user_id',auth()->id())->get();
      return view('sales.order',compact('order'));
    }




   public function pay_on_delivery($total) {
    DB::beginTransaction();
     try{
       $order = Order::where('user_id',auth()->id())->get();
   
     
      $orderWithoutPayment = $order->filter(function ($myOrder) {
       return !Payment::Where('order_id',$myOrder->id)->exists();
       });  
   
      if($orderWithoutPayment->isEmpty()){
      return [
        "Message"=>"Record Already Exsist",
        ];
     }
      foreach($orderWithoutPayment as $orders){
      
        $inventory = Blood_Inventory::where("id",$orders->blood_inventory_id)->first();
        
        
        if($inventory->quantity < $orders->quantity) {
          return response()->json([
            "message" => "Insufficient blood stock for order ID: " . $orders->id
        ], 400);   
          
         }

        $inventory->quantity -= $orders->quantity;
        $inventory->save();


        $pay = new Payment;
        $pay->order_id = $orders->id;
        $pay->amount = $orders->price;
        $pay->payment_method = "cash_on_delivery";
        $pay->gross_total = $total;
        $pay->user_id = auth()->id();
        $pay->email = auth()->user()->email;
       
        $pay->save();
 
        Bus::chain([
         new OrderJob(auth()->user()->email),
         new AdminJob()
        ])->dispatch();

        }

        DB::commit();

        $payment = Payment::where('user_id',auth()->id())->get();
        $order = Order::where('user_id',auth()->id())->get();
        $pdf = true;
        $pdfDoc = PDF::loadView('sales.podPay',compact('total','order','pdf','payment'));
        return $pdfDoc->download("order_detail.pdf");

       }  catch (\Exception $e) {
        DB::rollBack(); // Rollback in case of error
        return response()->json([
            "message" => "An error occurred: " . $e->getMessage()
        ], 500);
    }
}
    


    public function payment_reciept() {
      $payment = Payment::where('user_id',auth()->id())->get();
      $order = Order::where('user_id',auth()->id())->get();
      return view("sales.payment_reciept",compact('payment','order'));
    }

    public function print_invoice() {
      $payment = Payment::where('user_id',auth()->id())->get();
      $order = Order::where('user_id',auth()->id())->get();
      $pdf = true;
      $pdfDoc = PDF::loadView("sales.payment_reciept",compact('payment','order','pdf'));
      return $pdfDoc->download("order_detail.pdf");
    }
}
