



$("#newsletter").on('submit',function(e){
    e.preventDefault();
    
    let data = $(this).serialize();

    $.ajax({
        url: "/admin/Emails/add",
        type:"post",
        data:data,
        success:function(r){
            console.log('added')
            $('#newsletter')[0].reset();
            $('body').append('<div id="alertN" style="bottom: 0;right: 10px;" class=" alert alert-success position-fixed bottom-0 end-0" role="alert">'+
            'Your 20% coupon have been sent ! YEEEEEEY'+
          '</div>')
          $("#alertN").delay( 800 ).fadeOut(400)
        }
    })

})


