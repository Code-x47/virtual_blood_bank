<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Models\Blood_Bank;
use App\Models\BloodInventory;
use App\Models\Order;
use App\Models\Payment;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::id();
        $exsitingBank = Blood_Bank::where('user_id',$user)->first();

        if($exsitingBank){
          return response([
            "Message"=>"User Already Exsist"
          ]);
         }
         $bankreg = new Blood_Bank;

         $bankreg->name = $req->name;
         $bankreg->email = $req->email;
         $bankreg->address = $req->address;
         $bankreg->phone = $req->phone;
         $bankreg->city = $req->city;
         $bankreg->user_id = Auth::id();
         

         $bankreg->save();
         return redirect()->back();
      
       }

       public function RegInventory(Request $req) {
         $req->validate([
         "blood_type"=>"Required",
         "quantity"=>"Required",
         "expiry_date"=>"Required",
         "price"=>"Required"
         ]);
          
          $bloodbank = Blood_Bank::where("user_id",Auth::id())->first();
          
          if(!$bloodbank) {
            return response([
              'Message'=>"User Not An Agent"
            ]);
          }
          $bloodbank_id = $bloodbank->id;
          

          $inventory = new BloodInventory;
          $inventory->blood_bank_id = $bloodbank_id;
          $inventory->blood_type = $req->blood_type;
          $inventory->quantity = $req->quantity;
          $inventory->expiry_date = $req->expiry_date;
          $inventory->price = $req->price;
           
          $inventory->save();
          return back();
        }
        
        public function view_orders() {
          $user = Auth::user();

           
         if (!$user->blood_bank) {
          return back()->with('error', 'You are not assigned to any blood bank.');
         }

          $userBank = $user->blood_bank->id;
          $inventory = BloodInventory::where("blood_bank_id", $userBank)->pluck('id');
          $order = Order::with('blood_inventory')
                   ->whereIn('blood_inventory_id',$inventory)->paginate(5);
                    
          return view('bank.viewOrder',compact('order'));
        }
        
        public function view_payment() {
          $user = Auth::user();

          if (!$user->blood_bank) {
          return back()->with('error', 'You are not assigned to any blood bank.');
          }

          $userBank = $user->blood_bank->id;
          $inventory = BloodInventory::where("blood_bank_id", $userBank)->pluck('id');
          $order = Order::with('blood_inventory')
                      ->whereIn('blood_inventory_id',$inventory)->pluck('id');
                     
          $payment = Payment::whereIn('order_id',$order)->paginate(5);
          return view('bank.viewPayment',compact('payment'));
        }

        
}
