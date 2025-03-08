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
        $user->password = Hash::make($req->email);

        $user->save();
        return back();

    }

    public function login(Request $req) {
       $loginData = $req->validate([
           "email"=>"Required",
           "password"=>"Required"
        ]);

        if(auth()->attempt([
            "email"=>$loginData->email,
            "password"=>$loginData->password
        ])){
            $req->session()->regenerate();
        }
        return redirect('');
    }


    public function logout(Request $req) {
       auth()->logout();
       return redirect('');
    }
}
