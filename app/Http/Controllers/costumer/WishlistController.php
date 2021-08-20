<?php

namespace App\Http\Controllers\costumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product\Product;
use App\Models\costumer\Whishlist;
class WishlistController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('front-end.costumerActions.shop',compact('products'));
    }

    public function addToWishList(Request $r){
        $wish = new Whishlist();
        $wish->costumerId = $r->costumer;
        $wish->productId = $r->product;
        $wish->save();
        return response()->json(200);
    }

    public function showWishes(){
        $wish = Whishlist::all();
        return view('front-end.costumerActions.wishes',compact('wish'));

    }

    public function deleteWishes($id){
        Whishlist::find($id)->delete();
        return redirect()->back();
    }
    
}
