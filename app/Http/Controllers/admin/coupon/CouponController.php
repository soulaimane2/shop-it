<?php

namespace App\Http\Controllers\admin\coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon\Coupon;
class CouponController extends Controller
{
    //

    public function couponsList(){
        $coupons = Coupon::all();
        return view('admin.dashboard.coupons.index',compact('coupons'));
    }

    public function addCoupon(Request $r){
        $coupon = new Coupon();
        $coupon->coupon = $r->Coupon;
        $coupon->coupon_percentage = $r->percentage;
        $coupon->save();

        return response()->json($coupon, 200);
    }

    public function deleteCoupon($id){
        Coupon::find($id)->delete();
        return response()->json(200);
    }
}
