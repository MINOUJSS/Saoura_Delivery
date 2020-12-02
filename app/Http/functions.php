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