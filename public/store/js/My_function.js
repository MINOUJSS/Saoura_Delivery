//
document.getElementById('fackviews').textContent=Math.floor((Math.random()*10)+1);
//
function add_product_qty(item_id)
{
   $('#qty-'+item_id).val(parseInt($('#qty-'+item_id).val())+1);
   $('#qty_input').val(parseInt($('#qty_input').val())-1);
   calculate_total(item_id);
   update_qty(item_id);
}

function min_product_qty(item_id)
{
   if($('#qty-'+item_id).val()>=2 || $('#qty_input').val()>=2)
   {
   $('#qty-'+item_id).val(parseInt($('#qty-'+item_id).val())-1);
   $('#qty_input').val(parseInt($('#qty_input').val())-1);
   calculate_total(item_id);
   update_qty(item_id);
   }
   // if($('#qty-'+item_id).val()>=2 || ('#xs_qty_input').val() >= 2)
   // {
   // $('#qty-'+item_id).val(parseInt($('#qty_input').val())-1);
   // $('#xs_qty_input').val(parseInt($('#xs_qty_input').val())-1);
   // }
}
//
function add_product_qty_in_details()
{
   $('#qty_input').val(parseInt($('#qty_input').val())+1);
   $('#xs_qty_input').val(parseInt($('#xs_qty_input').val())+1);
}
function min_product_qty_in_details()
{
   if($('#qty_input').val()>=2)
   {
   $('#qty_input').val(parseInt($('#qty_input').val())-1);
   $('#xs_qty_input').val(parseInt($('#xs_qty_input').val())-1);
   }
}

