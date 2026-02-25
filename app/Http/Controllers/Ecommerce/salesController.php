<?php

namespace App\Http\Controllers\Ecommerce;

use App\Events\UserPaymentEvent;
use App\Http\Controllers\Controller;
use App\Jobs\AdminJob;
use App\Jobs\OrderJob;
use App\Models\Blood_Bank;
use App\Models\BloodInventory;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Policies\BloodInventoryPolicy;
use App\Repositories\CartInterface;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\PaymentService;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class salesController extends Controller
{

  use AuthorizesRequests;

//This Method Displays All The Blood Banks And Available Blood;

    public function Products() {
        $specificBank = Blood_Bank::all();
        
        return view("sales.viewProduct",compact('specificBank'));
    }

    public function buyProduct($id) {
         $user = Auth::user();
         $userdata = $user->blood_bank->id;
        
         //dd($userdata);
         
          
         //$product = BloodInventory::with('bloodbank')->where("blood_bank_id",$userdata)->orderBy('blood_type','asc')->get();
          $product = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->orderBy('blood_type','asc')->get();
         //$company = BloodInventory::with('bloodbank')->where("blood_bank_id",$id)->first();
        
          

         if ($product->isEmpty()) {
           return redirect()->route('view.products')->with('error','You Have No Record');
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

    //CART METHODS STARTS HERE

    public function add2cart(CartService $add_to_Cart,Request $req,$id){
          
     try { $add_to_Cart->AddToCart($req->quantity,$id);
     
     Alert::success('Product Added Successfully', 'Your Request Has Been Added To Cart');

     return redirect()->route('customer.my_cart')
                      ->with('success', 'Product added to cart successfully');
     }  catch (\Exception $e) {

        return back()->withErrors([
            'quantity' => $e->getMessage()
        ])->withInput();
    }

    }

    public function remove_cart(CartService $cart_delete, $id) {
     $cart_delete->CartDelete($id);
     return back();
    }

    public function myCart(CartInterface $view_cart) {
      $items = $view_cart->ViewCart();
      return view('sales.cart',compact('items'));
    }

    public function redirectToCart()
    {
    //  Set the session flag to allow access
    session(['allowed_to_view_cart' => true]);

    //  Redirect to the actual cart route
     return redirect()->route('customer.my_cart');
     }

     //CART METHODS ENDS HERE


    //THIS METHOD IS RESPONSIBLE FOR PLACING ORDERS
      public function order(OrderService $myOrder, Request $req, $id) {
        
        $req->validate([
        'delivery_address' => 'required|string|max:255',
        'order_date' => 'required|date',
        ]);

      $myOrder->MakeOrder($req->delivery_address,$req->order_date,$id);
      Alert::success('Product Ordered Successfully', 'Your Order Has Been Placed');

      return redirect()->route('order');
    }



    //THIS METHOD IS RESPONSIBLE FOR VIEWING ORDERS
    public function view_order(OrderService $ViewMyOrder) {
      $order = $ViewMyOrder->ViewOrder();
      return view('sales.test',compact('order'));
    }

    public function cancel_order(Order $order) {
       $order->delete();
       return back();
    }




   public function pay_on_delivery(PaymentService $POD, PDF $mypdf,$total) {
       $POD->PayOnDelivery($total, $mypdf); 

       $payment = Payment::where('user_id',Auth::id())->latest()->first();
       
       $order = $POD->LatestTransaction();
      
       $pdf = true;
       $pdfDoc = $mypdf->loadView('sales.podPay',compact('total','order','pdf','payment'));
       return $pdfDoc->download("order_detail.pdf");
    }
    


    public function payment_reciept() {
      $payment = Payment::where('user_id',Auth::id())
                           ->latest()
                           ->first();
                          
                 
      $latestpayment = Order::where('user_id',Auth::id())
                           ->latest()
                           ->value('transaction_id');

      $order = Order::with('payment')
                   ->where('user_id',Auth::id())
                   ->where('transaction_id', $latestpayment)
                   ->get();

                
       return view("sales.payment_reciept",compact('payment','order','latestpayment'));
    }

    public function print_invoice(PaymentService $PrintInvoice, PDF $mypdf) {

        $payment = Payment::where('user_id',Auth::id())
                              ->latest()
                              ->first();

          $order =  $PrintInvoice->LatestTransaction();

          $pdf = true;
          $pdfDoc = $mypdf->loadView("sales.payment_reciept",compact('payment','order','pdf'));
          return $pdfDoc->download("order_detail.pdf");
    }

 //Test Method
     function test() {
        $user = Auth::user();
        $order = Order::where('user_id',$user->id)->get();
         
        $result = [];
          
        foreach($order As $orders) {
          
        $inventory = $orders;

        $result[] = [
           'email' => $inventory->email,
           'status' => $inventory->status,
           'inventory_id' => $inventory->blood_inventory_id
        ];
           
        }

        //dd($result);
          
          
          foreach($result As $data) {
          //dd($data);
           
          $inventoryId = BloodInventory::where("id",$data['inventory_id'])->get();
          //($inventoryId);
          foreach($inventoryId AS $inventory) {
            $summary[] = [
              'blood_bank_id' => $inventory->blood_bank_id,
              'bank_type' => $inventory->blood_type,

          ];
          }
         
        
          
          }

          foreach($summary As $summ) {

          $bank_id = Blood_Bank::where('id',$summ['blood_bank_id'])->get();
          foreach($bank_id AS $bank)
          $bankCreds[] = [
          'email' => $bank->email,
          ];

          }

          

          dd($bankCreds);
          

            //dd($summary);
           
           return view('Mail.tester',compact('summary')); 
                    

          
        

       
        
         }


   


}
