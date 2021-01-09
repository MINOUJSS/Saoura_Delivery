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
    $create_sub_categories_url=url('/admin/sub-categories/create');
    $create_sub_sub_categories_url=url('/admin/sub-sub-categories/create');
    $current_url=Request::url();
    if($current_url==$categories_url || $current_url==$create_categories_url || $current_url==$create_sub_categories_url || $current_url==$create_sub_sub_categories_url)
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
    $current_url=Request::url();
    if($current_url==$deals_url || $current_url==$create_deal_url)
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
//:::::::::::function to active brands links group
function active_brands_links_group()
{ 
    $brands_url=url('/admin/brands'); 
    $create_brand_url=url('/admin/brand/create');
    $edit_brand_url=url('/admin/brand/edit');
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
    $edit_product_url=url('/admin/product/edit');
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