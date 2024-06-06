@extends('frontend.master')
@section('content')
		<section class="checkout-section">
            <div class="container">
                <form action="{{url('Product/order/confirm')}}" method="post" class="form-group billing-address-form" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout-wrapper">
                                <div class="billing-address-wrapper">
                                    <h4 class="title">Billing / Shipping Details</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="invoice_id" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="c_name" class="form-control" placeholder="Enter Full Name *"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="c_phone" class="form-control" placeholder="Phone *"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="form-control" placeholder="email *"/>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea rows="4" name="address" class="form-control" id="address"
                                                placeholder="Enter Full Address"></textarea>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div style="background: lightgrey;padding: 10px;margin-bottom: 10px;">
                                                <input type="radio" id="inside_dhaka" name="area" value="80" onclick="grandTotalIn()"/>
                                                <label for="inside_dhaka"
                                                    style="font-size: 18px;font-weight: 600;color: #000;">Inside Dhaka (80
                                                    Tk.)</label>
                                            </div>
                                            <div style="background: lightgrey;padding: 10px;">
                                                <input type="radio" id="outside_dhaka" name="area" value="150"onclick="grandTotalOut()"/>
                                                <label for="outside_dhaka"
                                                    style="font-size: 18px;font-weight: 600;color: #000;">Outside Dhaka (150
                                                    Tk.)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout-items-wrapper">
                                @php
                                    $total=0;
                                @endphp
                              @foreach ($getProduct as $getProduct )
                              <div class="checkout-item-outer">
                                <div class="checkout-item-left">
                                    <div class="checkout-item-image">
                                        <img src="{{asset($getProduct->product->image)}}" alt="Image"/>
                                    </div>
                                    <div class="checkout-item-info">
                                        <h6 class="checkout-item-name">
                                           {{$getProduct->product->name}}
                                        </h6>
                                        <p class="checkout-item-price">
                                            {{$getProduct->price}}
                                        </p>
                                        <span class="checkout-item-count">
                                           {{$getProduct->quantity}}
                                        </span>
                                        <br />
                                        <span class="checkout-item-count">
                                            Size:{{($getProduct->size)??'N.A'}}
                                        </span>
                                        <span class="checkout-item-count">
                                            Color:{{($getProduct->color)??'N.A'}}
                                        </span>
                                        <div class="checkout-product-incre-decre">

                                            <input type="number" readonly name="" placeholder="Qty" min="1" style="height: 35px;" value="{{$getProduct->quantity}}">

                                        </div>
                                    </div>
                                </div>
                                @php
                                    $total=$total + $getProduct->price;
                                @endphp
                                <div class="checkout-item-right">
                                    <a href="{{url('Product/cart/indexCartDelete',$getProduct->id)}}" class="delete-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                              @endforeach


                                <div class="sub-total-wrap">
                                    <div class="sub-total-item">
                                         <strong>Sub Total</strong>
                                        <strong id="subTotal">৳ {{$total}}</strong>
                                        <input type="hidden" name="subtotal" id="subTotal1" value="{{$total}}">
                                    </div>
                                    <div class="sub-total-item">
                                        <strong>Delivery charge</strong>
                                        <strong id="deliveryCharge">৳ </strong>

                                    </div>
                                    <div class="sub-total-item grand-total">
                                         <strong>Grand Total</strong>
                                         <strong id="grandTotal">৳ {{$total}}</strong>
                                         <input type="hidden" name="ingrand_Total" id="ingrand_Total" value="{{$total}}">

                                    </div>
                                </div>
                                <div class="payment-item-outer">
                                    <h6 class="payment-item-title">
                                        Select Payment Method
                                    </h6>
                                    <div class="payment-items-wrap justify-content-center">
                                        <div class="payment-item-outer">
                                            <input type="radio" name="payment_type" id="cod" value="cod" checked="">
                                            <label class="payment-item-outer-lable" for="cod">
                                                <strong>Cash On Delivery</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-place-btn-outer">
                                    <button type="submit" class="order-place-btn-inner">
                                        Place an Order
                                        <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection
@push('script')
<script>
 function  grandTotalIn(){
    var subTotal= parseFloat(document.getElementById('subTotal1').value);

    var charge= parseFloat(document.getElementById('inside_dhaka').value);

   var GrandTotal=parseFloat(subTotal+charge);

   document.getElementById('deliveryCharge').innerHTML='$'+charge;
   document.getElementById('grandTotal').innerHTML='$'+GrandTotal;
   document.getElementById('ingrand_Total').value=GrandTotal;

}

</script>

<script>
    function grandTotalOut(){
       var subTotal= parseFloat(document.getElementById('subTotal1').value);

       var charge= parseFloat(document.getElementById('outside_dhaka').value);

      var GrandTotal=parseFloat(subTotal+charge);

      document.getElementById('deliveryCharge').innerHTML='$'+charge;
      document.getElementById('grandTotal').innerHTML='$'+GrandTotal;
      document.getElementById('ingrand_Total').value=GrandTotal;

   }

   </script>

@endpush
