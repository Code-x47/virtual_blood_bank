<?php

namespace App\Services;

use App\Models\BloodInventory;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartService {

//DELETE CART ITEMS
    public function CartDelete($data) {
        $delete = Cart::find($data);
        $delete->delete();
        }


//ADD ITEMS TO CART
    public function AddToCart($quantity,$data) {
      
    $item = BloodInventory::findOrFail($data);

     $item_id = $item->id;
     $item_type = $item->blood_type;

     if($item->quantity < $quantity){
        throw new \Exception("Only {$item->quantity} items left in stock.");
     }
        

     $cart = new Cart;
     $cart->user_id = Auth::id();
     $cart->blood_inventory_id = $item_id;
     $cart->blood_type = $item_type;
     $cart->quantity = $quantity;
     $cart->price = $quantity * $item->price;
     $cart->email = Auth::user()->email;

     $cart->save();
     
    }

   
}