<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\reating;
use App\Store_Model\Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products=product::OrderBy('id','desc')->paginate(12);
        return view('store.products',compact('products')); 
    }

    public function product($id)
    {
        $product=product::findOrfail($id);
        $reviews=reating::where('product_id',$product->id)->get();
        return view('store.product-page',compact('product','reviews'));
    }

    public function addToCart(product $product)
    {
        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart=new Cart();
        }
        $cart->add($product);
        session()->put('cart',$cart);
         dd($cart);
        return redirect()->back();

    }

    public function addWithQty(Request $request,product $product)
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        if(session()->has('cart'))
        {
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart=new Cart();
        }
        $cart->addWithQty($product,$request->qty,$request->color_id,$request->size_id);                
        session()->put('cart',$cart);        
        //dd($cart);
        return redirect()->back();

    }

    public function removeFromCart(product $product)
    {
        $cart=new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty <= 0)
        {
            session()->forget('cart');
        }
        else
        {
            session()->put('cart',$cart);
        }

        return redirect()->back();
    }

    public function updateQty(Request $request,product $product) 
    {
        $this->validate($request,[
            'qty' => 'required|numeric|min:1'
        ]);

        $cart=new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty,$request->color_id,$request->size_id);
        session()->put('cart',$cart);
        //dd($cart);
        return redirect()->back();
    }

    public function showCart()
    {
        return view('store.cart');
    }

}
