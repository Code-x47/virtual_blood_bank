<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function register(Request $req) {
        $req->validate([
            "name"=>"Required",
            "email"=>"Required",
            "password"=>"Required",
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);

        $user->save();
        return redirect('/login');

    }

    public function login(Request $req) {

       $loginData = $req->validate([
           "email"=>"Required",
           "password"=>"Required"
        ]);
        $sessiondata = $req->input();

        if(auth()->attempt([
            "email"=>$loginData['email'],       
            "password"=>$loginData['password']          
        ])){
            
            $req->session()->Put('data',$sessiondata['email']);
        }
        $user = auth()->user();
      
        if($user->designation == "admin") {
        
            return redirect('/admin_dashboard');
           
            
        }
           
          
            else if($user->designation == "agent"){
            return redirect('/agent_dashboard');
            }
           
            
        
        
        else {
           
            return redirect('/user_dashboard'); 
         
        }
    
           
    }


    public function logout(Request $req) {
       auth()->logout();
       return redirect('/login');
    }
}
