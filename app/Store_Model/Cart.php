<?php

namespace App\Store_Model;

class Cart
{
  public $items=[];
  public $totalQty;
  public $totalPrice;

  public function __construct($cart = null)
  {      
    if($cart)
    {
        $this->items=$cart->items;
        $this->totalQty=$cart->totalQty;
        $this->totalPrice=$cart->totalPrice;
    }
    else
    {
        $this->items=[];
        $this->totalQty=0;
        $this->totalPrice=0;
    }    
  }

  public function add($product)
  {
    if(has_discount($product->id))
    {
      $price=price_with_discount($product->selling_price,get_product_discount($product->id));
    }
    else
    {
      $price=$product->selling_price;
    } 

    $item=[
        'id' =>$product->id,
        'title' =>$product->name,
        'price' =>$price,
        'color_id' =>0,
        'size_id' =>0,
        'qty' =>0,
        'image' =>$product->image
    ];    
    if(!array_key_exists($product->id,$this->items))
    {
        $this->items[$product->id]=$item;
        $this->totalQty += 1;
        $this->totalPrice += $price;
    }
    else
    {
        $this->totalQty +=1;
        $this->totalPrice+=$price;
    }

        $this->items[$product->id]['qty'] +=1;

       

  }

  public function addWithQty($product,$qty,$color_id,$size_id)
  {  
    if(has_discount($product->id))
    {
      $price=price_with_discount($product->selling_price,get_product_discount($product->id));
    }
    else
    {
      $price=$product->selling_price;
    } 

    $item=[
        'id' =>$product->id,
        'title' =>$product->name,
        'price' =>$price,
        'color_id' =>0,
        'size_id' =>0,
        'qty' =>0,
        'image' =>$product->image
    ];    
    if(!array_key_exists($product->id,$this->items))
    {
        $this->items[$product->id]=$item;
        $this->totalQty += $qty;
        $this->totalPrice += $price * $qty;
    }
    else
    {
        $this->totalQty +=$qty;
        $this->totalPrice+=$price * $qty;
    }

        $this->items[$product->id]['qty'] +=$qty;
        $this->items[$product->id]['color_id'] =$color_id;
        $this->items[$product->id]['size_id'] =$size_id;
       

  }

  public function remove($id)
  {
      if(array_key_exists($id,$this->items))
      {
        $this->totalQty -=$this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
        unset($this->items[$id]);
      }
  }

  public function updateQty($id,$qty,$color_id,$size_id)
  {
    //reset the totalprice and totalqty in the cart
    $this->totalQty-=$this->items[$id]['qty'];
    $this->totalPrice-=$this->items[$id]['price'] * $this->items[$id]['qty'];
    //new qty of item
    $this->items[$id]['qty']=$qty;    
    $this->items[$id]['color_id']=$color_id;
    $this->items[$id]['size_id']=$size_id;

    //new totalprice and totalqty in the cart
    $this->totalQty+=$this->items[$id]['qty'];
    $this->totalPrice+=$this->items[$id]['price'] * $this->items[$id]['qty'];

  }

}
