<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\userController;
use App\Http\Controllers\Bank\BloodBankController;
use App\Http\Controllers\Ecommerce\salesController;


Route::get('/', function () {
    return view('welcome');
});

//ROUTE RESPONSIBLE FOR LOGIN, REGISTER, LOGOUT AND OTHERS
Route::controller(userController::class)->group(function(){
   Route::view("register","user.registerForm");
   Route::post("register","register")->name('user.reg');
   Route::view("login","user.loginForm");
   Route::post("login","login")->name('user.login');
});
Route::group(['middleware' => 'auth'],function() {    

    Route::controller(BloodBankController::class)->group(function() {
        Route::view("bloodBankForm","bank.bloodBankForm")->name("form.bloodBank"); // View Form Where You Register Blood Bank;
        Route::Post("reg_bank","reg_bank")->name("bank.register"); //This Route Facilitates Registration Of Blood Banks;
        Route::view("InventoryForm","bank.InventoryForm")->name('view.inventoryForm'); //View Inventory Form For Inventory Registration;
        Route::Post('inventory','RegInventory')->name('reg.inventory');//This Route Facilitates Inventory Registration method at the controller;
    });

    Route::controller(salesController::class)->group(function(){
        Route::Get("view_product","Products")->name('view.products'); //This Route Displays All The Blood Banks And Available Blood;
        Route::Get("add_to_cart","addTocart")->name('blood.add_2_cart'); //This Route is responsible for adding Blood Type To Cart;
   });
   


    
});



