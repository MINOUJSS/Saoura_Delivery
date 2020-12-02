$(document).ready(function(){
    // var host=window.location.host;
    // var url=window.location.protocol+'//'+host+'/admin/user/load_table';
    // alert(url);
    // $('#datatable').append("ok");   
});
//::::::::::::::::::My sweet alerts functions:::::::::::::
//delete category function
$('body').on('click','#delete_category',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    category_name=me.attr('title'),
    category_id=me.attr('category_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف الصنف'+ category_name + ' ؟',
        text:'لا يمكنك إستعادت هذه المعلومات بعد الحذف',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , إحذفه!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            $.ajax({
                url:url,
                type:"GET",
                data:{
                    '_method':'GET','_token':csrf_token
                },
                //success delete message                
                success:function(response){
                    $('#datatable').ready(function(){
                        window.location.reload(true);
                    });                    
                    swal.fire({
                        icon:'success',
                        title:"رائع",
                        text:"تم حذف الصنف"+category_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف الصنف لسبب غير معروف',
                        confirmButtonText:"حسناً"
                    });

                }
            });            
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية الحذف",
                text:"تم إلغاء الحذف ... جميع المعلومات محفوظة",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//delete sub_category function
$('body').on('click','#delete_sub_category',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    sub_category_name=me.attr('title'),
    sub_category_id=me.attr('sub_category_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف تحت الصنف'+ sub_category_name + ' ؟',
        text:'لا يمكنك إستعادت هذه المعلومات بعد الحذف',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , إحذفه!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            $.ajax({
                url:url,
                type:"GET",
                data:{
                    '_method':'GET','_token':csrf_token
                },
                //success delete message                
                success:function(response){
                    $('#datatable2').ready(function(){
                        window.location.reload(true);
                    });                                     
                    swal.fire({
                        icon:'success',
                        title:"رائع",
                        text:"تم حذف تحت الصنف"+sub_category_name
                    });                          
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف تحت الصنف لسبب غير معروف',
                        confirmButtonText:"حسناً"
                    });

                }
            });            
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية الحذف",
                text:"تم إلغاء الحذف ... جميع المعلومات محفوظة",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//delete sub_sub_category function
$('body').on('click','#delete_sub_sub_category',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    sub_sub_category_name=me.attr('title'),
    sub_sub_category_id=me.attr('sub_category_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف تحت تحت الصنف'+ sub_sub_category_name + ' ؟',
        text:'لا يمكنك إستعادت هذه المعلومات بعد الحذف',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , إحذفه!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            $.ajax({
                url:url,
                type:"GET",
                data:{
                    '_method':'GET','_token':csrf_token
                },
                //success delete message                
                success:function(response){
                    $('#datatable3').ready(function(){
                        window.location.reload(true);
                    });                                                           
                    swal.fire({
                        icon:'success',
                        title:"رائع",
                        text:"تم حذف تحت تحت الصنف"+sub_sub_category_name
                    }); 
                    // window.location.href="/admin/categories#sub_sub_category";                                                           
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف تحت تحت الصنف لسبب غير معروف',
                        confirmButtonText:"حسناً"
                    });

                }
            });            
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية الحذف",
                text:"تم إلغاء الحذف ... جميع المعلومات محفوظة",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//redirecte to the right tabs
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})