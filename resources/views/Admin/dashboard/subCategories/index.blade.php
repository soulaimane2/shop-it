@extends('admin.admin_master')
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
">
    <p> Total Number Of Categories is : <b id="catCount" class="text-warning"> {{count($subCat)}} </b> </p>
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
                  @foreach ($subCat as $cat)
                  <tr class="table-light">
                    <th id="catId-{{$cat->id}}" scope="row">{{$cat->id}}</th>
                    <td id="subcatName-{{$cat->id}}">{{$cat->subCategory}}</td>
                    <td id="catName-{{$cat->id}}">{{$cat->cats->category_name}}</td>
                    <td>
                        <button id="editCat-{{$cat->id}}" onclick="editSubC({{$cat->id}},{{$cat->category_Id}})" class="btn btn-primary">Edit SubCategory</button> -  <button id="delete-{{ $cat->id }}" onclick="deleteSubCat({{$cat->id}})" class="btn btn-danger">Delete SubCategory</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>    
        </div> 
        <div class="col-sm-6 col-xl-4">
            <form id="addSubCat" action="" method="POST">
                @csrf
                <label for="cat">SubCategory : </label>
                <input name="Subcategory_name" type="text" class="form-control" id="subcatn" /><br>
                <label for="cat">Main Category : </label><br>
                <select class="form-control" aria-label="Default select" id="pCat">
                    <option selected>Parent Category</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach
                  </select>
                <br><br>
                <input id="sub" value="Add SubCategory" class="form-control btn btn-primary" type="submit"/> 
            </form> 
            
            <br><hr><br>
            <form style="display:none" id="editSubCat" action="" method="POST">
                @csrf
                <label> Id : </label>
                <input type='text' class='form-control theDsa' id='Dsa' value="" disabled/>
                <label for="cat">Category : </label>
                <input name="category_name" type="text" class="form-control" id="catname" /><br>
                <label for="cat">Main Category : </label><br>
                <select class="form-control" aria-label="Default select" id="psubCat">
                    <option selected>Parent Category</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                    @endforeach
                  </select>
                <br><br>
                <input id="sub" value="Edit Category" class="form-control btn btn-warning" type="submit"/> 
            </form> 
        </div>   
    
    </div>
</div>
@endsection
@section('ajaxScript')
<script src="{{asset('backend/js/adminJs/categoriesAjax/CatIndex.js')}}"></script>
@endsection