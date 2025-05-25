<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Faker\Core\Blood;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\BloodInventory;
use App\Models\Blood_Bank;

class adminController extends Controller
{
    public function adminFunction() {
        $order = Order::paginate(5);
        $countOrders = Order::count();
        $revenue = Payment::sum('amount');
        $countUsers = User::count();
        $users = User::paginate(10);
        $payment = Payment::paginate(5);
        $inventory = BloodInventory::paginate(5);
        $bank = Blood_Bank::paginate(5);

        
        return view('sales.adminDashboard',compact('order','countUsers','countOrders','revenue','users','payment','inventory','bank'));
    } 

    //ORDER METHODS
    public function editOrder(Order $order){
     return view('sales.adminOrderUpdate',compact('order'));
    }

    public function AdminOrderUpdate(Request $req) {
       $order = Order::find($req->id);
       $order->quantity = $req->quantity;
       $order->price = $req->price;
       $order->delivery_address = $req->delivery_address;
       $order->status = $req->order_status;
       $order->save();

       return redirect()->route('admin.dash');
    }

 

    public function AdminOrderDelete($id) {
      $order = Order::find($id);
      $order->delete();
      return back();
    }

    //END OF ORDER METHODS

    //USER METHODS
    public function editUser(User $editUser) {
     return view("user.admin.adminUserUpdate",compact('editUser'));
    }

    public function adminUpdateUser(Request $req) {
      $user = User::find($req->id);
      $user->name = $req->name;
      $user->email = $req->email;
      $user->phone = $req->phone;
      $user->address = $req->address;
      $user->usertype = $req->usertype;
      $user->role = $req->role;

      $user->save();
      return redirect()->route('admin.dash');
    }

    public function AdminDeleteUser($id) {
      $delete = User::find($id);
      $delete->delete();
      return back();
    }
    

    //Admin Dashboard Payment METHODS
    
    public function editPayment($id) {
      $pay = Payment::find($id);
      return view("sales.adminPaymentUpdate",compact('pay'));
    }

    public function updatePayment(Request $req) {
       $update = Payment::find($req->id);
       $update->amount = $req->amount;
       $update->payment_method = $req->payment_method;
       $update->payment_status = $req->payment_status;

       $update->save();
       return redirect()->route('admin.dash');
    }

    public function deletePayment($id) {
      $delete = Payment::find($id);
      $delete->delete();
      return back();
    }
    
}
