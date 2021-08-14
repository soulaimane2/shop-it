@extends('admin.admin_master')
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
">
    <p> Total Number Of Categories is : <b id="catCount" class="text-warning"> {{count($coupons)}} </b> </p>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-8">
            <table id="couponList" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Coupon</th>
                    <th scope="col">Reduction</th>
                    <th scope="col"> Actions </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($coupons as $coupon)
                  <tr class="table-light">
                    <th id="couponId-{{$coupon->id}}" scope="row">{{$coupon->id}}</th>
                    <td id="coupon-{{$coupon->id}}">{{$coupon->coupon}}</td>
                    
                    <td id="coupon-{{$coupon->id}}">{{$coupon->coupon_percentage}}</td>
                    <td>
                          <button id="deleteCoupon-{{ $coupon->id }}" onclick="deleteCoupon({{$coupon->id}})" class="btn btn-danger">Delete Coupon</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>    
        </div> 
        <div class="col-sm-6 col-xl-4">
            <form id="addSubCat" action="" method="POST">
                @csrf
                <label for="cat">Coupon : </label>
                <input name="Coupon" type="text" class="form-control" id="coupon" />      <br>
                <label for="cat">Percentage : </label>
                <input name="percentage" type="number" min="1" max="100" class="form-control" id="coupon" />           
                <br><br>
                <input id="sub" value="Add SubCategory" class="form-control btn btn-primary" type="submit"/> 
            </form> 
        </div>   
    
    </div>
</div>
@endsection
@section('ajaxScript')
<script src="{{asset('backend/js/adminJs/Coupons/coupons.js')}}"></script>
@endsection