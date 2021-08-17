@extends('home.home_master')
@section('home')
    <div class="container">
        <h2> Register : </h2>
        <form action="{{url('/register/add')}}" method="POST">
            @csrf
            <label> Full Name : </label>
            <input class="form-control" type="text" name="FullName" />
            <label> Email : </label>
            <input class="form-control" type="email" name="email" />
            <label> Password : </label>
            <input class="form-control" type="password" name="password" />
            <label> Country : </label>
            <select name="country" id="countries" class="form-select p-3 m-2 text-success" aria-label="Default select example">
                <option selected> Choose your country : </option>
            </select><br>
            <input class="btn btn-primary" type="submit" name="flName" value="Register"/>
        </form>
    </div>
    
@endsection
@section('scriptProduct')
<script>
    $(document).ready(function(){
        $.ajax({
        url:"https://api.first.org/data/v1/countries",
        type:"get",
        success:function(r){
            for(const a in r.data){
                $('#countries').append('<option name="'+r.data[a].country+'" style="width:300px !important">'+r.data[a].country+'</option>')
            }
        }
    })
    })
</script>
@endsection
