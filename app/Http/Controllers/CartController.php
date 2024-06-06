<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function Add(Request $request,$id){
     $previousAddCart=Cart::where('product_id',$id)->where('ip_address',$request->ip())->first();
     $product=Product::where('id',$id)->first();
     $action=$request->action;
       if(  $previousAddCart == null){
        $cart=new Cart();
        $cart->ip_address=$request->ip();
        $cart->quantity=$request->quantity;
        $cart->product_id=$id;
        $cart->color=$request->color;
        $cart->size=$request->size;
        if($product->discount_price!=null){
            $cart->price=$product->discount_price;
        }
        elseif($product->discount_price==null) {
            $cart->price=$product->price;
         }

        $cart->save();
        if($action=='addToCart'){
            toastr()->success('Add Cart Successfully!');
           return redirect()->back();
        }
        elseif($action=='buyNow'){
            return redirect('/product/checkout');
        }
       }
       elseif($previousAddCart!= null){
        $previousAddCart->quantity=$previousAddCart->quantity+$request->quantity;
        $previousAddCart->save();
        if($action=='addToCart'){
            toastr()->success('Add Cart Successfully!');
           return redirect()->back();
        }
        elseif($action=='buyNow'){
            return redirect('/product/checkout');
        }
       }
    }

    public function AddIndexCart($id, Request $request){
        $previousAddCart=Cart::where('product_id',$id)->where('ip_address',$request->ip())->first();
        $product=Product::where('id',$id)->first();
        $action=$request->action;
          if(  $previousAddCart == null){
           $cart=new Cart();
           $cart->ip_address=$request->ip();
           $cart->quantity= $cart->quantity+1;
           $cart->product_id=$id;
           $cart->color=$request->color;
           $cart->size=$request->size;
           if($product->discount_price!=null){
               $cart->price=$product->discount_price;
           }
           elseif($product->discount_price==null) {
               $cart->price=$product->price;
            }

           $cart->save();

               toastr()->success('Add Cart Successfully!');
              return redirect()->back();


          }
          elseif($previousAddCart!= null){
           $previousAddCart->quantity=$previousAddCart->quantity+1;
           $previousAddCart->save();

               toastr()->success('Add Cart Successfully!');
              return redirect()->back();

          }
    }

    public function IndexCartDelete($id){

        $cart=Cart::find($id);
        $cart->delete();
        toastr()->success('Cart Deleted Successfully');
        return redirect()->back();


    }
}

