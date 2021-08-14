@extends('admin.admin_master')
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
">
    <p> Total Number Of Categories is : <b id="catCount" class="text-warning"> {{count($categories_Data)}} </b> </p>
    <div class="row row-sm">
        <div class="col-sm-6 col-xl-8">
            <table id="catList" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col"> Actions </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories_Data as $cat)
                  <tr class="table-light">
                    <th id="catId-{{$cat->id}}" scope="row">{{$cat->id}}</th>
                    <td id="catName-{{$cat->id}}">{{$cat->category_name}}</td>
                    <td>
                        <button id="editCat-{{$cat->id}}" onclick="editP({{$cat->id}})" class="btn btn-primary">Edit Category</button> -  <button id="delete-{{ $cat->id }}" onclick="deleteCat({{$cat->id}})" class="btn btn-danger">Delete Category</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>    
        </div> 
        <div class="col-sm-6 col-xl-4">
            <form id="addCat" action="" method="POST">
                @csrf
                <label for="cat">Category : </label>
                <input name="category_name" type="text" class="form-control" id="catn" /><br>
                <input id="sub" value="Add Category" class="form-control btn btn-primary" type="submit"/> 
            </form> 
            
            <br><hr><br>
            <form style="display:none" id="editCat" action="" method="POST">
                @csrf
                <label> Id : </label>
                <input type='text' class='form-control theDsa' id='Dsa' value="" disabled/>
                <label for="cat">Category : </label>
                <input name="category_name" type="text" class="form-control" id="catname" /><br>
                <input id="sub" value="Edit Category" class="form-control btn btn-warning" type="submit"/> 
            </form> 
        </div>   
    
    </div>
</div>
@endsection
@section('ajaxScript')
<script src="{{asset('backend/js/adminJs/categoriesAjax/CatIndex.js')}}"></script>
@endsection