// add coupons

$("#addSubCat").on("submit",function(e){
    e.preventDefault();
    
    let fd = $(this).serialize();
    console.log(fd)
    $.ajax({
        url : "/admin/coupons/add",
        type:"post",
        data:fd,
        success:function(r){
            $("#couponList").append('<tr class="table-light">'+
           ' <th id="couponId-'+r.id+'" scope="row">'+r.id+'</th>'+
            '<td id="coupon-'+r.id+'">'+r.coupon+'</td>'+
            
            '<td id="coupon-'+r.id+'">'+r.coupon_percentage+'</td>'+
            '<td>'+
                 ' <button id="deleteCoupon-'+r.id+'" onclick="deleteCoupon('+r.id+')" class="btn btn-danger">Delete Coupon</button>'+
            '</td>'+
          '</tr>')
        }
    })
})


function deleteCoupon(id){
    $.ajax({
        url:'/admin/coupons/delete/'+id,
        type:'get',
        success:function(r){
            $('#deleteCoupon-'+id).parents('tr').fadeOut(500)
            var catCount= parseInt($('#catCount').text()) - 1;
            $('#catCount').text(catCount);
        }
    })
}