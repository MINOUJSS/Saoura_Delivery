// const { ajax } = require("jquery");
$(document).ready(function(){
    // var host=window.location.host;
    // var url=window.location.protocol+'//'+host+'/admin/user/load_table';
    // alert(url);
    // $('#datatable').append("ok"); 
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);  
});

//function to select category and show sub category
$('select[name="product_category"]').on('change',function(){
    var category_id=$(this).val();
    // alert(window.location.host+'/admin/sub-category/get_sub_categories_from_category_id/'+category_id);
    $.ajax({
        url:'../../admin/sub-category/get_sub_categories_from_category_id/'+category_id,
        Type:'GET',
        dataType:'json',
        success:function(data)
        {
                if(data!='<option value="0">إختر تحت الصنف</option>')
                {
                    document.getElementById('product_sub_category').innerHTML=data;                        
                }                            
            
        }
    });
});
//function to select sub_category and show sub sub category
$('select[name="product_sub_category"]').on('change',function(){    
    var sub_category_id=$(this).val();
    // alert(window.location.host+'/admin/sub-category/get_sub_categories_from_category_id/'+category_id);
    $.ajax({
        url:'../sub-sub-category/get_sub_sub_categories_from_category_id/'+sub_category_id,
        Type:'GET',
        dataType:'json',
        success:function(data)
        {
                if(data!='<option value="0">إختر تحت تحت الصنف</option>')
                {
                    document.getElementById('product_sub_sub_category').innerHTML=data;                        
                }                            
            
        }
    });
});
//function to get total price of product
$('#product_Purchasing_price').on('keyup',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price'); 
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_to_magazin_price').on('keyup',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_to_consumer_price').on('keyup',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_ombalage_price').on('keyup',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_adds_price').on('keyup',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');        
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
//
$('#product_Purchasing_price').on('change',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price'); 
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_to_magazin_price').on('change',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_to_consumer_price').on('change',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_ombalage_price').on('change',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');    
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
});
$('#product_adds_price').on('change',function()
{
    var Purchasing_price=$('#product_Purchasing_price');
    var to_magazin_price=$('#product_to_magazin_price');
    var to_consumer_price=$('#product_to_consumer_price');
    var ombalage_price=$('#product_ombalage_price');    
    var adds_price=$('#product_adds_price');
    var global_price=$('#product_global_price');        
    var price1=Number(Purchasing_price.val());          
    var price2=Number(to_magazin_price.val());
    var price3=Number(to_consumer_price.val());
    var price4=Number(ombalage_price.val());
    var price5=Number(adds_price.val());

    if(Purchasing_price.val()==''){price1=0;}
    if(to_magazin_price.val()==''){price2=0;}
    if(to_consumer_price.val()==''){price3=0;}
    if(ombalage_price.val()==''){price4=0;}
    if(adds_price.val()==''){price5=0;}
    var $total=price1+price2+price3+price4+price5;
    global_price.val($total);
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
//delete deal function
$('body').on('click','#delete_deal',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    deal_name=me.attr('title'),
    deal_id=me.attr('deal_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف عرض '+ deal_name + ' ؟',
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
                        text:"تم حذف العرض"+deal_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف العرض لسبب غير معروف',
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
//delete sid deal function
$('body').on('click','#delete_sid_deal',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    deal_name=me.attr('title'),
    deal_id=me.attr('deal_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف عرض '+ deal_name + ' ؟',
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
                        text:"تم حذف العرض"+deal_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف العرض لسبب غير معروف',
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
//delete product function
$('body').on('click','#delete_product',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    product_name=me.attr('title'),
    product_id=me.attr('deal_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المنتج '+ product_name + ' ؟',
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
                        text:"تم حذف المنتج"+product_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف المنتج لسبب غير معروف',
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
//delete product_seo function
$('body').on('click','#delete_product_seo',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    product_name=me.attr('title'),
    product_id=me.attr('deal_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف الكلمات المفتاحية للمنتج '+ product_name + ' ؟',
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
                        text:"تم حذف الكلمات المفتاحية للمنتج"+product_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف الكلمات المفتاحية للمنتج لسبب غير معروف',
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
//delete brand function
$('body').on('click','#delete_brand',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    brand_name=me.attr('title'),
    brand_id=me.attr('brand_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف العلامة التجارية '+ brand_name + ' ؟',
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
                        text:"تم حذف العلامة التجارية"+brand_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف العلامة التجارية لسبب غير معروف',
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
//delete color function
$('body').on('click','#delete_color',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    color_name=me.attr('title'),
    color_id=me.attr('color_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف اللون  '+ color_name + ' ؟',
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
                        text:"تم حذف اللون "+color_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف اللون  لسبب غير معروف',
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
//delete size function
$('body').on('click','#delete_size',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    size_name=me.attr('title'),
    size_id=me.attr('size_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المقاس  '+ size_name + ' ؟',
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
                        text:"تم حذف المقاس "+size_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف اللون  لسبب غير معروف',
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
//delete consummer function
$('body').on('click','#delete_consumer',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    consumer_name=me.attr('title'),
    consumer_id=me.attr('color_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المستهلك  '+ consumer_name + ' ؟',
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
                        text:"تم حذف المستهلك "+consumer_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف المستهلك  لسبب غير معروف',
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
//delete supplier function
$('body').on('click','#delete_supplier',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    supplier_name=me.attr('title'),
    supplier_id=me.attr('supplier_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المورد  '+ supplier_name + ' ؟',
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
                        text:"تم حذف المورد "+supplier_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف اللون  لسبب غير معروف',
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
//delete user function
$('body').on('click','#delete_user',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    user_name=me.attr('title'),
    user_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المستخدم  '+ user_name + ' ؟',
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
                        text:"تم حذف المستخدم "+user_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف اللون  لسبب غير معروف',
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
$('body').on('click','#delete_product_color',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    color_name=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف اللون  '+ color_name + ' من المنتج؟',
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
                        text:"تم حذف اللون "+color_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف اللون  لسبب غير معروف',
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
$('body').on('click','#delete_product_image',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    image_name=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف الصورة  '+ image_name + ' من المنتج؟',
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
                        text:"تم حذف الصورة "+image_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف الصورة  لسبب غير معروف',
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
$('body').on('click','#delete_product_size',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    size_name=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المقاس  '+ size_name + ' من المنتج؟',
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
                        text:"تم حذف المقاس "+size_name
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف المقاس  لسبب غير معروف',
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
$('body').on('click','#delete_discount',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    discount=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف التخفيض  '+ discount + ' من المنتج؟',
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
                        text:"تم حذف التخفيض "+discount
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف التخفيض  لسبب غير معروف',
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
//delete product from order
$('body').on('click','#delete_order_product',function(event){
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    product=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف المنتج  '+ product + ' من الطلب؟',
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
                        text:"تم حذف المنتج "+product
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف المنتج  لسبب غير معروف',
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
$('body').on('click','#delete_deny_order_obs',function(event){    
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    obs=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف سبب إلغاء الطلب  '+ obs + '؟',
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
                        text:"تم حذف السبب "+obs
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف السبب  لسبب غير معروف',
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
//delete return order obs
$('body').on('click','#delete_return_order_obs',function(event){    
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    obs=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف سبب إرجاع الطلب  '+ obs + '؟',
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
                        text:"تم حذف السبب "+obs
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف السبب  لسبب غير معروف',
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
//delete upsale
$('body').on('click','#delete_up_sale',function(event){    
    event.preventDefault();
    var me=$(this),
    url=me.attr('url'),
    obs=me.attr('title'),
    // color_id=me.attr('user_id'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد حذف العلاقة بين المنتجين ؟',
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
                        text:"تم حذف العلاقة "
                    });                    
                },
                //error delete message
                error:function(xhr){
                    console.log(xhr);
                    swal.fire({
                        icon:'error',
                        title:'خطأ',
                        text:'لم يتم حذف العلاقة  لسبب غير معروف',
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
//confirm order
$('body').on('click','#confirm_order',function(event){
    event.preventDefault();
    var me=$(this),
    order_id=me.attr('data-order'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد تأكيد الطلب  ؟',
        text:'لا يمكنك التراجع عن هذه العملية لاحقاً',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , تأكيد الطلب!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            confirm_order(order_id);
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية التأكيد",
                text:"تم إلغاء تأكيد الطلب",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//ship order
$('body').on('click','#ship_order',function(event){
    event.preventDefault();
    var me=$(this),
    order_id=me.attr('data-order'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد إرسال الطلب  ؟',
        text:'لا يمكنك التراجع عن هذه العملية لاحقاً',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , إرسال الطلب!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            ship_order(order_id);
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية الإرسال",
                text:"تم إلغاء إرسال الطلب",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//ship order
$('body').on('click','#complate_order',function(event){
    event.preventDefault();
    var me=$(this),
    order_id=me.attr('data-order'),
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    swal.fire({
        title:'هل تريد تسليم الطلب  ؟',
        text:'لا يمكنك التراجع عن هذه العملية لاحقاً',
        icon: 'warning',
        showCancelButton:true,
        confirmButtonColor:'#d33',
        cancelButtonColor:'#3085d6',
        confirmButtonText:'نعم , تسليم الطلب!',
        cancelButtonText:'لا'
    }).then((result)=>{
        if(result.value)
        {
            //send data to delete page
            complate_order(order_id);
        }else
        {
            //cancel message
            swal.fire({
                icon:'info',
                title:"إلغاء عملية التسليم",
                text:"تم إلغاء تسليم الطلب",
                confirmButtonText:"حسناً"
            });
        }
    });

});
//::::::::::::::::::::::end sweet alert:::::::::::::::::::::::::

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
//::::::::::::::ajax functions::::::::
//confirm order
function confirm_order(order_id)
{
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    $.ajax({
        url:"/admin/order/"+order_id+"/confirm",
        method:"GET",
        data:{
            '_method':'GET','_token':csrf_token
        },
        //success message                
        success:function(response){ 
            // console.log(response);                   
            swal.fire({
                icon:'success',
                title:"رائع",
                text:"تم تأكيد الطلب"
            });
            window.location.reload();
        },    
        //error delete message
        error:function(xhr){
            swal.fire({
                icon:'error',
                title:'خطأ',
                text:'لم يتم تأكيد الطلب  لسبب غير معروف',
                confirmButtonText:"حسناً"
            });

        }

    });
}
//ship order
function ship_order(order_id)
{
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    $.ajax({
        url:"/admin/order/"+order_id+"/ship",
        method:"GET",
        data:{
            '_method':'GET','_token':csrf_token
        },
        //success message                
        success:function(response){ 
            // console.log(response);                   
            swal.fire({
                icon:'success',
                title:"رائع",
                text:"تم إرسال الطلب"
            });
            window.location.reload();
        },
        //error delete message
        error:function(xhr){
            swal.fire({
                icon:'error',
                title:'خطأ',
                text:'لم يتم إرسال الطلب  لسبب غير معروف',
                confirmButtonText:"حسناً"
            });

        }

    });
}
//complate order
function complate_order(order_id)
{
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    $.ajax({
        url:"/admin/order/"+order_id+"/complate",
        method:"GET",
        data:{
            '_method':'GET','_token':csrf_token
        },
        //success message                
        success:function(response){ 
            // console.log(response);                   
            swal.fire({
                icon:'success',
                title:"رائع",
                text:"تم يسليم الطلب"
            });
            window.location.reload();
        },
        //error delete message
        error:function(xhr){
            swal.fire({
                icon:'error',
                title:'خطأ',
                text:'لم يتم تسليم الطلب  لسبب غير معروف',
                confirmButtonText:"حسناً"
            });

        }                    

    });
}
//deny order
function deny_order(order_id)
{
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    $.ajax({
        url:"/admin/order/"+order_id+"/endy",
        method:"GET",
        data:{
            '_method':'GET','_token':csrf_token
        },
        //success message                
        success:function(response){ 
            //console.log(response);                   
            swal.fire({
                icon:'success',
                title:"رائع",
                text:"تم إلغاء الطلب"
            });
            window.location.reload();
        }                    

    });
}
//return order
function return_order(order_id)
{
    csrf_token=$('meta[name="csrf_token"]').attr('content');   
    $.ajax({
        url:"/admin/order/"+order_id+"/return",
        method:"GET",
        data:{
            '_method':'GET','_token':csrf_token
        },
        //success message                
        success:function(response){ 
            //console.log(response);                   
            swal.fire({
                icon:'success',
                title:"رائع",
                text:"تم إرجاع الطلب"
            });
            window.location.reload();
        }                    

    });
}