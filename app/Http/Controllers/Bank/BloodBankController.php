<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blood_Bank;

class BloodBankController extends Controller
{
    public function reg_bank(Request $req) {
       $formData =  $req->validate([
          "name"=>"Required",
          "email"=>"Required",
          "address"=>"Required",
          "phone"=>"Required",
          "city"=>"Required",
         ]);

         $bankreg = new Blood_Bank;

         $bankreg->name = $req->name;
         $bankreg->email = $req->email;
         $bankreg->address = $req->address;
         $bankreg->phone = $req->phone;
         $bankreg->city = $req->city;
         $bankreg->user_id = auth()->id();
         
         $bankreg->save();
         return redirect()->back();
      
       }

       public function RegInventory(Request $req) {
         $req->validate([
         "blood_type"=>"Required",
         "quantity"=>"Required",
         "expiry_date"=>"Required"
         ]);

          $bloodbank = Blood_Bank::where("user_id",auth()->id())->get();

          $inventory = new Blood_Inventory;
          $inventory->blood_bank_id = $bloodbank->id;
          $inventory->blood_type = $req->blood_type;
          $inventory->quantity = $req->quantity;
          $inventory->expiry_date = $req->expiry_date;

          $inventory->save();
          return back();
        }
}
