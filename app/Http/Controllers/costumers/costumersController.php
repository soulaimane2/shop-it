<?php

namespace App\Http\Controllers\costumers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loginUsers\Costumer;
use Illuminate\Support\Facades\Hash;
use App\Models\costumer\Whishlist;
use Auth;
class costumersController extends Controller
{
    //


    public function addCostumer(Request $r){
        $costumer = new Costumer();
        $costumer->FullName = $r->FullName;
        $costumer->email = $r->email;
        $costumer->password = Hash::make($r->password);
        $costumer->Country = $r->country;
        $costumer->IpAddress = $r->ip();
        
        $costumer->save();

        return redirect()->to('/costumer');

    }



    public function costumerIndex(){
        $wishList = Whishlist::all()->where('costumerId',Auth::guard('costumer')->user()->id);
        return view('front-end.costumerActions.index',compact('wishList'));
    }
}
