@extends("frontend.layouts.main")
@section('css')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/plugins/nouislider.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/demo1.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custom.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('frontend') }}/assets/css/backgrounds/bg-4.css">
@endsection

@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Shop</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Shop page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid"><i class="fi-rr-apps"></i></button>
                                <!-- <button class="btn btn-list active"><i class="fi-rr-list"></i></button> -->
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                        </div>
                    </div>
                    <!-- Shop Top End -->
                    @if ($products)
                        <!-- Shop content Start -->
                        <div class="shop-pro-content">
                            <div class="shop-pro-inner list-view">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="image_inner">
                                                <div class="image box">
                                                    <img src="{{ asset('images/product_image/'.$product->image) }}">
                                                </div>
                                                <div class="image_content">
                                                    <p>{{ $product->title }}</p>
                                                    <div class="price">
                                                        <div>
                                                            @if ($product->discount_amount > 0)
                                                                <span class="regular_price">TK {{ $product->mrp - $product->discount_amount }}</span>
                                                                <strike class="old_price">TK {{ $product->mrp }} </strike>
                                                            @else
                                                            <span class="regular_price">TK {{ $product->mrp}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="btn_shop">
                                                        <a href="@if($product->slug){{ route('productDetails',$product->slug) }}@else {{ route('productDetailsid',$product->id) }}@endif">Buy now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                            </div>
                            <!-- Ec Pagination Start -->
                            <div class="ec-pro-pagination">
                                <span>{{($products->currentpage()-1)*$products->perpage()+1}} to {{$products->currentpage()*$products->perpage()}}
                                    of  {{$products->total()}} entries</span>
                                <ul class="ec-pro-pagination-inner">
                                    {{ $products->links() }}
                                </ul>
                            </div>
                            <!-- Ec Pagination End -->
                        </div>
                        <!--Shop content End -->
                    @endif
                </div>
             </div>
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div id="shop_sidebar">
                        <div class="ec-sidebar-heading">
                            <h1>Filter Products By</h1>
                        </div>
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Category Block -->
                            <form action="{{ route('filter') }}" method="get" >
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Product Categories</h3>
                                    </div>
                                    <div class="ec-sb-block-content">
                                        <ul>
                                            {{-- @foreach (App\Models\Category::where('status','Active')->where('parent_id','!=','0')->get()->all() as $key => $category) --}}
                                            @foreach (App\Models\Category::where('status','Active')->get()->all() as $key => $category)
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" class="checked" name="category[]" value="{{ $category->id }}" @if (in_array($category->id, $categories))
                                                    checked
                                                    @endif onclick=this.form.submit() /><span style="margin-left: 2em;">{{ $category->name }}</span>
                                                    {{-- <span
                                                        class="checked"></span> --}}
                                                </div>
                                            </li>
                                            @endforeach
                                            {{-- <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                                <ul>
                                                    <li>
                                                        <div class="ec-sidebar-block-item">
                                                            <input type="checkbox" /> <a href="#">Watch</a><span
                                                                class="checked"></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ec-sidebar-block-item">
                                                            <input type="checkbox" /> <a href="#">Cap</a><span
                                                                class="checked"></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li> --}}
                                            {{-- <li>
                                                <div class="ec-sidebar-block-item ec-more-toggle">
                                                    <span class="checked"></span><span id="ec-more-toggle">More
                                                        Categories</span>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="ec-sidebar-block">
                                    <div class="ec-sb-title">
                                        <h3 class="ec-sidebar-title">Price</h3>
                                    </div>
                                    <div class="ec-sb-block-content es-price-slider">
                                        <div class="ec-price-filter">
                                            <div id="ec-sliderPrice" class="filter__slider-price" data-min="0"
                                                data-max="10000" data-step="1"></div>
                                            <div class="ec-price-input">
                                                <label class="">Tk <input type="number" name="start" @if ($start)
                                                    value="{{ $start }}"
                                                       @endif id="start"
                                                        class="filter__input"></label>
                                                <span class="ec-price-divider"></span>
                                                <label class="">Tk <input type="number" name="end" @if ($end)
                                                    value="{{ $end }}"
                                                       @endif id="end"
                                                        class="filter__input"></label>
                                            </div>
                                            <button type="submit" class="btn btn-primary text-white">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <aside class="sidebar_widget">
                    <div class="widget_list widget_filter">
                        <form action="{{ route('filter') }}" method="get" >
                            <h3>Product categories</h3>
                            <div id="menu" class="text-start ">
                                <ul class="offcanvas_main_menu">
                                    @foreach (App\Models\Category::orderBy('name','ASC')->get() as $category)
                                        <li class="menu-item-has-children" style="font-size: 14px">
                                            <input type="checkbox" class="checkbox" name="category[]" value="{{ $category->id }}" @if (in_array($category->id, $categories))
                                                checked
                                                   @endif onclick=this.form.submit()> {{ $category->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <h3>Filter by price</h3>

                            <div id="slider-range"></div>
                            <button type="submit">Filter</button>
                            <input type="text" name="text" id="amount" />
                            <input type="hidden" name="start" @if ($start)
                                value="{{ $start }}"
                                   @endif id="start" />
                            <input type="hidden" name="end" @if ($end)
                                value="{{ $end }}"
                                   @endif id="end" />
                        </form>
                    </div>
                </aside> --}}
            </div>
        </div>
    </section>
    <!-- End Shop page -->
@endsection
@section('js')
<script src="{{ asset('frontend') }}/assets/js/plugins/nouislider.js"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="{{ asset('frontend') }}/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/countdownTimer.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/scrollup.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/infiniteslidev2.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Google translate Js -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="{{ asset('frontend') }}/assets/js/vendor/index.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
@endsection
