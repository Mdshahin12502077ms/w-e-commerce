@extends('frontend.master')

@section('content')
<main>
		<!-- /Home Slider -->
		<section class="home-slider-section">
			<div class="container">
				<div class="home__slider-sec-wrap">
					<div class="home__category-outer">
						<ul class="header__category-list">
                            @foreach ( $categories as $category )
							<li class="header__category-list-item item-has-submenu">
								<a href="{{url('Category/product/'.$category->slug)}}" class="header__category-list-item-link">

                                    <img src="{{asset($category->image)}}" alt="category">
                                    {{$category->name}}

								</a>
								<ul class="header__nav-item-category-submenu">
                                    @foreach ( $category->subCategory as $subCategory )
                                  
									<li class="header__category-submenu-item">
										<a href="{{url('frontend/subategory/product/'.$subCategory->slug)}}" class="header__category-submenu-item-link">
                                            {{$subCategory->name}}
										</a>
									</li>
                                    @endforeach
								</ul>
							</li>
                            @endforeach
						</ul>
					</div>
					<div class="home__slider-items-wrapper">
						<div class="home__slider-item-outer">
							<img src="{{asset('frontend/assets/images/slider.jpg')}}" alt="image" class="home__slider-item-image">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Home Slider -->

		<!-- Categoris Slider -->
		<section class="categoris-slider-section">
			<div class="container">
				<div class="section-title-outer">
					<h1 class="title">
						Categories
					</h1>
				</div>
				<div class="categoris-items-wrapper owl-carousel">
                    @foreach ( $categories as $category )
					<a href="{{url('Category/product'.$category->slug)}}" class="categoris-item">
						<img src="{{asset($category->image)}}" alt="category" />
						<h6 class="categoris-name">
							{{$category->name}}
						</h6>
						<span class="items-number">1 items</span>
					</a>
                    @endforeach
				</div>
			</div>
		</section>
		<!-- /Categoris Slider -->
		<!-- Banner -->
		<section class="banner-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="banner-item-outer">
							<img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" />
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="banner-item-outer">
							<img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" />
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="banner-item-outer">
							<img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" />
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Banner -->
		<!-- Popular Product -->
		<section class="product-section">
			<div class="container">
				<div class="section-title-outer">
					<h1 class="title">
						Hot Products
					</h1>
					<a href="type-products.html" class="product-view-all-btn">
						View All
					</a>
				</div>
				<div class="product-items-wrapper">
                    @foreach ($hotProducts as $hot )
                    <div class="product__item-outer">
						<div class="product__item-image-outer">
							<a href="{{url('/product/details',$hot->slug)}}" class="product__item-image-inner">
								<img src="{{asset($hot->image)}}" alt="Product Image" />
							</a>
							<div class="product__item-add-cart-btn-outer">
								<a href="{{url('Product/cart/indexCartcreate/'.$hot->id)}}" class="product__item-add-cart-btn-inner">
									Add to Cart
								</a>
							</div>
							<div class="product__type-badge-outer">
								<span class="product__type-badge-inner">
									Hot
								</span>
							</div>
						</div>
						<div class="product__item-info-outer">
							<a href="#" class="product__item-name">
								{{$hot->name}}
							</a>
							<div class="product__item-price-outer">
								<div class="product__item-discount-price">
                                    @if($hot->discount_price!=null)
									<del>{{$hot->discount_Price}}</del>
                                    @endif
								</div>
								<div class="product__item-regular-price">
									<span>{{$hot->regular_price}}</span>
								</div>
							</div>
						</div>
					</div>

                    @endforeach

				</div>
			</div>
		</section>
		<!-- /Popular Product -->
		<!-- Popular Product -->
		<section class="product-section">
			<div class="container">
				<div class="section-title-outer">
					<h1 class="title">
						New Arrival
					</h1>
					<a href="type-products.html" class="product-view-all-btn">
						View All
					</a>
				</div>
				<div class="product-items-wrapper">
                    @foreach ($newArrival as $new )
                    <div class="product__item-outer">
						<div class="product__item-image-outer">
							<a href="{{url('/product/details',$new->slug)}}" class="product__item-image-inner">
								<img src="{{asset($new->image)}}" alt="Product Image" />
							</a>
							<div class="product__item-add-cart-btn-outer">
								<a href="{{url('Product/cart/indexCartcreate/'.$new->id)}}" class="product__item-add-cart-btn-inner">
									Add to Cart
								</a>
							</div>
							<div class="product__type-badge-outer">
								<span class="product__type-badge-inner">
									New
								</span>
							</div>
						</div>
						<div class="product__item-info-outer">
							<a href="#" class="product__item-name">
								{{$new->name}}
							</a>
							<div class="product__item-price-outer">
								<div class="product__item-discount-price">
                                    @if($new->discount_price!=null)
									<del>{{$new->discount_Price}}</del>
                                    @endif
								</div>
								<div class="product__item-regular-price">
									<span>{{$new->regular_price}}</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach


				</div>
			</div>
		</section>
		<!-- /Popular Product -->
		<!-- Popular Product -->
		<section class="product-section">
			<div class="container">
				<div class="section-title-outer">
					<h1 class="title">
						Regular Products
					</h1>
					<a href="type-products.html" class="product-view-all-btn">
						View All
					</a>
				</div>
				<div class="product-items-wrapper">
                    @foreach ( $regularProducts as $regular )
                    <div class="product__item-outer">
						<div class="product__item-image-outer">
							<a href="{{url('/product/details',$regular->slug)}}" class="product__item-image-inner">
								<img src="{{asset($regular->image)}}" alt="Product Image" />
							</a>
							<div class="product__item-add-cart-btn-outer">
								<a href="{{url('Product/cart/indexCartcreate/'.$regular->id)}}" class="product__item-add-cart-btn-inner">
									Add to Cart
								</a>
							</div>
							<div class="product__type-badge-outer">
								<span class="product__type-badge-inner">
									Regular
								</span>
							</div>
						</div>
						<div class="product__item-info-outer">
							<a href="#" class="product__item-name">
								{{$regular->name}}
							</a>
							<div class="product__item-price-outer">
								<div class="product__item-discount-price">
                                    @if($regular->discount_price!=null)
									<del>{{$regular->discount_Price}}</del>
                                    @endif
								</div>
								<div class="product__item-regular-price">
									<span>{{$regular->regular_price}}</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach


				</div>
			</div>
		</section>
		<!-- /Popular Product -->
		<!-- Popular Product -->
		<section class="product-section">
			<div class="container">
				<div class="section-title-outer">
					<h1 class="title">
						Discount Products
					</h1>
					<a href="type-products.html" class="product-view-all-btn">
						View All
					</a>
				</div>
				<div class="product-items-wrapper">
                    @foreach ($discountProducts as $discount )
                    <div class="product__item-outer">
						<div class="product__item-image-outer">
							<a href="{{url('/product/details',$discount->slug)}}"</a> class="product__item-image-inner">
								<img src="{{asset($discount->image)}}" alt="Product Image" />
							</a>
							<div class="product__item-add-cart-btn-outer">
								<a href="{{url('Product/cart/indexCartcreate/'.$discount->id)}}" class="product__item-add-cart-btn-inner">
									Add to Cart
								</a>
							</div>
							<div class="product__type-badge-outer">
								<span class="product__type-badge-inner">
									Discount
								</span>
							</div>
						</div>
						<div class="product__item-info-outer">
							<a href="#" class="product__item-name">
								{{$discount->name}}
							</a>
							<div class="product__item-price-outer">
								<div class="product__item-discount-price">
                                    @if($discount->discount_price!=null)
									<del>{{$discount->discount_Price}}</del>
                                    @endif
								</div>
								<div class="product__item-regular-price">
									<span>{{$discount->regular_price}}</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach


				</div>
			</div>
		</section>
		<!-- /Popular Product -->
	</main>
@endsection
