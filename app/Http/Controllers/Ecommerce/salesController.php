<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Inventory;
use App\Models\Blood_Bank;
use App\Models\Cart;

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
     
     $cart->save();

     return redirect()->back();
    }

    public function myCart() {
      $items = Cart::where('user_id',auth()->id())->get();
      return view('sales.cart',compact('items'));
    }

    public function order() {

    }
}
