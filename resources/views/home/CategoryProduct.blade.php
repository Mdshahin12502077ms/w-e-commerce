@extends('frontend.master')
@section('content')
<section class="product-page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-page-header-wrapper">
                            <div class="left-side-box">
                                <h4 class="title">
                                    Products
                                </h4>
                            </div>
                            <div class="right-side-box">
                                <h4 class="product-qty">
                                    Total Products
                                    <span class="number">40</span>
                                </h4>
                            </div>
                        </div>
                    </div>


                    @foreach ($category_product->product as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">

                        <div class="product__item-outer">
                            <div class="product__item-image-outer">
                                <a href="{{url('/product/details/'.$product->slug)}}" class="product__item-image-inner">
                                    <img src="{{asset($product->image)}}" alt="Product Image" />
                                </a>
                                <div class="product__item-add-cart-btn-outer">
                                    <a href="{{url('Product/cart/indexCartcreate/'.$product->id)}}" class="product__item-add-cart-btn-inner">
                                        Add to Cart
                                    </a>
                                </div>
                                <div class="product__type-badge-outer">
                                    <span class="product__type-badge-inner">
                                       {{$product->product_type}}
                                    </span>
                                </div>
                            </div>
                            <div class="product__item-info-outer">
                                <a href="{{url('/product/details/'.$product->slug)}}" class="product__item-name">
                                    {{$product->name}}
                                </a>
                                <div class="product__item-price-outer">
                                    <div class="product__item-discount-price">
                                        <del>  {{$product->discount_price}}</del>
                                    </div>
                                    <div class="product__item-regular-price">
                                        <span>  {{$product->regular_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
