@extends('admin.admin_master')
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.live{
  position: relative;
}
.live i{
  position: absolute;
  font-size: 37px;
  color:#388e3c;
}
</style>
@endsection
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
background:#f8f8f8
">

    <p> Total Number Of Products is : <b id="catCount" class="text-warning"> {{count($products)}} </b> </p>
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">

            <table id="ProductList" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"> Status </th>
                    <th scope="col"> Actions </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr class="table-light">
                    <th id="productId-{{$product->id}}" scope="row">{{$product->ProductCODE}}</th>
                    <td id="productName-{{$product->id}}">{{$product->ProductName}}</td>
                    <td id="productCat-{{$product->id}}">{{$product->productCategory->category_name}}</td>
                    <td id="productCatSub-{{$product->id}}">{{$product->productBrand->brandName}}</td>
                    <td id="ProductQntt-{{$product->id}}">{{$product->Quantity}}</td>
                    <td id="status-{{$product->id}}">
                      <span class="badge bg-success">Live</span>
                    </td>
                    
                    <td>
                        <button  onclick="deleteItem({{$product->id}})" id="deleteItem-{{ $product->id }}" onclick="" class="btn btn-danger">
                          <i class="fas fa-trash"></i>

                        </button> - 
                          <a href="/products/{{$product->id}}" class="btn btn-primary">
                            <i class="far fa-eye"></i>
                          </a> - 
                          <a href="/admin/products/edit/{{$product->id}}" id="editProduct-{{ $product->id }}" class="btn btn-warning">
                            <i class="far fa-edit"></i>
                          </a> - 
                          <span class="live" id="LiveProduct-{{ $product->id }}" onclick="">
                            <i class="fas fa-toggle-on"></i>
                          </span> - 
                          
                          
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
$('#ProductList').DataTable();
</script>
<script src="{{ asset('backend/js/adminJs/products/product.js') }}"></script>    
@endsection