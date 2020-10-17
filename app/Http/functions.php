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