<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartRepository implements CartInterface {
    
  public function ViewCart() {
    return Cart::where('user_id',Auth::id())->get() ?? collect(); 
  }
}