	<!-- LEFT MAIN SIDEBAR -->
    <div class="ec-left-sidebar ec-bg-sidebar">
        <div id="sidebar" class="sidebar ec-sidebar-footer">

            <div class="ec-brand">
                <a href="{{ route('dashboard') }}" title="Flarish">
                    @if ($company->logo)
                        <img class="ec-brand-icon" src="{{ asset('images/company/'.$company->logo) }}" alt="" />
                    @else
                        <span class="ec-brand-name text-truncate">Flarish</span>
                    @endif
                </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="ec-navigation" data-simplebar>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <!-- Dashboard -->
                    <li class="active">
                        <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Vendors -->
                    {{-- <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">Vendors</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="vendor-card.html">
                                        <span class="nav-text">Vendor Grid</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="vendor-list.html">
                                        <span class="nav-text">Vendor List</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="vendor-profile.html">
                                        <span class="nav-text">Vendors Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    <!-- Users -->
                    {{-- <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="user-card.html">
                                        <span class="nav-text">User Grid</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="user-list.html">
                                        <span class="nav-text">User List</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="user-profile.html">
                                        <span class="nav-text">Users Profile</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </li> --}}

                    <!-- Catalogue -->
                    <li>
                        <a class="sidenav-item-link" href="{{ route('catalogue.index') }}">
                            <i class="mdi mdi-dns"></i>
                            <span class="nav-text">Catalogue</span>
                        </a>
                    </li>

                    <!-- Category -->
                    <li>
                        <a class="sidenav-item-link" href="{{ route('category.index') }}">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Category</span>
                        </a>
                    </li>
                    {{-- <li class="has-sub">

                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Categories</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="main-category.html">
                                        <span class="nav-text">Main Category</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="sub-category.html">
                                        <span class="nav-text">Sub Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}

                    <!-- Products -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-palette-advanced"></i>
                            <span class="nav-text">Products</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('product.create') }}">
                                        <span class="nav-text">Add Product</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('product.index') }}">
                                        <span class="nav-text">List Product</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('productVariation') }}">
                                        <span class="nav-text">Product Variation</span>
                                    </a>
                                </li>
                                {{-- <li class="">
                                    <a class="sidenav-item-link" href="product-grid.html">
                                        <span class="nav-text">Grid Product</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="">
                                    <a class="sidenav-item-link" href="product-detail.html">
                                        <span class="nav-text">Product Detail</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="{{ route('customer') }}">
                            <i class="mdi mdi-tag-faces"></i>
                            <span class="nav-text">Customer</span>
                        </a>
                    </li>
                    <!-- Orders -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-cart"></i>
                            <span class="nav-text">Orders</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList') }}">
                                        <span class="nav-text">All Order</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList','ordered') }}">
                                        <span class="nav-text">New Order</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList','confirm') }}">
                                        <span class="nav-text">Confirmed Order</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList','shipping') }}">
                                        <span class="nav-text">Shipping Order</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList','delivered') }}">
                                        <span class="nav-text">Delivered Order</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{ route('orderList','canceled') }}">
                                        <span class="nav-text">Canceled Order</span>
                                    </a>
                                </li>
                                {{-- <li class="">
                                    <a class="sidenav-item-link" href="order-history.html">
                                        <span class="nav-text">Order History</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="">
                                    <a class="sidenav-item-link" href="order-detail.html">
                                        <span class="nav-text">Order Detail</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="">
                                    <a class="sidenav-item-link" href="invoice.html">
                                        <span class="nav-text">Invoice</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <!-- Reviews -->

                    <li>
                        <a class="sidenav-item-link" href="{{ route('stock.index') }}">
                            <i class="mdi mdi-star-half"></i>
                            <span class="nav-text">Stock</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-login"></i>
                            <span class="nav-text">Basic Settings</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                <li class="">
                                    <a href="{{ route('setting.edit',1) }}">
                                        <span class="nav-text">Company Settings</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('banner.index') }}">
                                        <span class="nav-text">Banner</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('ad.index') }}">
                                        <span class="nav-text">Ad-zone</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('page.index') }}">
                                        <span class="nav-text">Pages</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Reviews -->
                    {{-- <li>
                        <a class="sidenav-item-link" href="review-list.html">
                            <i class="mdi mdi-star-half"></i>
                            <span class="nav-text">Reviews</span>
                        </a>
                    </li> --}}

                    <!-- Brands -->
                    {{-- <li>
                        <a class="sidenav-item-link" href="brand-list.html">
                            <i class="mdi mdi-tag-faces"></i>
                            <span class="nav-text">Brands</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Authentication -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-login"></i>
                            <span class="nav-text">Authentication</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                <li class="">
                                    <a href="sign-in.html">
                                        <span class="nav-text">Sign In</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="sign-up.html">
                                        <span class="nav-text">Sign Up</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Icons -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-diamond-stone"></i>
                            <span class="nav-text">Icons</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="icons" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="material-icon.html">
                                        <span class="nav-text">Material Icon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="font-awsome-icons.html">
                                        <span class="nav-text">Font Awsome Icon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="flag-icon.html">
                                        <span class="nav-text">Flag Icon</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Other Pages -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-image-filter-none"></i>
                            <span class="nav-text">Other Pages</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="otherpages" data-parent="#sidebar-menu">
                                <li class="has-sub">
                                    <a href="404.html">404 Page</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>

