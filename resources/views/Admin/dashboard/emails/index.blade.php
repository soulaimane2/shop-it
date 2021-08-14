@extends('admin.admin_master')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
background:#f8f8f8
">
    <p> Total Number Of Emails is : <b id="catCount" class="text-warning"> {{count($emails)}} </b> </p>
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <table id="EmailList" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col"> Actions </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($emails as $email)
                  <tr class="table-light">
                    <th id="couponId-{{$email->id}}" scope="row">{{$email->id}}</th>
                    <td id="coupon-{{$email->id}}">{{$email->email}}</td>
                    
                    <td>
                          <button id="deleteCoupon-{{ $email->id }}" onclick="deleteCoupon({{$email->id}})" class="btn btn-danger">Delete Email</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>    
        </div> 
        
    
    </div>
</div>
@endsection
@section('ajaxScript')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>

    $('#EmailList').DataTable();

    
function deleteCoupon(id){
    $.ajax({
        url:'/admin/Email/delete/'+id,
        type:'get',
        success:function(){
            $('#deleteCoupon-'+id).parents('tr').fadeOut(400);
        }
    })
}
    </script>
@endsection
