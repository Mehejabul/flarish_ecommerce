@extends('frontend.layouts.main')

@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Single Products</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Products</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Sart Single product -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-pro-rightside ec-common-rightside col-lg-12 order-lg-last col-md-12 order-md-first">
                    @if ($product)
                        <!-- Single product content Start -->
                        <div class="single-pro-block">
                            <div class="single-pro-inner">
                                <div class="row">
                                    <div class="single-pro-img">
                                        <div class="single-product-scroll">
                                            <div class="single-product-cover">
                                                @if ($product->image)
                                                    <div class="single-slide zoom-image-hover">
                                                        <img class="img-responsive" src="{{ asset('images/product_image/'.$product->image) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                @if ($product->images)
                                                    @foreach ($product->images as $image)
                                                        <div class="single-slide zoom-image-hover">
                                                            <img class="img-responsive" src="{{ asset('images/multiImage/'.$image->image) }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach
                                                @endif

                                                {{-- <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img11.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img12.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img13.jpg"
                                                        alt="">
                                                </div> --}}
                                            </div>
                                            <div class="single-nav-thumb">
                                                @if ($product->image)
                                                    <div class="single-slide">
                                                        <img class="img-responsive" src="{{ asset('images/product_image/'.$product->image) }}"
                                                            alt="">
                                                    </div>
                                                @endif
                                                @if ($product->images)
                                                    @foreach ($product->images as $image)
                                                        <div class="single-slide">
                                                            <img class="img-responsive" src="{{ asset('images/multiImage/'.$image->image) }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- <div class="single-slide">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img1.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img10.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img11.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img12.jpg"
                                                        alt="">
                                                </div>
                                                <div class="single-slide">
                                                    <img class="img-responsive" src="assets/images/custom_category-image/cat_img13.jpg"
                                                        alt="">
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-pro-desc">
                                        <div class="single-pro-content">
                                            <h5 class="ec-single-title">{{ $product->title }}</h5>
                                            <div class="ec-single-price-stoke">
                                                <div class="ec-single-price">
                                                    <!-- <span class="ec-single-ps-title">As low as</span> -->
                                                    @if ($product->discount_amount > 0)
                                                        <span class="new-price">TK {{ $product->mrp - $product->discount_amount }}</span>
                                                        <strike class="old_price">TK {{ $product->mrp }} </strike>
                                                    @else
                                                    <span class="new-price">TK {{ $product->mrp}}</span>
                                                    @endif
                                                </div>
                                                <div class="ec-single-stoke">
                                                    {{-- <span class="ec-single-ps-title">IN STOCK</span> --}}
                                                    <span class="ec-single-sku">SKU#: {{ $product->code }}</span>
                                                </div>
                                            </div>
                                            @if(count($product->productvariation)>0)
                                            <div class="ec-pro-variation">
                                                <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                    <span>SIZE</span>
                                                    <div class="ec-pro-variation-content">
                                                        <ul>
                                                            @foreach ($product->productvariation as $size)
                                                            <input type="hidden" id="sizeId" value='{{ $size->id }}'>
                                                            <li class="active @if($size->quantity == 0) no-stock  @endif"> <a href="javascript:void(0)" data-stock="{{ $size->quantity }}" data-size="{{ $size->productvariation->size }}" variationID="{{ $size->productvariation->id }}" class="product_details_nav_link sizeClick">{{ $size->productvariation->size }}</a></li>
                                                            {{-- <li><span>M</span></li>
                                                            <li><span>L</span></li>
                                                            <li><span>XL</span></li> --}}
                                                            @endforeach
                                                        </ul>
                                                        <p id="sizeColorSelectError" style="padding-top: 10px; font-size: 12px !important; color: red;"><span></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="ec-single-qty">
                                                {{-- <div class="qty-plus-minus">
                                                    <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                                </div> --}}
                                                <div class="ec-single-cart ">
                                                    {{-- <button href="cart.html" class="btn btn-primary">Add To Cart</button> --}}
                                                    <button id="btn-cart" class="button btn-primary btn-cart"
                                                    cus-product-id="{{ $product->id }}"
                                                    cus-product-name="{{ ucwords($product->title) }}"
                                                    cus-product-slug="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif"
                                                    cus-price="@if($product->discount_amount > 0) {{ $product->mrp-$product->discount_amount }} @else {{ $product->mrp }} @endif"
                                                    cus-photo="{{ asset('images/product_image/'.$product->image)}}" >
                                                Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single product content End -->
                        <!-- Single product tab start -->
                        <div class="ec-single-pro-tab">
                            <div class="ec-single-pro-tab-wrapper">
                                <div class="ec-single-pro-tab-nav">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                                role="tablist">More Information</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content  ec-single-pro-tab-content">
                                    <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                        <div class="ec-single-pro-tab-desc">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                    <div id="ec-spt-nav-info" class="tab-pane fade">
                                        <div class="ec-single-pro-tab-moreinfo">
                                            {!! $product->details_description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Single product -->

    <!-- Related Product Start -->
    <section class="section ec-releted-product section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Related products</h2>
                        <h2 class="ec-title">Related products</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-b-30">
                @if ($product)
                <!-- Related Product Content -->
                    @foreach (App\Models\Product::where('category_id',$product->category_id)->where('status','Active')->where('id','!=',$product->id)->orderBy('id','DESC')->take(4)->get() as $relatedProduct)

                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="image_inner">
                                <div class="image box">
                                    <img src="{{ asset('images/product_image/'.$relatedProduct->image) }}">
                                </div>
                                <div class="image_content">
                                    <p>{{ $relatedProduct->title }}</p>
                                    <div class="price">
                                        <div>
                                            @if ($relatedProduct->discount_amount > 0)
                                                <span class="regular_price">TK {{ $relatedProduct->mrp - $relatedProduct->discount_amount }}</span>
                                                <strike class="old_price">TK {{ $relatedProduct->mrp }} </strike>
                                            @else
                                            <span class="regular_price">TK {{ $relatedProduct->mrp}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="btn_shop">
                                        <a href="@if($relatedProduct->slug){{ route('productDetails',$relatedProduct->slug) }}@else {{ route('productDetailsid',$relatedProduct->id) }}@endif">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Related Product end -->
@endsection
