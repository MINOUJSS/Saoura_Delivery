<?php
/*---------------------------------------------------------
    //        Admen Functions                //
---------------------------------------------------------*/
//function get_admin data
function get_admin_data($id)
{
    $admin=App\admin::findOrFail($id);
    return $admin;
}
//:::::::::::function to active dashboard links and add css class to category nav
function active_dashboard_link()
{ 
    $home_url=url('/admin'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active categories links and add css class to category nav
function active_categories_links_group()
{ 
    $categories_url=url('/admin/categories'); 
    $create_categories_url=url('/admin/categories/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_categories_url=url('/admin/category/'.$url_array[5].'/edit');    
    $edit_sub_categories_url=url('/admin/sub-category/'.$url_array[5].'/edit');
    $edit_sub_sub_categories_url=url('/admin/sub-sub-category/'.$url_array[5].'/edit');
    }else
    {
        $edit_categories_url="";
        $edit_sub_categories_url="";
        $edit_sub_sub_categories_url="";  
    }
    $create_sub_categories_url=url('/admin/sub-categories/create');    
    $create_sub_sub_categories_url=url('/admin/sub-sub-categories/create');    
    $current_url=Request::url();
    if($current_url==$categories_url || $current_url==$create_categories_url || $current_url==$edit_categories_url || $current_url==$create_sub_categories_url || $current_url==$edit_sub_categories_url || $current_url==$create_sub_sub_categories_url || $current_url==$edit_sub_sub_categories_url )
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active categories links
function active_categories_link()
{ 
    $categories_url=url('/admin/categories');    
    $current_url=Request::url();
    if($current_url==$categories_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create categories links
function active_create_categories_link()
{ 
    $create_categories_url=url('/admin/categories/create');    
    $current_url=Request::url();
    if($current_url==$create_categories_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create sub-categories links
function active_create_sub_categories_link()
{ 
    $create_sub_categories_url=url('/admin/sub-categories/create');    
    $current_url=Request::url();
    if($current_url==$create_sub_categories_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create sub-sub-categories links
function active_create_sub_sub_categories_link()
{ 
    $create_sub_sub_categories_url=url('/admin/sub-sub-categories/create');    
    $current_url=Request::url();
    if($current_url==$create_sub_sub_categories_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active deals links group
function active_slider_deals_links_group()
{ 
    $deals_url=url('/admin/slider-deals'); 
    $create_deal_url=url('/admin/slider-deal/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);    
    if(count($url_array)>5){
    $edit_deal_url=url('/admin/slider-deal/'.$url_array[5].'/edit');
    }else
    {
        $edit_deal_url="";   
    }
    $current_url=Request::url();
    if($current_url==$deals_url || $current_url==$create_deal_url || $current_url==$edit_deal_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active deals links
function active_slider_deals_link()
{ 
    $deals_url=url('/admin/slider-deals'); 
    $current_url=Request::url();
    if($current_url==$deals_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create deal link
function active_create_slider_deal_link()
{ 
    $create_deal_url=url('/admin/slider-deal/create');
    $current_url=Request::url();
    if($current_url==$create_deal_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active sid deals links group
function active_sid_deals_links_group()
{ 
    $deals_url=url('/admin/sid-deals'); 
    $create_deal_url=url('/admin/sid-deal/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);    
    if(count($url_array)>5){
    $edit_deal_url=url('/admin/sid-deal/'.$url_array[5].'/edit');
    }else
    {
        $edit_deal_url="";   
    }
    $current_url=Request::url();
    if($current_url==$deals_url || $current_url==$create_deal_url || $current_url==$edit_deal_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active sid deals links
function active_sid_deals_link()
{ 
    $deals_url=url('/admin/sid-deals'); 
    $current_url=Request::url();
    if($current_url==$deals_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create sid deal link
function active_create_sid_deal_link()
{ 
    $create_deal_url=url('/admin/sid-deal/create');
    $current_url=Request::url();
    if($current_url==$create_deal_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active discounts links group
function active_discounts_links_group()
{ 
    $discounts_url=url('/admin/discounts'); 
    $create_discount_url=url('/admin/discount/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);    
    if(count($url_array)>5){
    $edit_discount_url=url('/admin/discount/'.$url_array[5].'/edit');
    }else
    {
        $edit_discount_url="";   
    }
    $current_url=Request::url();
    if($current_url==$discounts_url || $current_url==$create_discount_url || $current_url==$edit_discount_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active discounts links
function active_discounts_link()
{ 
    $deals_url=url('/admin/discounts'); 
    $current_url=Request::url();
    if($current_url==$deals_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create discount link
function active_create_discount_link()
{ 
    $create_discount_url=url('/admin/discount/create');
    $current_url=Request::url();
    if($current_url==$create_discount_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active users links group
function active_users_links_group()
{ 
    $users_url=url('/admin/users'); 
    $create_user_url=url('/admin/user/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_user_url=url('/admin/user/'.$url_array[5].'/edit');
    }else
    {
        $edit_user_url="";   
    }
    $current_url=Request::url();
    if($current_url==$users_url || $current_url==$create_user_url || $current_url==$edit_user_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active users links
function active_users_link()
{ 
    $users_url=url('/admin/users'); 
    $current_url=Request::url();
    if($current_url==$users_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create user link
function active_create_user_link()
{ 
    $create_user_url=url('/admin/user/create');
    $current_url=Request::url();
    if($current_url==$create_user_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active colors links group
function active_colors_links_group()
{ 
    $colors_url=url('/admin/colors'); 
    $create_color_url=url('/admin/color/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_color_url=url('/admin/color/'.$url_array[5].'/edit');
    }else
    {
        $edit_color_url="";  
    }
    $current_url=Request::url();
    if($current_url==$colors_url || $current_url==$create_color_url || $current_url==$edit_color_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active colors links
function active_colors_link()
{ 
    $colors_url=url('/admin/colors'); 
    $current_url=Request::url();
    if($current_url==$colors_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create color link
function active_create_color_link()
{ 
    $create_color_url=url('/admin/color/create');
    $current_url=Request::url();
    if($current_url==$create_color_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active sizes links group
function active_sizes_links_group()
{ 
    $sizes_url=url('/admin/sizes'); 
    $create_size_url=url('/admin/size/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_size_url=url('/admin/size/'.$url_array[5].'/edit');
    }else
    {
        $edit_size_url="";
    }
    $current_url=Request::url();
    if($current_url==$sizes_url || $current_url==$create_size_url || $current_url==$edit_size_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active sizes links
function active_sizes_link()
{ 
    $sizes_url=url('/admin/sizes'); 
    $current_url=Request::url();
    if($current_url==$sizes_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create size link
function active_create_size_link()
{ 
    $create_size_url=url('/admin/size/create');
    $current_url=Request::url();
    if($current_url==$create_size_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active suppliers links group
function active_suppliers_links_group()
{ 
    $suppliers_url=url('/admin/suppliers'); 
    $create_supplier_url=url('/admin/supplier/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_supplier_url=url('/admin/supplier/'.$url_array[5].'/edit');
    }else
    {
        $edit_supplier_url="";
    }
    $current_url=Request::url();
    if($current_url==$suppliers_url || $current_url==$create_supplier_url || $current_url==$edit_supplier_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active suppliers links
function active_suppliers_link()
{ 
    $suppliers_url=url('/admin/suppliers'); 
    $current_url=Request::url();
    if($current_url==$suppliers_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create supplier link
function active_create_supplier_link()
{ 
    $create_supplier_url=url('/admin/supplier/create');
    $current_url=Request::url();
    if($current_url==$create_supplier_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active brands links group
function active_brands_links_group()
{ 
    $brands_url=url('/admin/brands'); 
    $create_brand_url=url('/admin/brand/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_brand_url=url('/admin/brand/'.$url_array[5].'/edit');
    }else
    {
        $edit_brand_url="";
    }
    $current_url=Request::url();
    if($current_url==$brands_url || $current_url==$create_brand_url || $current_url==$edit_brand_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active brands links
function active_brands_link()
{ 
    $brands_url=url('/admin/brands'); 
    $current_url=Request::url();
    if($current_url==$brands_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create brand link
function active_create_brand_link()
{ 
    $create_brand_url=url('/admin/brand/create');
    $current_url=Request::url();
    if($current_url==$create_brand_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active products links group
function active_products_links_group()
{ 
    $products_url=url('/admin/products'); 
    $create_product_url=url('/admin/product/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/product/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$products_url || $current_url==$create_product_url || $current_url==$edit_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active products links
function active_products_link()
{ 
    $products_url=url('/admin/products'); 
    $current_url=Request::url();
    if($current_url==$products_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create product link
function active_create_product_link()
{ 
    $create_product_url=url('/admin/product/create');
    $current_url=Request::url();
    if($current_url==$create_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active upsales links group
function active_upsales_links_group()
{ 
    $products_url=url('/admin/up-sales'); 
    $create_product_url=url('/admin/up-sale/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/up-sale/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$products_url || $current_url==$create_product_url || $current_url==$edit_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active upsales links
function active_upsales_link()
{ 
    $products_url=url('/admin/up-sales'); 
    $current_url=Request::url();
    if($current_url==$products_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create upsales link
function active_create_upsale_link()
{ 
    $create_product_url=url('/admin/up-sale/create');
    $current_url=Request::url();
    if($current_url==$create_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active reatings links group
function active_reatings_links_group()
{ 
    $products_url=url('/admin/reatings'); 
    $create_product_url=url('/admin/reatings/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/reatings/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$products_url || $current_url==$create_product_url || $current_url==$edit_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active reatings links
function active_reatings_link()
{ 
    $products_url=url('/admin/reatings'); 
    $current_url=Request::url();
    if($current_url==$products_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active create reatings link
function active_create_reating_link()
{ 
    $create_product_url=url('/admin/reating/create');
    $current_url=Request::url();
    if($current_url==$create_product_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active sales links group
function active_sales_links_group()
{ 
    $sales_url=url('/admin/sales'); 
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/sale/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$sales_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active consumers links group
function active_consumers_links_group()
{ 
    $sales_url=url('/admin/consumers'); 
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/sale/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$sales_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active searsh_words links group
function active_searsh_words_links_group()
{ 
    $sales_url=url('/admin/searsh-words'); 
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/searsh-word/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$sales_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active orders links group
function active_orders_links_group()
{ 
    $orders_url=url('/admin/orders'); 
    $request_url=Request::url();
    $url_array=explode('/',$request_url);
    if(count($url_array)>5){
    $edit_product_url=url('/admin/order/'.$url_array[5].'/edit');
    }else
    {
        $edit_product_url="";
    }
    $current_url=Request::url();
    if($current_url==$orders_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active pages links and add css class to pages nav
function active_pages_links_group()
{ 
    $about_url=route('admin.about_us'); 
    $contra_url=route('admin.contra'); 
    $how_to_ship_url=route('admin.how_to_ship');     
    $current_url=Request::url();
    if($current_url==$about_url || $current_url==$contra_url || $current_url==$how_to_ship_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active categories links
function active_about_us_link()
{ 
    $about_us_url=route('admin.about_us');    
    $current_url=Request::url();
    if($current_url==$about_us_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active contra links
function active_contra_link()
{ 
    $contra_url=route('admin.contra');    
    $current_url=Request::url();
    if($current_url==$contra_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//:::::::::::function to active how_to_ship links
function active_how_to_ship_link()
{ 
    $how_to_ship_url=route('admin.how_to_ship');    
    $current_url=Request::url();
    if($current_url==$how_to_ship_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
// get_product_data_from_id
function get_product_data_from_id($id)
{
    $product_data=App\product::findOrFail($id);
    return $product_data;
}
// get_product_data_from_slug
function get_product_data_from_slug($slug)
{
    $product_data=App\product::where('slug',$slug)->first();
    return $product_data;
}
//global_Purchasing_price function
function global_Purchasing_price()
{
    $all_products=App\product::all();
        $Purchasing_price=0;
        $to_magazin_price=0;
        $to_consumer_price=0;
        $ombalage_price=0;
        $adds_price=0;
        foreach($all_products as $product)
        {
            $Purchasing_price+=($product->Purchasing_price * $product->qty);
            $to_magazin_price+=($product->to_magazin_price * $product->qty);
            $to_consumer_price+=($product->to_consumer_price * $product->qty);
            $ombalage_price+=($product->ombalage_price * $product->qty);
            $adds_price+=($product->adds_price * $product->qty);
        }
         $total=$Purchasing_price+$to_magazin_price+$to_consumer_price+$ombalage_price+$adds_price;
        return $total;
}
//global_selling_price function
function global_selling_price()
{
    $all_products=App\product::all();
        $x=0;
        foreach($all_products as $product)
        {
            $x+=(price_with_discount($product->id) * $product->qty);
        }
        return $x;
}
//globale products in the store
function global_product_in_the_store()
{
    $products=App\product::all();
    return $products->count();
}
//globale products qty in the store
function global_product_qty_in_the_store()
{
    $products=App\product::all();
    $qty=0;
    foreach($products as $product)
    {
        $qty+=$product->qty;
    }
    return $qty;
}
//get completed_sales_in_this_month
function get_completed_sales_in_this_month($id)
{
    $sals=App\Completed_Sale::where('product_id',$id)->get();
    if($sals!=null){
        $x=0;
        foreach($sals as $sale)
        {
            $now=new DateTime();
            $date= new DateTime($sale->created_at);        
            $inreval=$date->diff($now);
            $days=$inreval->format('%a') ; 
            if($days<=30)
            {
                $x+=1;
            } 
        }
    // dd($sale->created_at);                 
    return $x;    
    }else
    {
        return 0;
    }

}
//get get_product_reating_from_consumer_id
function get_product_reating_from_consumer_created_at($product_id,$date)
{
    $rating=App\reating::where('product_id',$product_id)->where('created_at',$date)->first();
    if($rating!=null)
    {
        return $rating->reating;
    }else
    {
        return 0;
    }    
}
//get get_product_reating_from_id
function get_product_reating_from_id($id)
{
    $reatings=App\reating::where('product_id',$id)->where('visible',1)->get();
    if($reatings->count()>0){
        $result=0;
        foreach($reatings as $reating)
        {
            $result+=$reating->reating;
        }
        // dd($result);
        $final_result=$result/$reatings->count();
    return $final_result;
    }else
    {
        return '0.00';
    }
}
//number_of_reatings_have_this_product
function number_of_reatings_have_this_product($product_id)
{
    $reatings=App\reating::where('product_id',$product_id)->where('visible',1)->get();
    return count($reatings);
}
//count_number_of_reatings_no_visible
function count_number_of_reatings_no_visible()
{
    $reatings=App\reating::orderBy('id','desc')->where('visible',0)->get();
    return count($reatings);
}
//get_user_type_name function
function get_user_type_name($code)
{
    if($code==1)
    {
        return 'بائع';
    }elseif($code==2)
    {
        return 'مؤكد الطلبات';
    }elseif($code==3)
    {
        return 'موصل الطلبات';
    }else
    {
        return 'لم يتم تحديد الوظيفة';
    }
}
// user_is_active function
function user_is_active($code)
{
    if($code==1)
    {
        return '<spam class="label label-success">مفعل<spam>';
    }else
    {
        return "<spam class='label label-danger'>غير مفعل</spam>";
    }
}
//get all product images
function get_all_product_images($product_id)
{    
    // $product=App\product::findOrFail($product_id);
    $product_images=App\Product_Images::where('product_id',$product_id)->get();
    $product_colors=App\product_colors::where('product_id',$product_id)->where('color_image','!=','/')->get();    
    // $first_image=url("admin-css/uploads/images/products/".$product->image);
    $images=[]; 
    if($product_images->count() > 0)
    {
        foreach($product_images as $prod)
        {
            $images[]=url("admin-css/uploads/images/products/small/".$prod->image);
        }
    }   
    if($product_colors->count() > 0)
    {
        foreach($product_colors as $prod)
        {
            $images[]=url("admin-css/uploads/images/products/colors/".$prod->image);
        }
    }
    // dd($images);
    return $images;
}
//get make slug
function make_slug($string)
{
    $text=explode(' ',$string);
    $text=implode('-',$text);
    return $text;
}
//get no read notification
function get_no_read_notification_count($admin_id)
{
    $all_note=App\admin_notefication::orderBy('id','desc')->get();
    $readin_note=App\reading_notification::where('admin_id',$admin_id)->get();
    $no_reading_not=count($all_note) - count($readin_note);
    return $no_reading_not;
}
//get no read notification
// function get_no_read_order_notification_count()
// {
//     $note=App\orders_notification::where('status',0)->get();
//     return $note->count();
// }
// get_contact_count_rows
function get_contact_count_rows()
{
    $contacts=App\contact_us::all();
    return count($contacts);
}
//get_no_read_contatc_data
function get_no_read_contact_data()
{
    $contacts=App\contact_us::where('status',0)->get();
    return $contacts;
}
//get_no_read_contatc
// function get_no_read_contact()
// {
//     $contacts=App\contact_us::where('status',0)->get();
//     return count($contacts);
// }
//has reply
function has_reply($contact_us_id)
{
    $reply=App\reply_contact::where('contact_us_id',$contact_us_id)->first();
    if($reply==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//has deleted reply
function has_deleted_reply($contact_us_id)
{
    $reply=App\deleted_reply::where('contact_us_id',$contact_us_id)->first();
    if($reply==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//
function get_deleted_contact_data()
{
    $deleted_contacts=App\deleted_contact::all();
    return $deleted_contacts;
}
// print note nember no read in string
function print_message_nember_string($num)
{
    //لديك 10 إخطارات
    if($num==0)
    {
        return 'ليس لديك أي رسالة جديدة';
    }elseif($num==1)
    {
        return 'لديك رسالة واحدة جديدة';
    }elseif($num==2)
    {
        return 'لديك رسالتين جديدتين';
    }elseif($num >=3 && $num<=20)
    {
        return 'لديك'.$num.'رسائل جديدة';
    }else
    {
        return 'لديك'.$num.'رسالة جديدة';
    }

}
// print note nember no read in string
function print_note_nember_string($num)
{
    //لديك 10 إخطارات
    if($num==0)
    {
        return 'ليس لديك أي إشعار جديد';
    }elseif($num==1)
    {
        return 'لديك إشعار واحد جديد';
    }elseif($num==2)
    {
        return 'لديك إشعارين جديدين';
    }elseif($num >=3 && $num<=20)
    {
        return 'لديك'.$num.'إشعارات جديدة';
    }else
    {
        return 'لديك'.$num.'إشعار جديد';
    }

}
// print note nember no read order note in string
function print_order_note_nember_string($num)
{
    //لديك 10 إخطارات
    if($num==0)
    {
        return 'ليس لديك أي طلب جديد';
    }elseif($num==1)
    {
        return 'لديك طلب واحد جديد';
    }elseif($num==2)
    {
        return 'لديك طلبين جديدين';
    }elseif($num >=3 && $num<=20)
    {
        return 'لديك'.$num.'طلبات جديدة';
    }else
    {
        return 'لديك'.$num.'طلب جديد';
    }

}
//get_no_reading_note_data
function get_no_reading_note_data($admin_id)
{
    $all_note=App\admin_notefication::orderBy('id','desc')->get();
    $all_reading_note=App\reading_notification::orderBy('id','desc')->get();    
    //create $no_reading_id_array variable
    $no_reading_id_array=[];
    foreach($all_note as $note)
    { 
        if(count($all_reading_note)>0)
        {
            foreach ($all_reading_note as $r_note) 
            {
                
                if (App\reading_notification::where('admin_id',$admin_id)->where('note_id',$note->id)->first()==null) 
                {
                    $no_reading_id_array[]=$note->id;
                }
            }
        }
    } 
        if(count($all_reading_note)==0 && empty($no_reading_id_array))
        {
            $nots=App\admin_notefication::orderBy('id','desc')->get();                    
        }else
        {
            $nots=App\admin_notefication::whereIn('id',$no_reading_id_array)->orderBy('id','desc')->get();                    
        }              
    return $nots;
}
//get_no_reading_order_note_data
function get_no_reading_order_note_data()
{
    $note=App\orders_notification::where('status',0)->get();
    return $note;
}
//function get_admin_note_status()
function get_admin_note_status($note_id,$admin_id)
{
    $reading_note=App\reading_notification::where('note_id',$note_id)->where('admin_id',$admin_id)->first();
    if($reading_note==null)
    {
        return '<span class="label label-danger">غير مقروءة</span>';
    }
    else
    {
        return '<span class="label label-success">مقروءة</span>';
    }
}
//function store_name_label()
function store_name_label()
{
    $setting=App\setting::where('var','store_name')->first();
    return $setting->display_var;    
}
//function store_name_value()
function store_name_value()
{
    $setting=App\setting::where('var','store_name')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function store_email_label()
function store_email_label()
{
    $setting=App\setting::where('var','email')->first();
    return $setting->display_var;    
}
//function store_email_value()
function store_email_value()
{
    $setting=App\setting::where('var','email')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function facebook_account_label()
function facebook_account_label()
{
    $setting=App\setting::where('var','facebook')->first();
    return $setting->display_var;    
}
//function facebook_account_value()
function facebook_account_value()
{
    $setting=App\setting::where('var','facebook')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function youtube_account_label()
function youtube_account_label()
{
    $setting=App\setting::where('var','youtube')->first();
    return $setting->display_var;    
}
//function youtube_account_value()
function youtube_account_value()
{
    $setting=App\setting::where('var','youtube')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function twitter_account_label()
function twitter_account_label()
{
    $setting=App\setting::where('var','twitter')->first();
    return $setting->display_var;    
}
//function twitter_account_value()
function twitter_account_value()
{
    $setting=App\setting::where('var','twitter')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function instagram_account_label()
function instagram_account_label()
{
    $setting=App\setting::where('var','instagram')->first();
    return $setting->display_var;    
}
//function instagram_account_value()
function instagram_account_value()
{
    $setting=App\setting::where('var','instagram')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//get store address
function store_address_value()
{
    $setting=App\setting::where('var','address')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//get store address
function store_phone_value()
{
    $setting=App\setting::where('var','phone')->first();
    if($setting!=null)
    {
        return $setting->value; 
    }else
    {
        return null;    
    }
}
//function product Status
function product_status($statu)
{
    if($statu==0)
    {
        return '<span class="label label-danger">غير مرئي</span>';
    }else
    {
        return '<span class="label label-success">مرئي</span>';
    }
}
//function product Dropsheping Status
function product_dropsheping_statu($value)
{
    if($value==0)
    {
        return '<span class="label label-success">منتج مملوك</span>';
    }else
    {
        return '<span class="label label-danger">دروب شبين</span>';
    }
}
//function globale_product_category
function globale_product_categories($product_id)
{

    $product_category=App\Product_Category::where('product_id',$product_id)->get();    
    $product_sub_category=App\Product_Sub_Category::where('product_id',$product_id)->get();
    $product_sub_sub_category=App\Product_Sub_Sub_Category::where('product_id',$product_id)->get();
    //get categories ides
    $category_id_array=[];
    if(count($product_category)>0)
    {
        foreach($product_category as $p_cat)
        {
            $category_id_array[]=$p_cat->category_id;
        }
    }       
    //get sub categories ides
    $sub_category_id_array=[];
    if(count($product_sub_category)>0)
    {
        foreach($product_sub_category as $p_s_cat)
        {
            $sub_category_id_array[]=$p_s_cat->sub_category_id;
        }
    }
    //get sub sub categories ides
    $sub_sub_category_id_array=[];
    if(count($product_sub_sub_category)>0)
    {
        foreach($product_sub_sub_category as $p_s_s_cat)
        {
            $sub_sub_category_id_array[]=$p_s_s_cat->sub_sub_id;
        }
    }    
    //dd($cat_value);
    //get categories for this product
    $category=App\category::whereIn('id',$category_id_array)->get();
    //get sub categories for this product
    $sub_category=App\Sub_Category::whereIn('id',$sub_category_id_array)->get();
    //get sub sub categories for this product
    $sub_sub_category=App\Sub_Sub_Category::whereIn('id',$sub_sub_category_id_array)->get();
    //writ it in html        
    $html='<ul class="list-unstyled">';    
    if(count($category)>0)
    {
        foreach($category as $cat)
        {
            $html.="<li>".$cat->name."</li>";
        }    
    }
    //
    if(count($sub_category)>0)
    {
        foreach($sub_category as $s_cat)
        {
            $html.="<li>".$s_cat->name."</li>";
        }    
    }
    //
    if(count($sub_sub_category)>0)
    {
        foreach($sub_sub_category as $s_s_cat)
        {
            $html.="<li>".$s_s_cat->name."</li>";
        }    
    }
    //
    if(count($category)==0 && count($sub_category)==0 && count($sub_sub_category)==0)
    {
        $html.="<li>بدون تصنيف</li>";  
    }
    $html.='</ul>';
    return $html;
}
//function order Status
function order_status($type)
{
    if($type==1)
    {
        return '<span class="label label-primary">تم تأكيد الطلب</span>';
    }elseif($type==2)
    {
        return '<span class="label label-info">تم إرسال الطلب</span>';
    }elseif($type==3)
    {
        return '<span class="label label-success">تم تسليم الطلب</span>';
    }elseif($type==4)
    {
        return '<span class="label label-danger">تم إلغاء الطلب</span>';
    }elseif($type==5)
    {
        return '<span class="label label-danger">تم إرجاع الطلب</span>';
    }else
    {
        return '<span class="label label-warning">قيد الانتظار</span>';
    }
}
// function consumer_is_register
function consumer_is_register($consumer_id)
{
    $consumer=App\Consumer::find($consumer_id);
    if($consumer==null || $consumer->id==1)
    {
        return '<span class="label label-danger">زبون غير مسجل</span>';
    }else
    {
        return '<span class="label label-success">زبون مسجل</span>';
    }
}
// function reating_is_visible
function reating_is_visible($num)
{
    if($num==0)
    {
        return '<span class="label label-danger">غير مرئي</span>';
    }else
    {
        return '<span class="label label-success">مرئي</span>';
    }
}
//function product_has_seo
function product_has_seo($product_id)
{
    $seo=App\Product_seo::where('product_id',$product_id)->first();    
    if ($seo==null) {
        return false;
    }else {
        return true;
    }
}
//function is_product_has_this_cat
function is_product_has_this_cat($product_id,$category_id)
{
    $product_category=App\Product_Category::where('product_id',$product_id)->where('category_id',$category_id)->first();
    if($product_category==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//function is_product_has_this_sub_cat
function is_product_has_this_sub_cat($product_id,$sub_category_id)
{
    $product_sub_category=App\Product_Sub_Category::where('product_id',$product_id)->where('sub_category_id',$sub_category_id)->first();
    if($product_sub_category==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//function is_product_has_this_sub_sub_cat
function is_product_has_this_sub_sub_cat($product_id,$sub_sub_category_id)
{
    $product_sub_sub_category=App\Product_Sub_Sub_Category::where('product_id',$product_id)->where('sub_sub_category_id',$sub_sub_category_id)->first();
    if($product_sub_sub_category==null)
    {
        return false;
    }else
    {
        return true;
    }
}
/*---------------------------------------------------------
    //        Store Functions                //
---------------------------------------------------------*/
//:::::::::::function get_meta_og_image ::::::::::::
function is_product_details_page($route_name)
{
        if($route_name == "store.product.details")
        {
            return true;
        }
        else
        {
            return false;
        }
}
//:::::::::::function to detect home url and add css class to category nav
function is_home()
{ 
    $home_url=url('/'); 
    $current_url=Request::url();
    $slids=App\deal::orderBy('id','desc')->get();
    if($current_url==$home_url && $slids->count()>0)
    {
        return '';
    }
    else
    {
        return 'show-on-click';
    }      
}
//::::::::::::get all categories function:::::::::
function get_all_categories()
{
    $Categories=App\category::where('id','!=',1)->get();
    return $Categories;
}
//::::::::: has_sub_categories function :::::::::::
function has_sub_categories($category_id)
{
    $sub_c=App\Sub_Category::where('category_id',$category_id)->get();
    if(count($sub_c)>0)
    {
        return true;
    }else
    {
        return false;
    }
}
//:::::::::get_sub_gategories function :::::::
function get_sub_gategories($category_id)
{
    $sub_categories=App\Sub_Category::where('category_id',$category_id)->get();
    return $sub_categories;
}
//::::::::: has_sub_sub_categories function :::::::::::
function has_sub_sub_categories($sub_category_id)
{
    $sub_sub_c=App\Sub_Sub_Category::where('sub_category_id',$sub_category_id)->get();
    if(count($sub_sub_c)>0)
    {
        return true;
    }else
    {
        return false;
    }
}
//:::::::::get_sub_sub_gategories function :::::::
function get_sub_sub_categories($sub_category_id)
{
    $sub_sub_categories=App\Sub_Sub_Category::where('sub_category_id',$sub_category_id)->get();
    return $sub_sub_categories;
}
//::::::::::count_sub_category_of_catetegory function ::
function get_sub_categories_count($category_id)
{
    $sub_categories=App\Sub_Category::where('category_id',$category_id)->get();    
    return count($sub_categories);
}
//::::::::::count_sub_sub_category_of_catetegory function ::
function get_sub_sub_categories_count_for_category_id($category_id)
{
    $sub_categories=App\Sub_Category::where('category_id',$category_id)->get();
    if(count($sub_categories)>0)
    {
    //extract sub_category ids
    foreach($sub_categories as $sub_category)
    {
        $sub_category_id_array[]=$sub_category->id;
    }
    //extract sub_sub_categories from sub_category_id_array
    $total=0;
    foreach($sub_category_id_array as $sub_ids)
    {
        $sub_sub_category=App\Sub_Sub_Category::where('sub_category_id',$sub_ids)->get();
        $total+=count($sub_sub_category);
    }
    return $total;
}else
{
 return 0;   
}    
}
//::::::::::count_sub_sub_category_of_sub_catetegory function ::
function get_sub_sub_categories_count_for_sub_category_id($sub_category_id)
{
    $sub_sub_categories=App\Sub_Sub_Category::where('sub_category_id',$sub_category_id)->get();
    return count($sub_sub_categories); 
}
//::::::::::has_sub_category function::::::::::: 
function has_sub_category($category_id)
{
    $sub_category=App\Sub_Category::where('category_id',$category_id)->get();
    if(count($sub_category)>0)
    {
        return true;
    }else
    {
        return false;
    }
}
//::::::::::has_sub_sub_category function::::::::::: 
function has_sub_sub_category($sub_category_id)
{
    $sub_sub_category=App\Sub_Sub_Category::where('sub_category_id',$sub_category_id)->get();
    if(count($sub_sub_category)>0)
    {
        return true;
    }else
    {
        return false;
    }
}
//function product_availability
function product_availability($id)
{
    $product=App\product::findOrFail($id);
    if($product->qty > 1)
    {
        return 'متوفر في المخازن بكميات محدودة';
    }
    else
    {
        return 'غير متوفر في المخازن';
    }
}
//function get_product_color_name_form_id_color
function get_product_color_code_form_id_color($id)
{
    $color=App\color::findOrFail($id);
    return $color->code;
}
//function get_product_color_name_form_id_color
function get_product_size_name_form_id_size($id)
{
    $size=App\size::findOrFail($id);
    return $size->name;
}
//function get_product_size_form_id_color
function get_product_size_form_id_size($id)
{
    $size=App\size::findOrFail($id);
    return $size->size;
}
//function return css code to border the selected color box
function selected_box_color($product_id,$color_id)
{
    if(session()->has('cart') && session()->get('cart')->items[$product_id]['color_id']==$color_id)
    {
        return'border:2px solid #000;';
    }
    else
    {
        return '';
    }
}
//function return css code to border the selected size box
function selected_box_size($product_id,$size_id)
{
    if(session()->has('cart') && session()->get('cart')->items[$product_id]['size_id']==$size_id)
    {
        return'border:2px solid #000;';
    }
    else
    {
        return '';
    }
}
//function to print product choose color with html in lg
function print_product_colors_lg_html($product_id)
{
    $product=App\product::findOrFail($product_id);
    // $product_colors=App\product_colors::where('product_id',$product->id)->get();
    $colors=$product->colors;
    $html="";
    if(count($colors)>0)
    {
        $html.='<ul class="color-option"><li><span class="text-uppercase">اللون:</span></li>';        
        foreach($colors as $p_color)
        {
        $color=App\color::findOrFail($p_color->color_id);
        $html.='<li><a id="color-box-'.$color->id.'" style="cursor:pointer;margin-right:5px;background-color:'.get_product_color_code_form_id_color($color->id).';'.selected_box_color($product_id,$color->id).'" onclick="select_color('.$color->id.')"></a></li>';        
        }
    }
    $html.='</ul>';
    if(session()->has('cart'))
    {
        $color_value=session()->get('cart')->items[$product->id]['color_id'];
    }
    else
    {
        $color_value=0;
    }
    $html.='<input type="hidden" name="color_id" id="color_id_lg-'.$product_id.'" value="'.$color_value.'" >';
    return $html;
}
//function to print product choose color with html
function print_product_colors_html($product_id)
{
    $product=App\product::findOrFail($product_id);
    // $product_colors=App\product_colors::where('product_id',$product->id)->get();
    $colors=$product->colors;
    $html="";
    if(count($colors)>0)
    {
        $html.='<ul class="color-option"><li><span class="text-uppercase">اللون:</span></li>';        
        foreach($colors as $p_color)
        {
        $color=App\color::findOrFail($p_color->color_id);
        $html.='<li><a id="color-box-'.$color->id.'" style="cursor:pointer;margin-right:5px;background-color:'.get_product_color_code_form_id_color($color->id).';'.selected_box_color($product_id,$color->id).'" onclick="select_color('.$color->id.')"></a></li>';        
        }
    }
    $html.='</ul>';
    if(session()->has('cart'))
    {
        $color_value=session()->get('cart')->items[$product->id]['color_id'];
    }
    else
    {
        $color_value=0;
    }
    $html.='<input type="hidden" name="color_id" id="color_id-'.$product_id.'" value="'.$color_value.'" >';
    return $html;
}
//function to print product choose size with html inlg
function print_product_sizes_lg_html($product_id)
{
    $product=App\product::findOrFail($product_id);
    // $product_colors=App\product_colors::where('product_id',$product->id)->get();
    $sizes=$product->sizes;
    $html="";
    if(count($sizes)>0)
    {
        $html.='<ul class="size-option"><li><span class="text-uppercase">المقاس:</span></li>';        
        foreach($sizes as $p_size)
        {
        $size=App\size::findOrFail($p_size->size_id);
        $html.='<li class="active"><a id="size-box-'.$size->id.'" id="size-box-'.$size->id.'" onclick="select_size('.$size->id.')" style="cursor:pointer;'.selected_box_size($product_id,$size->id).'">'.get_product_size_form_id_size($size->id).'</a></li>';
        }
    }
    $html.='</ul>';
    if(session()->has('cart'))
    {
        $size_value=session()->get('cart')->items[$product->id]['size_id'];
    }
    else
    {
        $size_value=0;
    }
    $html.='<input type="hidden" name="size_id" id="size_id_lg-'.$product_id.'" value="'.$size_value.'" >';
    return $html;
}
//function to print product choose size with html
function print_product_sizes_html($product_id)
{
    $product=App\product::findOrFail($product_id);
    // $product_colors=App\product_colors::where('product_id',$product->id)->get();
    $sizes=$product->sizes;
    $html="";
    if(count($sizes)>0)
    {
        $html.='<ul class="size-option"><li><span class="text-uppercase">المقاس:</span></li>';        
        foreach($sizes as $p_size)
        {
        $size=App\size::findOrFail($p_size->size_id);
        $html.='<li class="active"><a id="size-box-'.$size->id.'" id="size-box-'.$size->id.'" onclick="select_size('.$size->id.')" style="cursor:pointer;'.selected_box_size($product_id,$size->id).'">'.get_product_size_form_id_size($size->id).'</a></li>';
        }
    }
    $html.='</ul>';
    if(session()->has('cart'))
    {
        $size_value=session()->get('cart')->items[$product->id]['size_id'];
    }
    else
    {
        $size_value=0;
    }
    $html.='<input type="hidden" name="size_id" id="size_id-'.$product_id.'" value="'.$size_value.'" >';
    return $html;
}
//is new product
function is_new_product($date)
{    
    $old_date=strtotime(date($date));
    $curent_date=time();
    $diff_date=$curent_date-$old_date;
    $days=floor($diff_date/(60*60*24));    
    if($days<=30)
    {
        return true;
    }
    else
    {
        return false;
    }
}
//is product has discount
function has_discount($product_id)
{
    $discount=App\discount::where('product_id',$product_id)->where('exp_date','>=',date('Y-m-d H:i:s'))->first();    
    if($discount!=null)
    {
        return true;
    }
    else
    {
        return false;
    }
}
//is product has discount in this date
function has_discount_in_this_order_date($product_id,$date)
{
    $discount=App\discount::where('product_id',$product_id)->first();
    if($discount!=null)
    {
        $exp_date=strtotime(date($discount->exp_date));
        $order_date=strtotime(date($date));
        if($order_date<=$exp_date)
        {
            return true;
        }
        else
        {
            return false;
        }    
    }else
    {
        return false;
    }
}
//print final price
function price_with_discount($product_id)
{
    $product=App\product::find($product_id);
    $discount_data=App\discount::where('product_id',$product_id)->first();
    if($discount_data!=null){
    $new_price=$discount_data->discount;
    return $new_price;
    }else
    {
        return $product->selling_price;
    }
}
// function price_with_discount($price,$discount)
// {
//     $price_discount=($discount * $price) /100;
//     $new_price=$price - $price_discount;
//     return $new_price;
// }
//get product discount
function get_product_discount($product_id)
{    
    $product=App\product::find($product_id);
    $discount=App\discount::where('product_id',$product_id)->first();
    if($discount!=null && $discount->exp_date>=date('Y-m-d h:i:s'))
    {                
        return round(100-(($discount->discount * 100)/$product->selling_price));        
    }else
    {        
        return 0;
    }
}
//get_product_binifis
function get_product_binifis($product_id)
{
    $product=App\product::find($product_id);
    $binifis=$product->selling_price-($product->Purchasing_price+$product->to_magazin_price+$product->to_consumer_price+$product->ombalage_price+$product->adds_price);
    return $binifis;
}
//get_product_binifis_with_discount
function get_product_binifis_with_discount($product_id)
{
    $product=App\product::find($product_id);
    $binifis=price_with_discount($product->id)-($product->Purchasing_price+$product->to_magazin_price+$product->to_consumer_price+$product->ombalage_price+$product->adds_price);
    return $binifis;
}
//function is_invoice_exist
function is_invoice_exist($order_id)
{
    $invoice=App\invoice::where('order_id',$order_id)->first();
    if($invoice!=null)
    {
        return true;
    }else
    {
        return false;
    }
}
//get_product_charge
function get_product_charge($product_id)
{
    $product=App\product::find($product_id);
    $charge=$product->Purchasing_price+$product->to_magazin_price+$product->to_consumer_price+$product->ombalage_price+$product->adds_price;
    return $charge;
}
//get product price
function get_product_price_by_id($product_id)
{
    $product=App\product::findOrFail($product_id);
    if($product!=null){
        return $product->selling_price;
    }else
    {
        return 0;
    }
}
//function get color code from color id
function get_color_code_from_id($color_id)
{
    //dd($color_id);
    $color=App\color::findOrFail($color_id);
    return $color->code;
}
//function get color name from color id
function get_color_name_from_id($color_id)
{
    $color=App\color::find($color_id);
    if($color!=null)
    {
    return $color->name;
    }else
    {
        return 'إفتراضي';
    }
}
function get_size_name_from_id($size_id)
{
    $size=App\color::find($size_id);
    if($size!=null)
    {
    return $size->name;
    }else
    {
        return 'إفتراضي';
    }
}
//function get_deny_order_obs_from_id
function get_deny_order_obs_from_id($id)
{
    $deny_order_obs=App\deny_order_observation::find($id);
    return $deny_order_obs->obs;
}
//function get_return_order_obs_from_id
function get_return_order_obs_from_id($id)
{
    $return_order_obs=App\return_order_observation::find($id);
    return $return_order_obs->obs;
}
//function get_product_color_name_form_id_color
function get_product_brand_name_form_id_brand($id)
{
    $brand=App\brand::findOrFail($id);
    return $brand->name;
}
//function products_counter
function products_counter($nember)
{
    if($nember==0)
    {
        return 'منتج';
    }elseif($nember==1)
    {
        return 'منتج واحد';
    }elseif($nember==2)
    {
        return 'منتجين';
    }elseif($nember >= 3 && $nember<=10)
    {
        return 'منتجات';
    }else
    {
        return 'منتج';
    }
}
//function if in wish list
function in_wish_list($consumer_id,$product_id)
{
    $w_list=App\wish_list::where('consumer_id',$consumer_id)->where('product_id',$product_id)->first();
    if($w_list==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//function if in compar list
function in_compar_list($consumer_id,$product_id)
{
    $c_list=App\compar_list::where('consumer_id',$consumer_id)->where('product_id',$product_id)->first();
    if($c_list==null)
    {
        return false;
    }else
    {
        return true;
    }
}
//function get_dis_product_exp_day
function get_dis_product_exp_day($date)
{
    $to_date=new DateTime($date);
    $from_now=new DateTime();
    $interval=$to_date->diff($from_now);
    //
    return $interval->format('%d');
}
function get_dis_product_exp_heur($date)
{
    $to_date=new DateTime($date);
    $from_now=new DateTime();
    $interval=$to_date->diff($from_now);
    //
    return $interval->format('%h');
}
function get_dis_product_exp_munite($date)
{
    $to_date=new DateTime($date);
    $from_now=new DateTime();
    $interval=$to_date->diff($from_now);
    //
    return $interval->format('%i');
}
//get dis_product_exp_sec
function get_dis_product_exp_sec($date)
{
    $to_date=new DateTime($date);
    $from_now=new DateTime();
    $interval=$to_date->diff($from_now);
    //
    return $interval->format('%s');
}
//function has facebook()
function has_facebook()
{
    $setting=App\setting::where('var','facebook')->first();
    if($setting->value!=null)
    {
        return true;
    }else
    {
        return false;
    }
}
//function get facebook data
function get_facebook_data()
{
    $setting=App\setting::where('var','facebook')->first();
    return $setting;
}
//function has youtube()
function has_youtube()
{
    $setting=App\setting::where('var','youtube')->first();
    if($setting->value!=null)
    {
        return true;
    }else
    {
        return false;
    }
}
//function get youtube data
function get_youtube_data()
{
    $setting=App\setting::where('var','youtube')->first();
    return $setting;
}
//function has instagram()
function has_instagram()
{
    $setting=App\setting::where('var','instagram')->first();
    if($setting->value!=null)
    {
        return true;
    }else
    {
        return false;
    }
}
//function get instagram data
function get_instagram_data()
{
    $setting=App\setting::where('var','instagram')->first();
    return $setting;
}
//function google_analitycs_code_is_avtive()
function google_analitycs_code_is_avtive()
{
    $g_a_code=App\google_analytic::find(1);
    if($g_a_code->active == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
//function print_google_analytics_code()
function print_google_analytics_code()
{
    $g_a_code=App\google_analytic::find(1);
    return $g_a_code->code;
}