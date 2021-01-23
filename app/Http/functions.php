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