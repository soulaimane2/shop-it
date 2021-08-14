$(document).ready(function (){

    /**Adding categories */
    $('#addCat').submit(function (e){
        e.preventDefault();
        
        let category = $('#catn').val();
        let _token = $('input[name=_token]').val();
        $.ajax({
            url:"/admin/categories/add",
            type:'POST',
            data:{
                category_name : category,
                _token : _token
            },
            success: function(r){
                $('#addCat')[0].reset();

                $('#catList').append('<tr class="table-light">'+
                '<th id="catId-'+r.id+'" scope="row">'+r.id+'</th>'+
               ' <td id="catName-'+r.id+'">'+r.category_name+'</td>'+
               '<td>'+
               '<button class="btn btn-primary" id="editCat-'+r.id+'" onclick="editP('+r.id+')"> Edit Category </button> -  <button id="delete-'+r.id+'" onclick="deleteCat('+r.id+')" class="btn btn-danger">Delete Category</button></td>'+
               
              '</tr>');
              var catCount= parseInt($('#catCount').text()) + 1;
              $('#catCount').text(catCount);
            }
        })
        
    })

    /**end Adding Categories */
    

    /**Update */

    $('#editCat').submit(function (e){
        e.preventDefault();
        let id = $('#Dsa').val();
        let category = $('#catname').val();
        let _token = $('input[name=_token]').val();
        $.ajax({
            url:"/admin/categories/update/"+id,
            type:'POST',
            data:{
                category_name : category,
                _token : _token
            },
            success: function(r){
                $('#editCat')[0].reset();
                $("#catId-"+r.id).text(r.id);
                $("#catName-"+r.id).text(r.category_name);
                console.log("updated !");
                $('#editCat').fadeOut(500)
            }
        })
        
    })
    
});


    /**Edit  */
function editP(id){

   $("#catname").val($("#editCat-"+id).parents('tr').children('td')[0].innerText);
   $("#Dsa").val($("#editCat-"+id).parents('tr').children('th')[0].innerText)
   $("#editCat").fadeIn(500)

}

function deleteCat(id){
    


    $.ajax({
        url:"/admin/categories/delete/"+id,
        type:"get",
        success:function(){
            $("#delete-"+id).parents('tr').fadeOut(500);
            var catCount= parseInt($('#catCount').text()) - 1;
            $('#catCount').text(catCount);
        }
    })
}


/*************SubCategory CRUD */

$('#addSubCat').submit(function (e){
    e.preventDefault();
    

    let subCat = $("#subcatn").val()
    let mainCat = $("#pCat").val()
    let token = $('input[name=_token]').val();

    $.ajax({
        url:"/admin/subcategories/add",
        type:"post",
        data:{
            SubCategory : subCat,
            category_Id : mainCat,
            _token : token
        },
        success:function(r){
            console.log(r);
            $('#catList').append('<tr class="table-light">'+
                '<th id="catId-'+r.id+'" scope="row">'+r.id+'</th>'+
               ' <td id="catName-'+r.id+'">'+r.subCategory+'</td>'+
               '<td id="catName-'+r.id+'">'+$('#pCat option:selected').text()+'</td>'+
               '<td>'+
               '<button class="btn btn-primary" id="editCat-'+r.id+'" onclick="editP('+r.id+')"> Edit Category </button> -  <button id="delete-'+r.id+'" onclick="deleteCat('+r.id+')" class="btn btn-danger">Delete Category</button></td>'+
               
              '</tr>');
              var catCount= parseInt($('#catCount').text()) + 1;
              $('#catCount').text(catCount);
        }
    })
})

