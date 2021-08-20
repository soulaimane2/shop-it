@extends('home.home_master')
@section('home')
<div class="container">
    <h1> Hello {{ Auth::guard('costumer')->user()->FullName }} </h1>

    <div class="row">
        <div class="col-8">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus velit voluptate quasi ab consectetur aliquam quidem reprehenderit dolorem praesentium veritatis magni, ullam reiciendis, aspernatur ipsa debitis corporis nesciunt dolores mollitia.</p>
        </div>
        <div class="col-4">
            <table class="table">
                <thead>
                    <h3> Your wishlist </h3>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="3">Product</th>
                  </tr>
                </thead>
                <tbody>  
                    @if($wishList == NULL) 
                        <h3> No Product On Your Wishlist </h3>
                    @else
                    @foreach($wishList as $wishl)
                    {{-- @if($wishl->costumers->id == Auth::guard('costumer')->user()->id) --}}
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$wishl->products->ProductName}}</td>
                        <td><img src="{{asset($wishl->products->MainImage)}}" style="width:100px;height:50px"/></td>
                        <td><a href="/wishlist" > Go to wishlist </a></td>
                    </tr>
                    {{-- @endif --}}
                  @endforeach
                    @endif             
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection