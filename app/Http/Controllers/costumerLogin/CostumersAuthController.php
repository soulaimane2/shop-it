<?php

namespace App\Http\Controllers\costumerLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CostumersAuthController extends Controller
{
    //

    public function __construct()
        {
        }

    public function index(){
        if(Auth::guard('costumer')->check()){
           return redirect('/costumer/'. Auth::guard('costumer')->id());
        }
        return view('Home.homeLogin');
    }

    public function authenticate(Request $request){
        
        

        if(Auth::guard('costumer')->attempt($request->only('email', 'password'))){
            return redirect('/costumer/');
        }

        return back()->withInput($request->only('email'));
    }

    public function Costumerlogout(){
        Auth::guard('costumer')->logout();
        return redirect()->back();
    }
}
