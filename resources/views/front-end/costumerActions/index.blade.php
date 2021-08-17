@extends('home.home_master')
@section('home')
<div class="container">
    <h1> Hello {{ Auth::guard('costumer')->user()->FullName }} </h1>

    <div class="row">
        <div class="col-8">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus velit voluptate quasi ab consectetur aliquam quidem reprehenderit dolorem praesentium veritatis magni, ullam reiciendis, aspernatur ipsa debitis corporis nesciunt dolores mollitia.</p>
        </div>
    </div>
</div>
@endsection