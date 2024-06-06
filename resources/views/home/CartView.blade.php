@extends('frontend.master')
@section('content')

    <section class="cart-products-section">
        <div class="container">
            <a href="index.html" class="continue-shopping-btn">
                <i class="fas fa-long-arrow-alt-left"></i>
                Continue Shopping
            </a>

            <div class="cart-products-wrapper">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Product Name</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>remove</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getProduct as $getProduct)
                        <tr>
                            <td class="cart-product-image-outer">
                                <img src="{{asset($getProduct->product->image)}}" height="70" width="120">
                            </td>
                            <td class="cart-product-name-outer">
                                {{$getProduct->product->name}}
                            </td>
                            <td class="cart-product-price-outer">
                               {{$getProduct->price}}
                            </td>
                            <td class="qty-increment-decrement-outer">
                                <input type="number" name="qty" value="{{$getProduct->quantity}}" readonly value="300" min="1" />
                            </td>
                            <td>
                                <a href="{{url('Product/cart/indexCartDelete',$getProduct->id)}}" class="remove-product">Remove</a>
                            </td>
                            <td class="cart-product-total-outer">
                             {{$getProduct->quantity*$getProduct->price }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="checkout.html" class="process-checkout-btn">
                    Proceed To CheckOut
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </section>


@endsection
