@extends('admin.admin_master')
@section('style')
<link href="{{asset('backend/css/admin/addProduct.style.css')}}" rel="stylesheet" />
@endsection
@section('adminContent')
<div class="sl-pagebody" style="position: absolute;
top: 60px;
right: 0;
left: 230px;
background:#f8f8f8
">
    <h1> Add a product : </h1>
    <form style="line-height: 35px;" action="{{url('/admin/products/update/'.$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="col-form-label"> Product Name : <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="productName" id="#productName" value="{{$product->ProductName}}"/>
        <label class="col-form-label"> Product Code : <span class="text-danger">*</span> </label>
        <input class="form-control" type="text" name="productCode" id="#productCode" value="{{$product->ProductCODE}}"/>
        <label class="col-form-label"> Quantity Name : <span class="text-danger">*</span> </label>
        <input class="form-control" type="number" name="quantity" id="#quantity" value="{{$product->Quantity}}"/>
       <br>
        <div class="row p-2" style="width: 100%;margin:auto;padding:15px">
        <label class="col-form-label p-2"> Discount Name : </label>
        <input class="form-control col" type="number" name="discount" id="#discount" value="{{$product->discount}}"/>
        <label class="col-form-label p-2"> Selling Price : <span class="text-danger">*</span></label>
        <input class="form-control col" type="number" name="price" id="#price" value="{{$product->amount}}"/>
       </div>
       <br>
        <div class="sliders row p-2" style="width: 100%;margin:auto;padding:15px">
            <label class="col-form-label p-2"> Category : <span class="text-danger">*</span></label>
            <select name="category" class="form-select col form-control" id="category">
                <option value="{{$product->productCategory->id}}" selected> 
                    {{$product->productCategory->category_name}}
                </option>
                @foreach ($cats as $cat)
                    <option value="{{$cat->id}}"> 
                        {{$cat->category_name}} 
                    </option>
                @endforeach
            </select>
            <label  class="col-form-label p-2"> Subcategory : <span class="text-danger">*</span> </label>
            <select name="subcategory" class="form-select col form-control" id="subcategory">
                <option value="{{$product->productSubCategory->id}}" selected> 
                    {{$product->productSubCategory->subCategory}}
                </option>
                
            </select>
            <label class="col-form-label p-2"> Brand : <span class="text-danger">*</span></label>
            <select name="brand" class="form-select col form-control" id="brand">
                <option value="{{$product->productBrand->id}}" selected> 
                    {{$product->productBrand->brandName}}
                </option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}"> 
                        {{$brand->brandName}} 
                    </option>
                @endforeach
            </select>
        </div>
        <label class="col-form-label"> Product Size : </label>
        <input name="size" class="form-control" type="" id="size" value="{{$product->sizes}}"/>
        <label class="col-form-label"> Product Color : </label>
        <input name="color" class="form-control" type="" id="color" value="{{$product->colors}}"/>
        <label class="col-form-label"> Description : <span class="text-danger">*</span></label>
        <div class="ourEditor" style="border-radius: 2px;border:.5px solid #7c7c7c; background-color: #ffffff">
            {{-- <div id="toolbar-container"></div> --}}
            <textarea name="desc" id="editor" style="height: 400px">
                {{$product->description}}
            </textarea>
        </div>
        <label class="col-form-label"> Video Link : <span class="text-danger">*</span></label>
        <input name="video" class="form-control" type="url" type="video" value="{{$product->videoLink}}"/>
        <div class="row">
            <label class="col-form-label p-3 col-2"> Main Image : <span class="text-danger">*</span></label>
            <input class="form-control mt-3 col-4" type="file" id="mainImage" name="mainImage"/>
            <label class="col-form-label p-3 col-2"> Other Images : <span class="text-danger">*</span></label>
            <input class="form-control mt-3 col-4" type="file" id="uploadFile" name="uploadFile[]" multiple/>
        </div>
        <div class="row">
            <div class="col displayImageContainer">
                <label> Product Images : <span class="text-danger">*</span></label>
                <div id="displayField" class="uploadField">
                </div>
            </div>
        </div>
        <label class="col-form-label"> Sliders : <span class="text-danger">*</span></label>
        <div class="sliders row " style="width: 90%;margin:auto">
            <div  class="col-4" >
                <input name="MainSlider" class="form-check-input" type="checkbox" value="MainSlider" id="MainSlider">
                <label class="form-check-label" for="flexCheckDefault">
                    Main Slider
                </label>            </div>
            <div  class="col-4" >
                <input class="form-check-input" type="checkbox" name="HotDeal" value="HotDeal" id="HotDeal">
                <label class="form-check-label" for="flexCheckDefault">
                    Hot Deal
                </label>            </div>
            <div  class="col-4" >
                <input name="BestRated" class="form-check-input" type="checkbox" value="BestRated" id="BestRated">
                <label class="form-check-label" for="flexCheckDefault">
                    Best Rated
                </label>            </div>
            <div  class="col-4" >
                <input name="trendProduct" class="form-check-input" type="checkbox" value="trendProduct" id="trendProduct">
                <label class="form-check-label" for="flexCheckDefault">
                    Trend Product
                </label>            </div>
            <div  class="col-4" >
                <input name="Midslider" class="form-check-input" type="checkbox" value="Midslider" id="Midslider">
                <label class="form-check-label" for="flexCheckDefault">
                    Mid Slider
                </label>            </div>
            <div  class="col-4" >
                <input name="HotNew" class="form-check-input" type="checkbox" value="HotNew" id="HotNew">
                <label class="form-check-label" for="flexCheckDefault">
                    Hot New
                </label>            </div>
                <div  class="col-4" >
                    <input name="buyOne" class="form-check-input" type="checkbox" value="buyOne" id="buyOne">
                    <label class="form-check-label" for="flexCheckDefault">
                        Buy One Get One
                    </label>            </div>
        </div>
        <br><br>
        <input class="btn btn-success" type="submit" value="Add Product" id="sub"/>        
        <input class="btn btn-primary" type="button" value="Cancel" id="can"/>
    </form>
</div>
@endsection
@section('ajaxScript')
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/decoupled-document/ckeditor.js"></script>
<script>
    DecoupledEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $('#mainImage').change(function(){
        $('#displayField').html("");  
           var total_file=document.getElementById("uploadFile").files[0];        
            
            
            $('#displayField').append("<img class='mainImg' src='"+URL.createObjectURL(event.target.files[0])+"' />");
                    
           
    })
    $("#uploadFile").change(function(){        
           $('#displayField').html("");  
           var total_file=document.getElementById("uploadFile").files.length;        
           for(var i=0;i<total_file;i++)        
           {  
            
            $('#displayField').append("<img alt='"+document.getElementById("uploadFile").files[i].lastModified+"' src='"+URL.createObjectURL(event.target.files[i])+"' />");
                    
           }

           $('#displayField').on('click',function(e){
              if(e.target.localName === 'img'){
                   $(e.target).fadeOut();
                }
            
           })
        
        });
</script>
<script>
    $('#category').change(function(){
        var id = $('#category').find(':selected').val();

        $.ajax({
            url:'/admin/products/getSubs/'+id,
            method:"get",
            success:function(r){
                console.log(r)
                var lenSub = r.length

                for(var i=0;i<lenSub;i++){
                    $('#subcategory').append("<option value='"+r[i].id+"'>"+r[i].subCategory+"</option>")
                }
            }
        })
    })



    const checkedField = "{{ $product->sliders }}".split(',')
    console.log(checkedField)
    for(var i of checkedField){
        $('#'+i).prop('checked',true);
    }

</script>
@endsection