$(document).ready(function(){ 

   //fack views
   document.getElementById('fackviews').textContent=Math.floor((Math.random()*10)+1);
	setInterval(function(){ 
      var random_number =Math.floor((Math.random()*9)+1) ;  
	   document.getElementById('fackviews').textContent=random_number;
	}, 10000);
   // add product qty
   // $(add_product_qty).on('click',function(){
   //    $('#qty_input').val(parseInt($('#qty_input').val())+1);
   // }); 
   // min product qty
  
   // $(min_product_qty).on('click',function(){
   //    if($('#qty_input').val()>=2)
   //    {
   //    $('#qty_input').val(parseInt($('#qty_input').val())-1);
   //    }
   // }); 

   //get min price change     
      $('.noUi-handle-lower').on('mouseup',function(event){
         event.preventDefault();
         var min_price=$('.noUi-handle-lower').attr('aria-valuetext');        
                  $.ajax({
                     url:"/searcher/min-price/"+parseInt(min_price)+"/add",
                     method:'GET',
                     data:{min_price:parseInt(min_price)},

                     success:function(data)
                     {
                        $('#min_price_value').text(parseInt(min_price));
                        $('#searcher_data').fadeIn(500).html(data);
                        sort_product_result();
                        //load_pagination();
                     }
                  });
        });
   //get max price change   
   // $('.noUi-handle-upper').on('change',function(event){
   //    event.preventDefault();
   //    $('#max_price_value').text(parseInt(max_price));
   // });
   $('.noUi-handle-upper').on('mouseup',function(event){
      event.preventDefault();
      var max_price=$('.noUi-handle-upper').attr('aria-valuetext');
   $.ajax({
      url:"/searcher/max-price/"+parseInt(max_price)+"/add",
      method:'GET',
      data:{min_price:parseInt(max_price)},

      success:function(data)
      {
         $('#max_price_value').text(parseInt(max_price));
         $('#searcher_data').fadeIn(500).html(data);
         sort_product_result();
      }
   });
     });           
});
//
//redirecte to the right tabs
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 
//
function select_color(color_id,product_id)
{
 //change value in hideen input box of color_id 
 $('#color_id').val(color_id);
 $('#color_id-'+product_id).val(color_id);
 $('#color_id_lg-'+product_id).val(color_id);
 $('#product_color_'+product_id).val(color_id);
 //clear old border of other color box
 for(var x=1;x<=20;x++)
 {
   $('#color-box-'+x).css('border','none');
   $('#color-box-lg-'+x).css('border','none');
    $('#color-box-'+product_id+'-'+x).css('border','none');
    $('#color-box-lg-'+product_id+'-'+x).css('border','none');
 }
 //change css of the color box how has click
 $('#color-box-'+color_id).css('border','2px solid #000');
 $('#color-box-lg-'+color_id).css('border','2px solid #000');
 $('#color-box-'+product_id+'-'+color_id).css('border','2px solid #000');
 $('#color-box-lg-'+product_id+'-'+color_id).css('border','2px solid #000');
 
}
//
function select_size(size_id,product_id)
{
 //change value in hideen input box of size_id 
 $('#size_id').val(size_id);
 $('#size_id-'+product_id).val(size_id);
 $('#size_id_lg-'+product_id).val(size_id);
 $('#product_size_'+product_id).val(size_id);
 //clear old border of other color box
 for(var x=1;x<=20;x++)
 {
   $('#size-box-'+x).css('border','none');
   $('#size-box-lg-'+x).css('border','none');
    $('#size-box-'+product_id+'-'+x).css('border','none');
    $('#size-box-lg-'+product_id+'-'+x).css('border','none');
 }
 //change css of the color box how has click
 $('#size-box-'+size_id).css('border','2px solid #000'); 
 $('#size-box-lg-'+size_id).css('border','2px solid #000');
 $('#size-box-'+product_id+'-'+size_id).css('border','2px solid #000'); 
 $('#size-box-lg-'+product_id+'-'+size_id).css('border','2px solid #000');   
};
// function save color and size values in checkout page
function save_checkout_colors_and_sizes_values(product_id)
{
   color_id = document.getElementById('product_color_'+product_id).value;            
      size_id = document.getElementById('product_size_'+product_id).value;                  
      qty = document.getElementById('product_qty_'+product_id).value;
   //save change in session
 _token   = $('meta[name="csrf-token"]').attr('content');      
 // //send data to products controler to add to catr function   
 var host_name=document.location.protocol+'//'+document.location.host;
 $.ajax({
    url:host_name+'/product/'+product_id+'/updateqty-with-get-method',
    method:'POST',
    data:{color_id: color_id,size_id:size_id,qty:qty,_token :_token},
    //dataType: 'JSON',
    success:function(response){
       console.log(response);
       $('#cart_section').fadeIn(500).html(response);  
       $('#xs_cart_section').fadeIn(500).html(response);   
       //alert success
       // Swal.fire({
       //    //position: 'top-end',
       //    icon: 'success',
       //    title: 'تم إضافة المنتج إلى السلة',
       //    showConfirmButton: false,
       //    timer: 1500
       //  })
    },
    error: function(response) {
       console.log(response);
      }
 
 });
}
// add_color_to_searcher
function add_color_to_searcher(color_id)
{
   $.ajax({
      url:'/searcher/color/'+color_id+'/add',
      method:'GET',
      success:function(data)
      {
         $('#searcher_data').fadeIn(500).html(data);  
         sort_product_result();
      }
   });
};

// add_size_to_searcher
function add_size_to_searcher(size_id)
{
   $.ajax({
      url:'/searcher/size/'+size_id+'/add',
      method:'GET',
      success:function(data)
      {
         $('#searcher_data').fadeIn(500).html(data);  
         sort_product_result();
      }
   });
};
// add_size_to_searcher
function add_brand_to_searcher(brand_id)
{
   $.ajax({
      url:'/searcher/brand/'+brand_id+'/add',
      method:'GET',
      success:function(data)
      {
         $('#searcher_data').fadeIn(500).html(data);  
         sort_product_result();
      }
   });
};
// delete_size_to_searcher
function delete_size_to_searcher(size_id)
{
   $.ajax({
      url:'/searcher/size/'+size_id+'/delete',
      method:'GET',
      success:function(data)
      {
         //$('#searcher_data').fadeIn(500).html(data);  
         //sort_product_result();
         window.location.href='/products';
      }
   });
};

// delete_color_to_searcher
function delete_color_to_searcher(color_id)
{
   
   $.ajax({
      url:'/searcher/color/'+color_id+'/delete',
      method:'GET',
      success:function(data)
      {
        // $('#searcher_data').fadeIn(500).html(data);  
         //sort_product_result();
         window.location.href='/products';
      }
   });
};

// delete_min_price_to_searcher
function delete_min_price_to_searcher()
{
   $.ajax({
      url:'/searcher/min-price/delete',
      method:'GET',
      success:function(data)
      {
         //$('#searcher_data').fadeIn(500).html(data);  
         //sort_product_result();
         window.location.href='/products';
      }
   });
};

