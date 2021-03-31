<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store_Model\Searcher;

class SearcherSessionController extends Controller
{
    public function forget_searcher()
    {
        //forget searcher session    
        session()->forget('searcher');
        //redirect back
        return redirect()->back();
    }
    //add color for searcher session
    public function add_color($id)
    {
        if(session()->has('searcher'))
        {
            $colors=session()->get('searcher')->query['colors'];
            if(!in_array($id,$colors))
            {            
            $sizes=session()->get('searcher')->query['sizes'];
            $brands=session()->get('searcher')->query['brands'];
            $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            //add color id to colors variable
            $colors[]+=$id;
            //new seracher
            $searcher=new searcher;
            $searcher->query['colors']=$colors;
            $searcher->query['brands']=$brands;
            $searcher->query['sizes']=$sizes;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);
            }
            
        }
        else
        {
            //new seracher
            $searcher=new searcher;
            $searcher->query['colors'][]=$id;            
            session()->put('searcher',$searcher);
        }
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }
    //add color for searcher session
    public function add_size($id)
    {
        if(session()->has('searcher'))
        {
            $sizes=session()->get('searcher')->query['sizes'];
            if(!in_array($id,$sizes))
            {            
            $colors=session()->get('searcher')->query['colors'];
            $brands=session()->get('searcher')->query['brands'];
            $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            //add color id to colors variable
            $sizes[]+=$id;
            //new seracher
            $searcher=new searcher;
            $searcher->query['sizes']=$sizes;
            $searcher->query['brands']=$brands;
            $searcher->query['colors']=$colors;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);
            }
            
        }
        else
        {
            //new seracher
            $searcher=new searcher;
            $searcher->query['sizes'][]=$id;            
            session()->put('searcher',$searcher);
        }
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }
    //add brand for searcher session
    public function add_brand($id)
    {
        if(session()->has('searcher'))
        {
            $brands=session()->get('searcher')->query['brands'];
            if(!in_array($id,$brands))
            {            
            $colors=session()->get('searcher')->query['colors'];
            $sizes=session()->get('searcher')->query['sizes'];
            $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            //add color id to colors variable
            $brands[]+=$id;
            //new seracher
            $searcher=new searcher;
            $searcher->query['brands']=$brands;
            $searcher->query['sizes']=$sizes;
            $searcher->query['colors']=$colors;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);
            }
            
        }
        else
        {
            //new seracher
            $searcher=new searcher;
            $searcher->query['brands'][]=$id;            
            session()->put('searcher',$searcher);
        }
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }
    //add min price for searcher session
    public function add_min_price($min_price)
    {               
        if(session()->has('searcher'))
        {             
            $sizes=session()->get('searcher')->query['sizes'];                        
            $colors=session()->get('searcher')->query['colors'];
            $brands=session()->get('searcher')->query['brands'];
            // $min_price=session()->get('searcher')->query['min_price'];
            $max_price=session()->get('searcher')->query['max_price'];
            //new seracher
            $searcher=new searcher;
            $searcher->query['sizes']=$sizes;
            $searcher->query['colors']=$colors;
            $searcher->query['brands']=$brands;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);                        
            
        }
        else
        {            
            //new seracher
            $searcher=new searcher;            
            $searcher->query['min_price']=$min_price;            
            session()->put('searcher',$searcher);            
        } 
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }
    public function add_max_price($max_price)
    {               
        if(session()->has('searcher'))
        {             
            $sizes=session()->get('searcher')->query['sizes'];                        
            $colors=session()->get('searcher')->query['colors'];
            $brands=session()->get('searcher')->query['brands'];
            $min_price=session()->get('searcher')->query['min_price'];
            //$max_price=session()->get('searcher')->query['max_price'];
            //new seracher
            $searcher=new searcher;
            $searcher->query['sizes']=$sizes;
            $searcher->query['colors']=$colors;
            $searcher->query['brands']=$brands;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);                        
            
        }
        else
        {            
            //new seracher
            $searcher=new searcher;            
            $searcher->query['max_price']=$max_price;            
            session()->put('searcher',$searcher);            
        } 
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
        //return redirect()->back();
    }
    //delete color form searcher session
    public function delete_color($index)
    {
            $colors_data=session()->get('searcher')->query['colors'];
            // for($x=0 ; $x<=count($colors_data)-1 ;$x++)
            // {
            // $colors[]=session()->get('searcher')->query['colors'][$x];
            // }
            $new_colors=array_diff($colors_data, array($colors_data[$index]));
            //get searcher session size
            $sizes=session()->get('searcher')->query['sizes'];
            //get searcher session brands
            $brands=session()->get('searcher')->query['brands'];
            //get searcher session min_price
            $min_price=session()->get('searcher')->query['min_price'];
            //get searcher session max_price
            $max_price=session()->get('searcher')->query['max_price'];
            //create new searcher
            $searcher=new searcher;
            $searcher->query['colors']=$new_colors;
            $searcher->query['sizes']=$sizes;
            $searcher->query['brands']=$brands;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);
         //dd($searcher);
            //if searcher session is empty forget searcher
            if(count($searcher->query['colors'])==0 && count($searcher->query['sizes'])==0 && count($searcher->query['brands'])==0 && $searcher->query['min_price']==0 && $searcher->query['max_price']==0)
            {
                session()->forget('searcher');
            }
         //return redirect()->back();
            //
            $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }

    //delete size form searcher session
    public function delete_size($index)
    {
        $sizes_data=session()->get('searcher')->query['sizes'];
        // for($x=0 ; $x<=count($colors_data)-1 ;$x++)
        // {
        // $colors[]=session()->get('searcher')->query['colors'][$x];
        // }
        $new_sizes=array_diff($sizes_data, array($sizes_data[$index]));
        //get searcher session colors
        $colors=session()->get('searcher')->query['colors'];
        //get searcher session brands
        $brands=session()->get('searcher')->query['brands'];
        //get searcher session min_price
        $min_price=session()->get('searcher')->query['min_price'];
        //get searcher session max_price
        $max_price=session()->get('searcher')->query['max_price'];
        //create new searcher
        $searcher=new searcher;
        $searcher->query['sizes']=$new_sizes;
        $searcher->query['colors']=$colors;
        $searcher->query['brands']=$brands;
        $searcher->query['min_price']=$min_price;
        $searcher->query['max_price']=$max_price;
        session()->put('searcher',$searcher);
        //dd($searcher);
        //if searcher session is empty forget searcher
        if(count($searcher->query['colors'])==0 && count($searcher->query['sizes'])==0 && count($searcher->query['brands'])==0 && $searcher->query['min_price']==0 && $searcher->query['max_price']==0)
        {
            session()->forget('searcher');
        }
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }

    //delete brand form searcher session
    public function delete_brand($index)
    {
            $brands_data=session()->get('searcher')->query['brands'];
            // for($x=0 ; $x<=count($colors_data)-1 ;$x++)
            // {
            // $colors[]=session()->get('searcher')->query['colors'][$x];
            // }
            $new_brands=array_diff($brands_data, array($brands_data[$index]));
            //get searcher session size
            $sizes=session()->get('searcher')->query['sizes'];
            //get searcher session colors
            $colors=session()->get('searcher')->query['colors'];
            //get searcher session min_price
            $min_price=session()->get('searcher')->query['min_price'];
            //get searcher session max_price
            $max_price=session()->get('searcher')->query['max_price'];
            //create new searcher
            $searcher=new searcher;
            $searcher->query['brands']=$new_brands;
            $searcher->query['sizes']=$sizes;
            $searcher->query['colors']=$colors;
            $searcher->query['min_price']=$min_price;
            $searcher->query['max_price']=$max_price;
            session()->put('searcher',$searcher);
         //dd($searcher);
            //if searcher session is empty forget searcher
            if(count($searcher->query['colors'])==0 && count($searcher->query['sizes'])==0 && count($searcher->query['brands'])==0 && $searcher->query['min_price']==0 && $searcher->query['max_price']==0)
            {
                session()->forget('searcher');                
            }
         //return redirect()->back();
            //
            $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }

    //delete min_price form searcher session
    public function delete_min_price()
    {
        $sizes=session()->get('searcher')->query['sizes'];        
        //get searcher session colors
        $colors=session()->get('searcher')->query['colors'];
        //get searcher session brands
        $brands=session()->get('searcher')->query['brands'];
        //get searcher session min_price
        $min_price=0;
        //get searcher session max_price
        $max_price=session()->get('searcher')->query['max_price'];
        //create new searcher
        $searcher=new searcher;
        $searcher->query['sizes']=$sizes;
        $searcher->query['colors']=$colors;
        $searcher->query['brands']=$brands;
        $searcher->query['min_price']=$min_price;
        $searcher->query['max_price']=$max_price;
        session()->put('searcher',$searcher);
        //if searcher session is empty forget searcher
        if(count($searcher->query['colors'])==0 && count($searcher->query['sizes'])==0 && count($searcher->query['brands'])==0 && $searcher->query['min_price']==0 && $searcher->query['max_price']==0)
        {
            session()->forget('searcher');
        }        
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;
    }

    //delete max_price form searcher session
    public function delete_max_price()
    {
        $sizes=session()->get('searcher')->query['sizes'];        
        //get searcher session colors
        $colors=session()->get('searcher')->query['colors'];
        //get searcher session brands
        $brands=session()->get('searcher')->query['brands'];
        //get searcher session min_price
        $min_price=session()->get('searcher')->query['min_price'];        
        //get searcher session max_price
        $max_price=0;
        //create new searcher
        $searcher=new searcher;
        $searcher->query['sizes']=$sizes;
        $searcher->query['colors']=$colors;
        $searcher->query['brands']=$brands;
        $searcher->query['min_price']=$min_price;
        $searcher->query['max_price']=$max_price;
        session()->put('searcher',$searcher); 
        //if searcher session is empty forget searcher
        if(count($searcher->query['colors'])==0 && count($searcher->query['sizes'])==0 && count($searcher->query['brands'])==0 && $searcher->query['min_price']==0 && $searcher->query['max_price']==0)
        {
            session()->forget('searcher');
        }       
        //return redirect()->back();
        //
        $output='
        <h3 class="aside-title">تسوق مع مراعات:</h3>';
        if(session()->has('searcher')){
        if(count(session()->get('searcher')->query['colors']) > 0)
        {
        $output.='<ul class="filter-list">        
            <li><span class="text-uppercase">الألوان:</span></li>';
            foreach(session()->get('searcher')->query['colors'] as $index=>$color_id)
            {                
            $output.='<li><a onclick="delete_color_to_searcher('.$index.')" style="color:#FFF; background-color:'.get_color_code_from_id($color_id).'">'.get_color_name_from_id($color_id).'</a></li>';
            }        
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['sizes']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">المقاسات:</span></li>';
            foreach(session()->get('searcher')->query['sizes'] as $index=>$size_id)
            {
            $output.='<li><a onclick="delete_size_to_searcher('.$index.')">'.get_product_size_form_id_size($size_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if(count(session()->get('searcher')->query['brands']) > 0)
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">العلامات التجارية:</span></li>';
            foreach(session()->get('searcher')->query['brands'] as $index=>$brand_id)
            {
            $output.='<li><a onclick="delete_brand_to_searcher('.$index.')">'.get_product_brand_name_form_id_brand($brand_id).'</a></li>';
            }
        $output.='</ul>';
        }
        if((session()->get('searcher')->query['min_price']!=0 || session()->get('searcher')->query['max_price']!=0))
        {
        $output.='<ul class="filter-list">
            <li><span class="text-uppercase">الأسعار:</span></li>';
            if(session()->get('searcher')->query['min_price']!=0)
            {
            $output.='<li><a onclick="delete_min_price_to_searcher()">إبتداءا من: <span id="min_price_value">'.session()->get('searcher')->query['min_price'].'</span> د.ج</a></li>';
            }
            if(session()->get('searcher')->query['max_price']!=0)
            {
            $output.='<li><a onclick="delete_max_price_to_searcher()">إلى غاية: <span id="max_price_value">'.session()->get('searcher')->query['max_price'].'</span> د.ج</a></li>';
            }
        $output.='</ul>';
        }    
    
        $output.='<a href="/searcher/forget"><button class="primary-btn">إمسح الكل</button></a>';
    }else{
    $output.='<ul class="filter-list">
        <li><span class="text-uppercase">لم يتم بعد إختيار التقيدات لفرز المنتجات</span></li>
    </ul>';
    }       
    return $output;                
    }    
}
