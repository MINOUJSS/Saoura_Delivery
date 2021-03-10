<?php
/*---------------------------------------------------------
    //        Admen Functions                //
---------------------------------------------------------*/
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
function active_deals_links_group()
{ 
    $deals_url=url('/admin/deals'); 
    $create_deal_url=url('/admin/deal/create');
    $request_url=Request::url();
    $url_array=explode('/',$request_url);    
    if(count($url_array)>5){
    $edit_deal_url=url('/admin/deal/'.$url_array[5].'/edit');
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
function active_deals_link()
{ 
    $deals_url=url('/admin/deals'); 
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
function active_create_deal_link()
{ 
    $create_deal_url=url('/admin/deal/create');
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
//global_Purchasing_price function
function global_Purchasing_price()
{
    $all_products=App\product::all();
        $x=0;
        foreach($all_products as $product)
        {
            $x+=($product->Purchasing_price * $product->qty);
        }
        return $x;
}
//global_selling_price function
function global_selling_price()
{
    $all_products=App\product::all();
        $x=0;
        foreach($all_products as $product)
        {
            $x+=($product->selling_price * $product->qty);
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
    $reatings=App\reating::where('product_id',$id)->get();
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
    $product_images=App\product_images::where('product_id',$product_id)->get();
    $product_colors=App\product_colors::where('product_id',$product_id)->get();    
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
//get no read notification
function get_no_read_notification_count()
{
    $note=App\admin_notefication::where('status',0)->get();
    return $note->count();
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
//get_no_reading_note_data
function get_no_reading_note_data()
{
    $note=App\admin_notefication::where('status',0)->get();
    return $note;
}
/*---------------------------------------------------------
    //        Store Functions                //
---------------------------------------------------------*/
//:::::::::::function to detect home url and add css class to category nav
function is_home()
{ 
    $home_url=url('/'); 
    $current_url=Request::url();
    if($current_url==$home_url)
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
    $Categories=App\category::all();
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
    $html.='<input type="hidden" name="color_id" id="color_id" value="'.$color_value.'" >';
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
    $html.='<input type="hidden" name="size_id" id="size_id" value="'.$size_value.'" >';
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
//print final price
function price_with_discount($price,$discount)
{
    $price_discount=($discount * $price) /100;
    $new_price=$price - $price_discount;
    return $new_price;
}
//get product discount
function get_product_discount($product_id)
{
    $discount=App\discount::where('product_id',$product_id)->first();
    if($discount!=null){
        return $discount->discount;
    }else
    {
        return 0;
    }
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
    $color=App\color::findOrFail($color_id);
    return $color->name;
}
//function get_product_color_name_form_id_color
function get_product_brand_name_form_id_brand($id)
{
    $brand=App\brand::findOrFail($id);
    return $brand->name;
}