// delete_max_price_to_searcher
function delete_max_price_to_searcher()
{
   $.ajax({
      url:'/searcher/max-price/delete',
      method:'GET',
      success:function(data)
      {
         //$('#searcher_data').fadeIn(500).html(data);
         //sort_product_result();
         window.location.href='/products';
      }
   });
};
// delete_brand_to_searcher
function delete_brand_to_searcher(brand_id)
{
   $.ajax({
      url:'/searcher/brand/'+brand_id+'/delete',
      method:'GET',
      success:function(data)
      {
         //$('#searcher_data').fadeIn(500).html(data);  
         window.location.href='/products';
      }
   });
};
// sort_product_result()
function sort_product_result()
{
   $.ajax({
      url:'/shop-by',
      method:'GET',
      success:function(data)
      {
         window.location.href='/products';
         //location.reload(true);
         //$('#load_products').fadeIn(50).html(data);  
         //$('#my_pagination').fadeIn(50).html(data);
         //console.log(data[1].data);
         //
         //load_pagination(data[1].data);         
            //start star rating
            var pathname=document.location.pathname.toString();
            if(pathname =='/products' )
            {
               //            		
               var product_ratings=document.getElementsByName('products_ratings_b');               
            for(var b=0 ;b<=product_ratings.length; b++)
            {
               $('.product-star-'+b).starrr({
               readOnly:true,
               rating:product_ratings[b].getAttribute('data-rating')
                });
            }
            }else{			
            //get product ratings
            var product_rating=document.getElementById('product_ratings');
            $('.product-star').starrr({
               readOnly:true,
               rating:product_rating.getAttribute('data-rating')
            });
            //get consumer rating
            var consumers_ratings = document.getElementsByName('consumer_rating');
            for(var a=0; a < consumers_ratings.length;a++)
            {
               $('.consumer-star-'+a).starrr({
               readOnly:true,
               rating:consumers_ratings[a].getAttribute('data-rating')
                });					
            }						
            //put star rating in hidenn input
            $('.put-stars').starrr();		
            $('.put-stars').on('starrr:change', function(e, value){
                 alert('new rating is ' + value)
               })
   
            }
            //end star rating
         
      }
   });   
};
//function add to carte
function add_to_cart(product_id)
{
   //send data to products controler to add to catr function   
   var host_name=document.location.protocol+'//'+document.location.host;
   $.ajax({
      url:host_name+'/product/'+product_id+'/add-to-cart',
      method:'GET',
      success:function(data){
         $('#cart_section').fadeIn(500).html(data);  
         $('#xs_cart_section').fadeIn(500).html(data);  
         // $('#xs_cart_section1').fadeIn(500).html(data);  
         //alert success
         Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: 'تم إضافة المنتج إلى السلة',
            showConfirmButton: false,
            timer: 1500
          })
      }
   });
}

//function update qty carte
function update_qty_lg(product_id)
{
   
      color_id = document.getElementById('color_id_lg-'+product_id).value;            
      size_id = document.getElementById('size_id_lg-'+product_id).value;                  
      qty = document.getElementById('qty-lg-'+product_id).value;
      //change qty in hidden input
      document.getElementById('product_qty_'+product_id).value=qty;            
      _token   = $('meta[name="csrf-token"]').attr('content');      
   // //send data to products controler to add to catr function   
   var host_name=document.location.protocol+'//'+document.location.host;
   $.ajax({
      url:host_name+'/product/'+product_id+'/updateqty-with-get-method',
      method:'POST',
      data:{color_id: color_id,size_id:size_id,qty:qty,_token :_token},
      //dataType: 'JSON',
      success:function(response){
         console.log(response);
         $('#cart_section').fadeIn(500).html(response);  
         $('#xs_cart_section').fadeIn(500).html(response);   
         //alert success
         // Swal.fire({
         //    //position: 'top-end',
         //    icon: 'success',
         //    title: 'تم إضافة المنتج إلى السلة',
         //    showConfirmButton: false,
         //    timer: 1500
         //  })
      },
      error: function(response) {
         console.log(response);
        }
   
   });
}

