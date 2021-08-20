@extends('home.home_master')
@section('home')
<div class="container">
    <table class="table">
        <thead>
            <h3> Your wishlist </h3>
          <tr>
            <th scope="col">#</th>
            <th scope="col" colspan="3">Product</th>
          </tr>
        </thead>
        <tbody>  
            @if($wish == NULL) 
                <h3> No Product On Your Wishlist </h3>
            @else
            @foreach($wish as $wishl)
            {{-- @if($wishl->costumers->id == Auth::guard('costumer')->user()->id) --}}
            <tr>
                <th scope="row">{{$wishl->id}}</th>
                <td>{{$wishl->products->ProductName}}</td>
                <td><img src="{{asset($wishl->products->MainImage)}}" style="width:100px;height:50px"/></td>
                <td><a href="/wishlist/delete/{{$wishl->id}}" class="btn btn-danger"> Remove from wishes </a></td>
            </tr>
            {{-- @endif --}}
          @endforeach
            @endif             
          
        </tbody>
      </table>
</div>
@endsection