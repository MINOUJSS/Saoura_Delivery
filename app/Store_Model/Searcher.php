<?php

namespace App\Store_Model;
use App\color;
use App\size;
use App\product;

class Searcher
{
  public $query=[];

  public function __construct($search = null)
  {      
            if($search)
            {
                $this->query=$search->query;                
            }
            else
            {
                //$colors=color::all();
                $colors=[];
                $sizes=[];
                $min_price=0;
                $max_price=0;
                $brands=[];        
                $this->query=[
                    'colors'=>$colors,
                    'sizes'=>$sizes,
                    'min_price'=>$min_price,
                    'max_price'=>$max_price,
                    'brands'=>$brands
                ];

            }    
  }


}