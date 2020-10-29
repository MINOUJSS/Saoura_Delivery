<?php
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