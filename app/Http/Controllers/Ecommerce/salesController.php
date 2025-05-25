<?php

namespace App\Http\Controllers\Ecommerce;

use PDF;
use App\Models\Cart;
use App\Models\Order;
use App\Jobs\AdminJob;
use App\Jobs\OrderJob;
use App\Models\Payment;
use App\Models\Blood_Bank;
use Illuminate\Http\Request;
use App\Models\BloodInventory;
use App\Events\UserPaymentEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use App\Http\Controllers\Controller;
use App\Policies\BloodInventoryPolicy;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class salesController extends Controller
{

  use AuthorizesRequests;

//This Method Displays All The Blood Banks And Available Blood;

public function test()
{
    dd(Alert::class);
}


    public function Products() {
        $specificBank = Blood_Bank::all();
        
        return view("sales.viewProduct",compact('specificBank'));
    }

    public function buyProduct($id) {
         $user = auth()->user();
         $userdata = $user->blood_bank->id;
         /*$bloodInventory = BloodInventory::where("blood_bank_id",$id)
                          ->firstOrFail();
          $bank_id     =   $bloodInventory->blood_bank_id;  
           */             
         //dd($user->blood_bank->id);
         
         $product = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->orderBy('blood_type','asc')->get();
         //$company = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->first();
        
          if($product->isEmpty()) {
            return redirect()->back()->with('error','You Have No Record');
          }
          $company = $product->first();
         
         return view('sales.chooseProduct',compact('product','company'));
    }

    //Agents Can Remove Items From Table
    public function agent_remove_item($id) {
      $remove = BloodInventory::find($id);

      //dd($remove);
      if($remove->order->count() > 0) {
        return redirect()->back()->with('error','Order Is  Still In Use You Cannot Delete'); 
      }

      $remove->delete();
      return redirect()->back()->with('success', 'Inventory deleted successfully.');;
    }


  // Customer Section Of The Controller
    public function customer_view() {
        $specificBank = Blood_Bank::all();
        return view("sales.customerSalesPoint",compact('specificBank'));
    }

    public function customer_buy($id) {
    $product = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->orderBy('blood_type','asc')->get();
    $company = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->first();
    return view('sales.customerChooseProduct',compact('product','company'));
    }

    public function add2cart(Request $req,$id){
     $item = BloodInventory::find($id);
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
     Alert::success('Product Added Successfully', 'Your Request Has Been Added To Cart');

     return redirect()->back();
    }

    public function remove_cart($id) {
     $cart = Cart::find($id);
     $cart->delete();
     return back();
    }

    public function myCart() {
      $items = Cart::where('user_id',auth()->id())->get();
      return view('sales.cart',compact('items'));
    }

    public function redirectToCart()
    {
    // ✅ Set the session flag to allow access
    session(['allowed_to_view_cart' => true]);

    // ➡️ Redirect to the actual cart route
     return redirect()->route('customer.my_cart');
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
      Alert::success('Product Ordered Successfully', 'Your Order Has Been Placed');

      return redirect()->back();
    }




    public function view_order() {

      $order = Order::where('user_id',auth()->id())
                       ->where('status','pending')
                       ->get();
      return view('sales.order',compact('order'));
    }

    public function cancel_order(Order $order) {
       $order->delete();
       return back();
    }




   public function pay_on_delivery($total) {
    DB::beginTransaction();
     try{
       $order = Order::where('user_id',auth()->id())->get();
   
       $user = auth()->user();
      $orderWithoutPayment = $order->filter(function ($myOrder) {
       return !Payment::Where('order_id',$myOrder->id)->exists();
       });  
   
      if($orderWithoutPayment->isEmpty()){
      return [
        "Message"=>"Record Already Exsist",
        ];
     }
      foreach($orderWithoutPayment as $orders){
      
        $inventory = BloodInventory::where("id",$orders->blood_inventory_id)->first();
        
        
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
       
        $paid = $pay->save();

        
        $orders->status = "approved";
        $orders->save();
        
 
        Bus::chain([
         new OrderJob(auth()->user()->email),
         new AdminJob()
        ])->dispatch();
         event(new UserPaymentEvent($user->email));
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
      $payment = Payment::where('user_id',auth()->id())
                           ->latest()
                           ->first();
                 
      $orders = Order::with('payment')
                   ->where('user_id',auth()->id())
                   ->get();

       if($orders->isEmpty()) {
        return view('sales.payment_reciept')
                 ->with([
                  'payment' => $payment,
                  'orders' => $orders,
                  "error"=>"Its Not Proper To Print An Empty Reciept"
                 ]);
       }            
       return view("sales.payment_reciept",compact('payment','orders'));
    }

    public function print_invoice() {
      $payment = Payment::where('user_id',auth()->id())->get();
      $order = Order::where('user_id',auth()->id())->get();
      $pdf = true;
      $pdfDoc = PDF::loadView("sales.payment_reciept",compact('payment','order','pdf'));
      return $pdfDoc->download("order_detail.pdf");
    }


   


}
