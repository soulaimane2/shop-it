@extends('admin.admin_master')
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
">
    <p> Total Number Of Categories is : <b id="catCount" class="text-warning"> {{count($brands)}} </b> </p>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-8">
            <table id="catList" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">SubCategory Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col"> Actions </th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($brands as $brand)
                  <tr class="table-light">
                    <th id="brandId-{{$brand->id}}" scope="row">{{$brand->id}}</th>
                    <td id="brandName-{{$brand->id}}">{{$brand->brandName}}</td>
                    <td id="brandImage-{{$brand->id}}">
                        <img src="{{asset($brand->brandImage)}}" style="width:150px;height:80px"/>
                    </td>
                    <td>
                        <button id="editBrand-{{$brand->id}}" onclick="editBrand({{$brand->id}})" class="btn btn-primary">Edit Brand</button> -  <button id="delete-{{$brand->id}}" onclick="deleteBrand({{$brand->id}})" class="btn btn-danger">Delete Brand</button>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>    
        </div> 
        <div class="col-sm-6 col-xl-4">
            <form id="addBrand" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="cat">Brand Name : </label>
                <input name="brandName" type="text" class="form-control" id="brandName" /><br>
                <label for="cat">Brand Image : </label>
                <input name="brandImage" type="file" class="form-control" id="brandImage" />
                <br><br>
                <input id="sub" value="Add Brand" class="form-control btn btn-primary" type="submit"/> 
            </form> 
            
            <br><hr><br>
            <form style="display:none" id="editBrand" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center"> Edit Brand </h2>
                <label> Id : </label>
                <input type='text' class='form-control theDsa' id='Dsa' value="" disabled/>
                <label for="cat">Category : </label>
                <input name="brandName" type="text" class="form-control" id="BName" /><br>
                <label for="cat">Brand Image : </label>
                <input name="brandImage" type="file" class="form-control" id="BImage" />
                <br><br>
                <br><br>
                <input id="subm" value="Edit Category" class="form-control btn btn-warning" type="submit"/> 
            </form> 
        </div>   
    
    </div>
</div>
@endsection
@section('ajaxScript')
<script src="{{asset('backend/js/adminJs/categoriesAjax/CatIndex.js')}}"></script>
@endsection