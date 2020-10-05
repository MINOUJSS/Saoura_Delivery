$(document).ready(function(){
    // var host=window.location.host;
    // var url=window.location.protocol+'//'+host+'/admin/user/load_table';
    // alert(url);
    // $('#datatable').append("ok");   
});
//::::::::::::::::::My sweet alerts functions:::::::::::::
//delete user function
$('body').on('click','#delete_user',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    user_name=me.attr('title'),
    user_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المشترك '+user_name+' ؟',
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
                    '_method':'DELETE','_token':csrf_token
                },
                //success delete message
                success:function(response){
                    $('#datatable').ready(function(){
                        window.location.reload(true);
                    });
                    swal.fire({
                        icon:'success',
                        title:"رائع",
                        text:"تم حذف المشترك "+user_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف المشترك لسبب غير معروف',
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