function deleteItem(id){
    
    if(confirm('are you sure ?')){
        $.ajax({
            url:'/admin/products/delete/'+id,
            type:'get',
            success:function(r){
                $('#deleteItem-'+id).parents('tr').fadeOut(100);
            }
        })
    }else{
        console.log("Naaaaaah")
    }
}