//function update qty carte
function update_qty(product_id)
{
   
      color_id = document.getElementById('color_id-'+product_id).value;            
      size_id = document.getElementById('size_id-'+product_id).value;                  
      qty = document.getElementById('qty-'+product_id).value;            
      //change qty in hidden input
      document.getElementById('product_qty_'+product_id).value=qty; 
      _token   = $('meta[name="csrf-token"]').attr('content');      
   // //send data to products controler to add to catr function   
   var host_name=document.location.protocol+'//'+document.location.host;
   $.ajax({
      url:host_name+'/product/'+product_id+'/updateqty-with-get-method',
      method:'POST',
      data:{color_id: color_id,size_id:size_id,qty:qty,_token :_token},
      //dataType: 'JSON',
      success:function(response){
         console.log(response);
         $('#cart_section').fadeIn(500).html(response);  
         $('#xs_cart_section').fadeIn(500).html(response);   
         //alert success
         // Swal.fire({
         //    //position: 'top-end',
         //    icon: 'success',
         //    title: 'تم إضافة المنتج إلى السلة',
         //    showConfirmButton: false,
         //    timer: 1500
         //  })
      },
      error: function(response) {
         console.log(response);
        }
   
   });
}

//function add to wish-list
function add_to_wish_list(product_id)
{
   //send data to products controler to add to catr function   
   var host_name=document.location.protocol+'//'+document.location.host;
   $.ajax({
      url:host_name+'/consumer/wish-list/add/'+product_id,
      method:'GET',
      success:function(data){
         //alert(data);
         if(data)
         {
            $('#wish_list_button'+product_id).css('color','#F8694A');
            //alert success
         Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: 'تم إضافة المنتج إلى قائمة المفضلة',
            showConfirmButton: false,
            timer: 1500
          });
         }else
         {
            $('#wish_list_button'+product_id).css('color','#30323A');
            //alert success
         Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: 'تم حذف المنتج إلى قائمة المفضلة',
            showConfirmButton: false,
            timer: 1500
          });
         }
         
      }
   });
}

//function add to compar-list
function add_to_compar_list(product_id)
{
   //send data to products controler to add to catr function   
   var host_name=document.location.protocol+'//'+document.location.host;
   $.ajax({
      url:host_name+'/consumer/compar-list/add/'+product_id,
      method:'GET',
      success:function(data){
         //alert(data);
         if(data)
         {
            $('#compar_list_button'+product_id).css('color','#F8694A');
            //alert success
         Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: 'تم إضافة المنتج إلى قائمة المقارنة',
            showConfirmButton: false,
            timer: 1500
          });
         }else
         {
            $('#compar_list_button'+product_id).css('color','#30323A');
            //alert success
         Swal.fire({
            //position: 'top-end',
            icon: 'success',
            title: 'تم حذف المنتج إلى قائمة المقارنة',
            showConfirmButton: false,
            timer: 1500
          });
         }
         
      }
   });
}
//function get_interval_seconds()
function countDown(index,date)
{
var eventDate=new Date(date);
var now=new Date();
var currentTime=now.getTime();
var eventTime=eventDate.getTime();   
var remTime= eventTime-currentTime;
var s=Math.floor(remTime/1000);
var m=Math.floor(s/60);
var h=Math.floor(m/60);
var d=Math.floor(h/24);
h%=24;
m%=60;
s%=60;
d=(d<10)?"0"+d :d;
h=(h<10)?"0"+h :h;
m=(m<10)?"0"+m :m;
s=(s<10)?"0"+s :s;
if(d>0){
document.getElementById("days"+index).textContent=d+" ي";
document.getElementById("heurs"+index).textContent=h+" سا";
document.getElementById("munites"+index).textContent=m+" د";
// document.getElementById("seconds"+index).textContent=s;
}else
{
document.getElementById("heurs"+index).textContent=h+" سا";
document.getElementById("munites"+index).textContent=m+" د";
document.getElementById("seconds"+index).textContent=s+" ثا";
}
setTimeout(alert('1000'),1000);
}
   // fix nav bar whenn scrolling
   $(window).scroll(function(){
      $('nav').toggleClass('navbar-fixed-top',$(this).scrollTop() >50);
      $('.fix-order-btn').toggleClass('order-btn-fixed-bottom',$(this).scrollTop() >500);
   });
   //show and hid search form
   $('.xs-search-btn').click(function(){
         $('#xs-search-form').toggle(); 
   });