function editSubC(id,catId){

    $("#catname").val($("#editCat-"+id).parents('tr').children('td')[0].innerText);
   $("#Dsa").val($("#editCat-"+id).parents('tr').children('th')[0].innerText)
   $("#editSubCat").fadeIn(500)
   $('#psubCat').val(catId)
 }


 $('#editSubCat').submit(function (e){
    e.preventDefault();
    
    let subCatId = $("#Dsa").val()
    let mainCat = $("#catname").val()
    let parentCat = $("#psubCat").val()
    let token = $('input[name=_token]').val();
    let parentCatText = $("#psubCat option:selected").text();
    $.ajax({
        url:"/admin/subcategories/update/"+subCatId,
        type:"post",
        data:{
            SubCategory : mainCat,
            category_Id:parentCat,
            _token : token
        },
        success: function(r){
            $('#editSubCat')[0].reset();
            $("#catId-"+r.id).text(r.id);
            $("#subcatName-"+r.id).text(r.subCategory);
            $("#catName-"+r.id).text(parentCatText);
            console.log("updated !");
             $('#editSubCat').fadeOut(500)
        }
    })
    
})

//**Delete sub Cats */
function deleteSubCat(id){
    


    $.ajax({
        url:'/admin/subcategories/delete/'+id,
        type:'get',
        success:function(){
            $("#delete-"+id).parents('tr').fadeOut(500);
            var catCount= parseInt($('#catCount').text()) - 1;
            $('#catCount').text(catCount);
        }
    })
}

/**SubCategories CRUD end */


/**Brand CRUD */
//add
$("#addBrand").submit(function(e){
    e.preventDefault();

    var _token = $('input[name=_token]').val();
    var brandName = $('#brandName').val();
    var brandImage = $('#brandImage')[0].files;

    if(brandImage.length > 0){
        var fd = new FormData(this);
        // fd.append('brandImage',brandImage[0]);
        // fd.append('_token',_token);
        // fd.append('brandName',brandName)
    

    $.ajax({
        url :"/admin/brands/add",
        method:"post",
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success:function(r){
            

            $('#catList').append('<tr class="table-light">'+
            '<th id="brandId-'+r[0].id+'" scope="row">'+r[0].id+'</th>'+
           ' <td id="brandName-'+r[0].id+'">'+r[0].brandName+'</td>'+
           ' <td id="brandName-'+r[0].id+'"><img src="'+r[1]+'" style="width:150px;height:80px"/></td>'+
           '<td>'+
           '<button class="btn btn-primary" id="editCat-'+r.id+'" onclick="editP('+r.id+')"> Edit Brand </button> -  <button id="delete-'+r.id+'" onclick="deleteCat('+r.id+')" class="btn btn-danger">Delete Brand</button></td>'+
           
          '</tr>');
          var catCount= parseInt($('#catCount').text()) + 1;
          $('#catCount').text(catCount);
          $('#addBrand')[0].reset();
        }
    })
}
})


//delete 
function deleteBrand(id){
    

    $.ajax({
        url:'/admin/brands/delete/'+id,
        type:'get',
        success:function(){
            $("#delete-"+id).parents('tr').fadeOut(500);
            var catCount= parseInt($('#catCount').text()) - 1;
            $('#catCount').text(catCount);
            console.log("deleted")
        }
    })
}

//edit

function editBrand(id){
    $("#BName").val($("#editBrand-"+id).parents('tr').children('td')[0].innerText);
   $("#Dsa").val($("#editBrand-"+id).parents('tr').children('th')[0].innerText)
   $("#editBrand").fadeIn(500)
}

$("#editBrand").submit(function(e){
    e.preventDefault();

    var brandImage = $('#BImage')[0].files;

    if(brandImage.length > 0){
        var fd = new FormData(this);
    
    $.ajax({
        url :"/admin/brands/update/"+$("#Dsa").val(),
        method:"post",
        data:fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success:function(r){
            $("#editBrand-"+$("#Dsa").val()).parents('tr').children('td')[0].innerText = r[0].brandName;
            $("#editBrand-"+$("#Dsa").val()).parents('tr').children('td').children('img').attr('src',r[1])
            $("#editBrand").fadeOut(500)
        }
    })
}
})