@extends('Home.home_master')
@section('productStyle')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
@endsection
@section('home')
<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Car Electronics</a></li>
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <li class="brand"><a href="#">Apple</a></li>
                            <li class="brand"><a href="#">Beoplay</a></li>
                            <li class="brand"><a href="#">Google</a></li>
                            <li class="brand"><a href="#">Meizu</a></li>
                            <li class="brand"><a href="#">OnePlus</a></li>
                            <li class="brand"><a href="#">Samsung</a></li>
                            <li class="brand"><a href="#">Sony</a></li>
                            <li class="brand"><a href="#">Xiaomi</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                
                <!-- Shop Content -->

                <div class="shop_content">
                    <div class="shop_bar clearfix">
                        <div class="shop_product_count"><span>186</span> products found</div>
                        <div class="shop_sorting">
                            <span>Sort by:</span>
                            <ul>
                                <li>
                                    <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                    <ul>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                        <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                        <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product_grid">
                        <div class="product_grid_border"></div>

                        <!-- Product Item -->
                        @foreach ($products as $item)
                        <div class="product_item discount">
                            <div class="product_border"></div>
                            <div style="overflow:hidden" class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($item->MainImage)}}" alt=""></div>
                            <div class="product_content">
                                <div class="product_price">{{$item->amount}}<span>${{($item->discount + $item->amount)}}</span></div>
                                <div class="product_name"><div><a href="#" tabindex="0">{{$item->ProductName}}</a></div></div>
                            </div>
                            @php
                                $wishl = App\Models\costumer\Whishlist::pluck('productId')->toArray();
                                $cost = App\Models\costumer\Whishlist::pluck('costumerId')->toArray();
                                if(in_array($item->id,$wishl) && in_array(Auth::guard('costumer')->id(),$cost)){
                                    $color = "red";
                                }else{
                                    $color = "";
                                }
                            @endphp
                            <div id="addWishList-{{$item->id}}" onclick='addtowhishlist({{$item->id}},{{Auth::guard("costumer")->id()}})'class="product_fav"><i style="color:{{$color}}" class="fas fa-heart"></i></div>
                            <ul class="product_marks">
                                <li class="product_mark product_discount">{{'-'.ceil(($item->discount / ($item->discount + $item->amount)) * 100 ) . '%'}}</li>
                                <li class="product_mark product_new">new</li>
                            </ul>
                        </div>
                        @endforeach
                        <!-- Product Item -->
                        


                    </div>

                    <!-- Shop Page Navigation -->

                    <div class="shop_page_nav d-flex flex-row">
                        <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                        <ul class="page_nav d-flex flex-row">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">21</a></li>
                        </ul>
                        <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scriptProduct')
<script src="{{asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('frontend/js/shop_custom.js')}}"></script>



<script>

function addtowhishlist(id,auth){
    $.ajax({
        url:'/shop/add',
        type:'post',
        data:{
            "_token" : "{{ csrf_token() }}",
            "product" : id,
            "costumer" : auth
        },
        success:function(r){
            $('#addWishList-'+id+' i').css("color", "red");
        }
    })
}
</script>
@endsection