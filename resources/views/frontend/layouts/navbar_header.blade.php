<header class="ec-header">
        <!--Ec Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="{{ $company->facebook }}"><i
                                            class="ecicon eci-facebook"></i></a></li>
                                {{-- <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                            class="ecicon eci-twitter"></i></a></li> --}}
                                <li class="list-inline-item"><a class="hdr-instagram" href="{{ $company->instagram }}"><i
                                            class="ecicon eci-instagram"></i></a></li>
                                {{-- <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                            class="ecicon eci-linkedin"></i></a></li> --}}
                                <li class="list-inline-item"><a class="hdr-instagram" href="{{ $company->youtube }}"><i
                                            class="ecicon eci-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Welcome to </span>Flarish
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top responsive Action -->
                    <div class="col d-lg-none ">
                        <div class="ec-header-bottons">
                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="fi-rr-user"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if (Auth::user())
                                    <li><a class="dropdown-item" href="{{ route('client.account') }}">My Account</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ route('register.website') }}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login.website') }}">Login</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('client.checkout') }}">Checkout</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                <span class="ec-header-count cart-count-lable cart-count">0</span>
                            </a>
                            <!-- Header Cart End -->
                            <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                                <i class="fi fi-rr-apps"></i>
                            </a>
                            <!-- Header menu Start -->
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <i class="fi fi-rr-menu-burger"></i>
                            </a>
                            <!-- Header menu End -->
                        </div>
                    </div>
                    <!-- Header Top responsive Action -->
                </div>
            </div>
        </div>
        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="{{ route('client.home') }}"><img src="@if ($company->logo)
                                    {{ asset('images/company/'.$company->logo) }}
                                    @else
                                    {{asset('frontend')}}/assets/images/loom&color/logo.jfif
                                    @endif"
                                        alt="Site Logo" /><img class="dark-logo"
                                        src="@if ($company->logo)
                                        {{ asset('images/company/'.$company->logo) }}
                                        @else
                                        {{asset('frontend')}}/assets/images/loom&color/logo.jfif
                                        @endif" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->
                        <!--Ec navbar start-->
                        <div class="align-self-center">
                            <div class="ec-main-menu">
                                <ul>
                                    <li><a href="{{ route('client.home') }}">Home</a></li>
                                    <li><a href="{{ route('client.shopPage') }}">shop</a></li>
                                    {{-- <li><a href="shop.html">Men</a></li>
                                    <li><a href="shop.html">Women</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <!--Ec navbar end-->
                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="{{ route('searchPage') }}"> @csrf
                                    <input class="form-control ec-search-bar" placeholder="Search products..."
                                        type="text" name="keyword">
                                    <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">

                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown"><i
                                            class="fi-rr-user"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if (Auth::user())
                                        <li><a class="dropdown-item" href="{{ route('client.account') }}">My Account</a></li>
                                        @else
                                        <li><a class="dropdown-item" href="{{ route('register.website') }}">Register</a></li>
                                        <li><a class="dropdown-item" href="{{ route('login.website') }}">Login</a></li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('client.checkout') }}">Checkout</a></li>
                                    </ul>
                                </div>
                                <!-- Header User End -->
                                <!-- Header Cart Start -->
                                <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><i class="fi-rr-shopping-bag"></i></div>
                                    <span class="ec-header-count cart-count-lable cart-count">0</span>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="{{ route('client.home') }}"><img src="@if ($company->logo)
                                {{ asset('images/company/'.$company->logo) }}
                                @else
                                {{asset('frontend')}}/assets/images/loom&color/logo.jfif
                                @endif"
                                    alt="Site Logo" /><img class="dark-logo"
                                    src="@if ($company->logo)
                                    {{ asset('images/company/'.$company->logo) }}
                                    @else
                                    {{asset('frontend')}}/assets/images/loom&color/logo.jfif
                                    @endif" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="{{ route('searchPage') }}"> @csrf
                                <input class="form-control ec-search-bar" placeholder="Search product by titles or tag"
                                    type="text" name="keyword">
                                <button class="submit" type="submit"><i class="fi-rr-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->
        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="{{ route('client.home') }}">Home</a></li>
                        <li><a href="{{ route('client.shopPage') }}">Shop</a></li>
                        {{-- <li><a href="index.html">Men</a></li>
                        <li><a href="index.html">Women</a></li> --}}
                    </ul>
                </div>
            </div>
            <!-- Social Start -->
            <div class="header-res-social">
                <div class="header-top-social">
                    <ul class="mb-0">
                        <li class="list-inline-item"><a class="hdr-facebook" href="{{ $company->facebook }}"><i
                                    class="ecicon eci-facebook"></i></a></li>
                        {{-- <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                    class="ecicon eci-twitter"></i></a></li> --}}
                        <li class="list-inline-item"><a class="hdr-instagram" href="{{ $company->instagram }}"><i
                                    class="ecicon eci-instagram"></i></a></li>
                        {{-- <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                    class="ecicon eci-linkedin"></i></a></li> --}}
                        <li class="list-inline-item"><a class="hdr-instagram" href="{{ $company->youtube }}"><i
                                    class="ecicon eci-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- Social End -->
        </div>
        </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>
    <!-- ekka Cart Start -->
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                {{-- <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{asset('frontend')}}/assets/images/product-image/6_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">T-shirt For Women</a>
                        <span class="cart-price"><span>$76.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li> --}}
                {{-- <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{asset('frontend')}}/assets/images/product-image/12_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Women Leather Shoes</a>
                        <span class="cart-price"><span>$64.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidekka_pro_img"><img
                            src="{{asset('frontend')}}/assets/images/product-image/3_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Girls Nylon Purse</a>
                        <span class="cart-price"><span>$59.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li> --}}
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        {{-- <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right cart-subtotal-price">0</td>
                        </tr> --}}
                        {{-- <tr>
                            <td class="text-left">VAT (20%) :</td>
                            <td class="text-right">$60.00</td>
                        </tr> --}}
                        <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right primary-color cart-total-price">0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="{{ route('client.cart') }}" class="btn btn-primary">View Cart</a>
                <a href="{{ route('client.checkout') }}" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- ekka Cart End -->
