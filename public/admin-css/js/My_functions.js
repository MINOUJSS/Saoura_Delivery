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
//delete deal function
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