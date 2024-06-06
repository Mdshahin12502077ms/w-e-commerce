<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Cart;
use App\Models\order;
use App\Models\orderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function confirm_order(Request $request)
    {
        $FindCart = Cart::with(['product'])->where('ip_address', $request->ip())->first();
        if ($FindCart != null) {
            $order = new order();
            $prevoius_order =order::orderBy('id','desc')->first();

            if ($prevoius_order == null) {

                $order->invoice_id = 'SHA-1';
            }
            elseif ($prevoius_order != null) {
                $order->invoice_id = 'SHA-'.$prevoius_order->id+1;
            }
            $order->c_name = $request->c_name;
            $order->c_phone = $request->c_phone;
            $order->email = $request->email;
            $order->area = $request->area;
            $order->price = $request->ingrand_Total;
            $order->address = $request->address;
              $order->save();
            $FindCarts = Cart::with(['product'])->where('ip_address', $request->ip())->get();
            foreach ($FindCarts as $cart) {
                $orderDetails=new orderDetails();
                $orderDetails->order_id=$order->id;
                $orderDetails->product_id=$cart->product_id;
                $orderDetails->quantity=$cart->quantity;
                $orderDetails->unit_price=$cart->price;
                $orderDetails->size=$cart->size;
                $orderDetails->color=$cart->color;
                $orderDetails->save();
                $cart->delete();

            }


            toastr()->success('Thank You For Ordering');
            return redirect('Product/order/thanks/'.$order->invoice_id);
        } else {
            toastr()->warning('Sorry! You dont have any product in you cart!');
            return redirect('/');
        }
    }


    public function thanks($invoice_id){


         return view('home.Thankyou',compact('invoice_id'));
    }


    public function all(){
        $order=order::orderBy('id','desc')->with(['orderDetails'])->get();

        return view('Backend.admin.Order.AllOrder',compact('order'));
    }

    public function confirmed($id){
        $order_status=order::find($id);
        $order_status->status="confirmed";
        $order_status->save();
        toastr()->success('Your Order Is Confirmed Successfully');
        return redirect()->back();
    }

    public function delivered($id){
        $order_status=order::find($id);

        if($order_status->currier_name!=null){
            $order_status->status="Delivered";
            // if($order_status->currier_name=="steadfast"){

            // }

            // mail start
            if( $order_status->email!=null){
                Mail::to( $order_status->email)->send(new OrderConfirmationMail($order_status));
            }


            $order_status->save();
            toastr()->success('Your Order Is Delivered Successfully');
        }
       else{
        toastr()->warning('You dont select Corier Name!');
       }
        return redirect()->back();
    }

    public function canceled($id){
        $order_status=order::find($id);
        $order_status->status="Canceled";
        $order_status->save();
        toastr()->success('Your Order Is Canceled Successfully');
        return redirect()->back();
    }

    public function pending($id){
        $order_status=order::find($id);
        $order_status->status="pending";
        $order_status->save();
        toastr()->success('Your Order Is added Pending Successfully');
        return redirect()->back();
    }
    public function pending_list(){
        $order_pending=order::orderBy('id','desc')->with(['orderDetails'])->where('status','pending')->get();

        return view('Backend.admin.Order.pendinglist',compact('order_pending'));
    }
    public function confirmed_list(){
        $order_confirmed=order::orderBy('id','desc')->with(['orderDetails'])->where('status','confirmed')->get();

        return view('Backend.admin.Order.confirmedlist',compact('order_confirmed'));
    }
    public function delivered_list(){
        $order_delivered=order::orderBy('id','desc')->with(['orderDetails'])->where('status','Delivered')->get();

        return view('Backend.admin.Order.deliveredlist',compact('order_delivered'));
    }
    public function canceled_list(){
        $order_canceled=order::orderBy('id','desc')->with(['orderDetails'])->where('status','Canceled')->get();

        return view('Backend.admin.Order.canceled',compact('order_canceled'));
    }

    public function details($id){
        $details= order::where('id',$id)->with(['orderDetails'])->first();
        return view('Backend.admin.Order.Details',compact('details'));
    }

    public function update(Request $request,$id){
     $details=order::find($id);
     $details->c_name= $request->c_name;
     $details->c_phone= $request->c_phone;
     $details->email= $request->email;
     $details->address= $request->address;
     $details->price= $request->price;
     if($request->courier_name=='steadfast'){
        $details->currier_name='steadfast';
     }
     elseif($request->courier_name=='other'){
        $details->currier_name=$request->other_courier;
      }

      $details->save();
      toastr()->success('Order Details is Updated Successfully');
      return redirect()->back();
    }
}
