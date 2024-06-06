@extends('frontend.master')
@section('content')
<section class="product-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="filter-items-wrapper">
                            <div class="res_filter-items-top-outer">
                                <h3 class="res_filter-items-top-title">Filters</h3>
                            </div>

                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>

                                <form class="filter-items" id="collapseOne" action="{{url('product/shop')}}" method="GET">
                                    @foreach ($category as $category )
                                    @csrf
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" onclick="submitCategory()" value="{{$category->id}}" id="category_id" name="category_id" class="checkbox" />
                                            <span>{{$category->name}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </form>

                            </div>
                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>sub categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>

                                <form class="filter-items" id="collapseTwo" action="{{url('product/shop')}}" method="GET">
                                    @csrf
                                    @foreach ($allSubcategory as $subCategory )
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" onclick="submitsubCategory()" value="{{$subCategory->id}}" id="subcategory_id" name="subCategory_id" class="checkbox" />
                                            <span>
                                                {{$subCategory->name}}
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-page-header-wrapper">
                                    <div class="left-side-box">
                                        <h4 class="title">
                                            Shop Products
                                        </h4>
                                    </div>
                                    <div class="right-side-box">
                                        <h4 class="product-qty">
                                            Total Products
                                            @if ($type=='normal')
                                            <span class="number">{{$shop_product ->count()}}</span>
                                            @endif

                                            @if ($type=='category')
                                            <span class="number">{{$Category->product->count()}}</span>
                                            @endif

                                            @if ($type=='subCategory')
                                            <span class="number">{{$subCategoryProduct->product->count()}}</span>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @if ($type=='normal')
                            @foreach ($shop_product as $product)
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
                                               {{ucfirst($product->product_type)}}
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
                            @endif

                            @if ($type=='category')
                            @foreach ($Category->product as $product)
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
                                               {{ucfirst($product->product_type)}}
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
                            @endif


                            @if ($type=='subCategory')
                            @foreach ($subCategoryProduct->product as $product)
                          
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
                                               {{ucfirst($product->product_type)}}
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@push('script')
<script>
    function submitCategory(){
        document.getElementById('collapseOne').submit();
    }
</script>

<script>
    function submitsubCategory(){
        document.getElementById('collapseTwo').submit();
    }
</script>
@endpush
