<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class salesController extends Controller
{
    //This Method Displays All The Blood Banks And Available Blood;
    public function Products() {
        $product = Blood_Inventory::all();
        return view("sales.viewProduct",compact('product'));
    }


    public function addToCart() {

    }
}
