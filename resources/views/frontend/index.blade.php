@extends("frontend.layouts.main")


@section('content')


@if ($banners)
    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="ec-slide-item swiper-slide d-flex ec-slide-1"
                        style="background-image: url({{asset('images/banner/'.$banner->image)}}); ">
                    </div>
                @endforeach
                {{-- <div class="ec-slide-item swiper-slide d-flex ec-slide-1"
                    style="background-image: url({{asset('frontend')}}/assets/images/custom-image/banner_image.jpg);">
                </div> --}}
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->
@endif

    <!-- top banner start -->
    <div class="top_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top_banner_wraper">
                        <p>New Arrival</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top  banner end -->
@if ($newArrivalProducts)
    <!-- New Arrival section Start -->
    <section class="section ec-category-section ec-category-wrapper-4 section-space-p">
        <div class="container">
        <div class="product_slide">
            <div class="row cat-space-3 margin-minus-tb-15">
                @foreach ($newArrivalProducts as $product)
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="cat-card">
                            <div class="card-img">
                                <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                                <img class="cat-icont" src="{{asset('images/product_image/'.$product->image)}}" alt="cat-icon">
                            </a>
                            </div>
                            <div class="new_arrival_price">
                                <p>
                                    @if ($product->discount_amount > 0)
                                        <span class="regular_price">TK {{ $product->mrp - $product->discount_amount }}</span>
                                        <strike class="old_price">TK {{ $product->mrp }} </strike>
                                    @else
                                    <span class="regular_price">TK {{ $product->mrp}}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
             
                {{-- <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card">
                        <div class="card-img">
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icon" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img10.jpg" alt="cat-icon">
                        </a>
                        </div>
                        <div class="new_arrival_price">
                            <p>
                            <span class="regular_price">TK 1500</span>
                            <strike class="old_price">TK 2000 </strike>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card">
                        <div class="card-img">
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icon" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img12.jpg" alt="cat-icon">
                        </a>
                        </div>
                        <div class="new_arrival_price">
                            <p>
                            <span class="regular_price">TK 1500</span>
                            <strike class="old_price">TK 2000 </strike>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card">
                        <div class="card-img">
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icon" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img21.jpg" alt="cat-icon">
                        </a>
                        </div>
                        <div class="new_arrival_price">
                            <p>
                            <span class="regular_price">TK 1500</span>
                            <strike class="old_price">TK 2000 </strike>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card">
                        <div class="card-img">
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icon" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img14.jpg" alt="cat-icon">
                        </a>
                        </div>
                        <div class="new_arrival_price">
                            <p>
                            <span class="regular_price">TK 1500</span>
                            <strike class="old_price">TK 2000 </strike>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="cat-card">
                        <div class="card-img">
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icon" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img16.jpg" alt="cat-icon">
                        </a>
                        </div>
                        <div class="new_arrival_price">
                            <p>
                            <span class="regular_price">TK 1500</span>
                            <strike class="old_price">TK 2000 </strike>
                            </p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- New Arrival section End -->
@endif

    <!-- Men_category_section start -->
    {{-- <section class="product_category">
        <div class="container">
            <div class="heading_category">
                <h2>Men</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="left_side">
                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket1.jpg" class="img-fluid w-100">

                        <div class="hero_link">
                            Mens Full sleve T-shirt
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sub_category_image">
                                <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket2.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket3.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket4.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket5.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="view_more">
                                    <div class="sub_category_viewmore_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                        class="img-fluid w-100">
                                    </div>
                                    <a href="#">
                                    <div class="hero_view_link">View More</div>
                                </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Men_category_section end -->

    <!-- Ads banner section start -->
    @if ($ads)
        <section class="ads_banner">
        <div class="container">
                <div class="row">
                    @foreach ($ads as $ad)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            @if ($ad->type=='short_left')
                                <div class="left_ads">
                                    <img src="{{asset('images/ad/'.$ad->image)}}" class="img-fluid w-100">
                                </div>
                            @elseif ($ad->type=='short_right')
                                <div class="right_ads">
                                    <img src="{{asset('images/ad/'.$ad->image)}}" class="img-fluid w-100">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Ads banner section end -->
@if ($categories)
    <!-- slide category section start -->
    <section class="section ec-category-section ec-category-wrapper-4 section-space-p">
        <div class="container">
            <div class="row cat-space-3 margin-minus-tb-15">
                @foreach ($categories as $category)
                    <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="card">
                            <div class="cardimg">
                                <div class="card_category_name">
                                    <p>{{ $category->name }}</p>
                                </div>
                                <a href="{{ route('client.shopPage',$category->slug) }}">
                                    {{-- shope page --}}
                                <img class="cat-icont" src="{{asset('images/category/'.$category->image)}}" alt="cat-icon">
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="cardimg">
                            <div class="card_category_name">
                                <p>T-Shirt</p>
                            </div>
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icont" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img10.jpg" alt="cat-icon">
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="cardimg">
                            <div class="card_category_name">
                                <p>Jersy</p>
                            </div>
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icont" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img11.jpg" alt="cat-icon">
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="cardimg">
                            <div class="card_category_name">
                                <p>Hoodie</p>
                            </div>
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icont" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img12.jpg" alt="cat-icon">
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="cardimg">
                            <div class="card_category_name">
                                <p>jersy pant</p>
                            </div>
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icont" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img14.jpg" alt="cat-icon">
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="cardimg">
                            <div class="card_category_name">
                                <p>Full-pant</p>
                            </div>
                            <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">
                            <img class="cat-icont" src="{{asset('frontend')}}/assets/images/custom_category-image/cat_img16.jpg" alt="cat-icon">
                        </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- slide category section end -->
@endif

@if ($productCategories)
    <!-- Men_category_section start -->
    @foreach ($productCategories as $category)
        <section class="product_category">
            <div class="container">
                <div class="heading_category">
                    <h2>{{ $category->name }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="left_side">
                            <img src="{{asset('images/category/'.$category->image)}}" class="img-fluid w-100">

                            {{-- <div class="hero_link">
                                Mens Full sleve T-shirt
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sub_category_image">
                                    <div class="row">
                                        {{-- @dd(App\Models\Product::where('status','Active')->where('category_id',$category->id)->orderBy('id','DESC')->take(8)->get()) --}}
                                        @foreach (App\Models\Product::where('category_id',$category->id)->where('status','Active')->orderBy('id','DESC')->take(8)->get() as $key => $product)
                                            @if (count(App\Models\Product::where('category_id',$category->id)->where('status','Active')->orderBy('id','DESC')->take(8)->get()) == $key+1)
                                            {{-- @dd(count(App\Models\Product::where('category_id',$category->id)->where('status','Active')->orderBy('id','DESC')->take(8)->get())) --}}
                                                <div class="col-lg-3">
                                                    <div class="view_more">
                                                    <div class="sub_category_viewmore_image">
                                                        <a href=""><img src="{{asset('images/product_image/'.$product->image)}}"
                                                        class="img-fluid w-100"></a>
                                                    </div>
                                                    <a href="@if ($category->slug)
                                                        {{ route('client.shopPage',$category->slug) }}
                                                        @else
                                                        {{ route('client.shopPageid',$category->id) }}

                                                    @endif">
                                                        <div class="hero_view_link">View More</div>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col-lg-3">
                                                    <div class="sub_category_common_image">
                                                        <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif"><img src="{{asset('images/product_image/'.$product->image)}}"
                                                            class="img-fluid w-100">
                                                        </a>
                                                            <div class="product_price">
                                                                <div>
                                                                    @if ($product->discount_amount > 0)
                                                                        <span class="regular_price">TK {{ $product->mrp - $product->discount_amount }}</span>
                                                                        <strike class="old_price">TK {{ $product->mrp }} </strike>
                                                                    @else
                                                                        <span class="regular_price">TK {{ $product->mrp}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    {{-- <div class="col-lg-3">
                                        <div class="sub_category_common_image">
                                            <img src="{{asset('frontend')}}/assets/images/custom-image/jacket3.jpg"
                                                class="img-fluid w-100">
                                                <div class="product_price">
                                                    <div>
                                                        <strong>৳ 1250.00</strong>
                                                        <strike>$ 2500.00</strike>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="sub_category_common_image">
                                            <img src="{{asset('frontend')}}/assets/images/custom-image/jacket4.jpg"
                                                class="img-fluid w-100">
                                                <div class="product_price">
                                                    <div>
                                                        <strong>৳ 1250.00</strong>
                                                        <strike>$ 2500.00</strike>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="sub_category_common_image">
                                            <img src="{{asset('frontend')}}/assets/images/custom-image/jacket5.jpg"
                                                class="img-fluid w-100">
                                                <div class="product_price">
                                                    <div>
                                                        <strong>৳ 1250.00</strong>
                                                        <strike>$ 2500.00</strike>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="sub_category_common_image">
                                            <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                                class="img-fluid w-100">
                                                <div class="product_price">
                                                    <div>
                                                        <strong>৳ 1250.00</strong>
                                                        <strike>$ 2500.00</strike>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!--Men_category_section end -->
@endif

     <!-- Men_category_section start -->
     {{-- <section class="product_category">
        <div class="container">
            <div class="heading_category">
                <h2>Men</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="left_side">
                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket1.jpg" class="img-fluid w-100">

                        <div class="hero_link">
                            Mens Full sleve T-shirt
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sub_category_image">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket2.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket3.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket4.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket5.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="view_more">
                                    <div class="sub_category_viewmore_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                        class="img-fluid w-100">
                                    </div>
                                    <a href="#">
                                    <div class="hero_view_link">View More</div>
                                </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Men_category_section end -->

     <!-- Men_category_section start -->
     {{-- <section class="product_category">
        <div class="container">
            <div class="heading_category">
                <h2>Men</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="left_side">
                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket1.jpg" class="img-fluid w-100">

                        <div class="hero_link">
                            Mens Full sleve T-shirt
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sub_category_image">
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket2.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket3.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket4.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket5.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="sub_category_common_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                            class="img-fluid w-100">
                                            <div class="product_price">
                                                <div>
                                                    <strong>৳ 1250.00</strong>
                                                    <strike>$ 2500.00</strike>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="view_more">
                                    <div class="sub_category_viewmore_image">
                                        <img src="{{asset('frontend')}}/assets/images/custom-image/jacket6.jpg"
                                        class="img-fluid w-100">
                                    </div>
                                    <a href="#">
                                    <div class="hero_view_link">View More</div>
                                </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--Men_category_section end -->

@endsection
