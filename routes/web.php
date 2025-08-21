<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\General\userController;
use App\Http\Controllers\Bank\BloodBankController;
use App\Http\Controllers\Ecommerce\salesController;



//Public Routes
Route::view("/","index");
Route::view("about","about");


//ROUTE RESPONSIBLE FOR LOGIN, REGISTER, LOGOUT AND OTHERS
Route::controller(userController::class)->group(function(){
   Route::view("register","user.registerForm")->name('user.reg');
   Route::post("register","register")->name('user.registration');
   Route::view("login","user.loginForm")->name('user.login');
   Route::post("/login","login");  //->name('user.login');
   

   Route::Get("/logout","logout");
});


Route::middleware(['web', 'auth', 'designation'])
          ->group(function () {
        Route::controller(BloodBankController::class)->group(function() {
        Route::view("/agent_dashboard","sales.agentDashboard")->name('agent.dashboard');
        Route::view("bloodBankForm","bank.bloodBankForm")->name("form.bloodBank"); // View Form Where You Register Blood Bank;
        Route::Post("reg_bank","reg_bank")->name("bank.register"); //This Route Facilitates Registration Of Blood Banks;
        Route::view("InventoryForm","bank.InventoryForm")->name('view.inventoryForm'); //View Inventory Form For Inventory Registration;
        Route::Post('inventory','RegInventory')->name('reg.inventory');//This Route Facilitates Inventory Registration method at the controller;
        Route::Get('agent_view_order','view_orders')->name('bank.view_orders'); 
        Route::Get('agent_view_payment','view_payment')->name('bank.view_payment'); 
        //Route::Get('test','test');
});
});

Route::group(['middleware' => 'auth'],function() { 
       
        Route::controller(salesController::class)->group(function(){
        Route::view("/user_dashboard","sales.userDashboard")->name('user.dashboard');
        Route::view("/admin_dashboard","sales.adminDashboard")->name('admin.dashboard');
        Route::get("buyproduct/{id}", 'buyProduct')->name('seeInventory')->middleware('seeInventory');   
       
       
        Route::Get("/view_product","Products")->name('view.products')->middleware(['designation']); //This Route Displays All The Blood Banks And Available Blood;
        Route::Get("add_to_cart","addTocart")->name('blood.add_2_cart'); //This Route is responsible for adding Blood Type To Cart;
       
        Route::Get('remove_item/{id}','agent_remove_item')->name('agent_remove_item');
        Route::view("dash","sales.dashboard_template");
        Route::Get("test","test");
  

        //Customers Controller Section
        Route::Get("/customer_view_product","customer_view")->name('view.products_by_customers'); //This Route Displays All The Blood Banks And Available Blood;
        Route::Get('/customerBuy/{id}','customer_buy'); //This Route Is Responsible For Viewing Items Your Desire To Add To Cart
        Route::Get('/addToCart/{id}','add2cart')->name('customer.add2cart'); //This Route Is Responsible For Adding Item To Cart
        Route::Get("cart_redirect","redirectToCart")->name('customer.cart.redirect');
        Route::Get('/removeCart/{id}','remove_cart')->name('customer.removeCart'); //This Route Removes Items From, Cart
        Route::Get('/myCart','myCart')->name('customer.my_cart'); //This Route Is Responsible For Dispalying A specific Users Cart Items
        Route::Get('/order_now/{id}','order')->name('order'); //This Route Is For Ordering Products

        Route::Get('view_order','view_order')->name('order_table'); //This Route Displays A specific user's Order
        Route::Get('cancel_order/{order}','cancel_order')->name('customer.cancel_order'); //Order Cancellation Route
        Route::Get('pod/{total}','pay_on_delivery')->name('order.pod'); //This Route Is Responsible For POD Payments
        Route::Get('card_pay/{total}','card_payment')->name('order.card_pay'); //This Route Is For Card Payment
        Route::Get('payment_reciept','payment_reciept')->name('pay.pod');
        Route::Get("print_pdf","print_invoice")->name('printPdf');
        });
    
});



//ADMIN DASBOARD ROUTES SECTION

Route::group(['middleware'=>['auth','adminRoute']], function() {
    Route::controller(adminController::class)->group(function() {
    Route::get('/admin_dashboard','adminFunction')->name('admin.dash');
    //ADMIN DASHBOARD ORDER ROUTES
    Route::get("edit/{order}","editOrder")->name('admin.edit');
    Route::Post("update_order","AdminOrderUpdate")->name('admin.update_order');
    Route::get("delete_order/{id}","AdminOrderDelete")->name('admin.delete_order');

    //ADMIN DASHBOARD USER ROUTES
    Route::get("admin_edit/{editUser}",'editUser')->name("admin.edit_user");
    Route::Post("update_user","adminUpdateUser")->name("admin.update_user");
    Route::get("delete_user/{id}","adminDeleteUser")->name("admin.delete_user");

    //ADMIN DASHBOARD PAYMENT ROUTES
    Route::get("admin_edit_payment/{id}","editPayment")->name('admin.edit_payment');
    Route::Post("admin_update_payment","updatePayment")->name('admin.update_payment');
    Route::get("admin_delete_payment/{id}","deletePayment")->name("admin.delete_payment");


    });

  
  });
 



