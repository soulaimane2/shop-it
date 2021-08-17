@extends('home.home_master')

@section('home')
<div class="container">

    <form action='{{ url('/Userlogin/auth') }}' method="POST">

        @csrf
        <label> Email : </label><br>
        <input class="form-control" name="email" type="email" placeholder="email :" required/>
        <br>
        <label> Password : </label>
        <br>
        <input class="form-control" name="password" type="password" placeholder="password :" />
        <br>
        <input style="width:200px;" class="btn btn-primary p-3"name="sub" value="LOGIN" type="submit"/>
        
        </form>

</div>

@endsection