@extends('frontend.layouts.main')

@section('content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">User Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User profile section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap ec-border-box">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a  class="tablinks active" href="#dashboard" onclick="opensec(event, 'dashboard')">User Profile</a></li>
                                        <li><a  class="tablinks" href="#order_history" onclick="opensec(event, 'order_history')">Orders</a></li>
                                        <li><a class="tablinks" href="#address" onclick="opensec(event, 'address')">Address</a></li>
                                        {{-- <li><a class="tablinks" href="#account_details" onclick="opensec(event, 'account_details')">Account Details</a></li> --}}
                                        <li><a class="tablinks" href="{{ route('user.logout') }}"  onclick="opensec(event, 'logout')">logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row tabcontent" id="dashboard">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <p>Hello <span>{{ Auth::user()->name }}</span></p>
                                            <p>From your account you can easily view and track orders. You can manage and change your account information like address, contact information and history of orders.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row tabcontent" id="order_history">
                                <div class="col-md-12">
                                    <div class="ec-vendor-card-body">
                                        <div class="ec-vendor-card-table">
                                            <table class="table ec-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order ID</th>
                                                        {{-- <th scope="col">Image</th> --}}
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Shipping Charge</th>
                                                        <th scope="col">Status</th>
                                                        {{-- <th scope="col">Actions</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderlist as $order)
                                                        <tr>
                                                            <th scope="row"><span>#{{ $order->id }}</span></th>
                                                            {{-- <td><img class="prod-img" src="assets/images/product-image/1.jpg"
                                                                    alt="product image"></td> --}}
                                                            <td>@if ($order->orderItems)
                                                                    @foreach ($order->orderItems as $item)
                                                                        <span>{{ $item->product->title }}</span>
                                                                        @if ($item->variation->size)
                                                                            <span>Size:{{ $item->variation->size }}</span>
                                                                        @endif
                                                                        <span>price:{{ $item->price }}</span>
                                                                        <span>Qty:{{ $item->quantity }}</span>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td><span>{{ date('d M Y',strtotime($order->created_at)) }}</span></td>
                                                            <td><span>{{ $order->subtotal }}</span></td>
                                                            <td><span>{{ $order->shipping }}</span></td>
                                                            <td><span>{{ $order->status }}</span></td>
                                                            {{-- <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                        href="#">View</a></span></td> --}}
                                                        </tr>
                                                    @endforeach
                                                    {{-- <tr>
                                                        <th scope="row"><span>548</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/2.jpg"
                                                                alt="product image"></td>
                                                        <td><span>Sweat Pullover Hoodie</span></td>
                                                        <td><span>13 Aug 2016</span></td>
                                                        <td><span>$68</span></td>
                                                        <td><span>On Hold</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span>684</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/3.jpg"
                                                                alt="product image"></td>
                                                        <td><span>T-shirt for girl</span></td>
                                                        <td><span>20 Jul 2015</span></td>
                                                        <td><span>$360</span></td>
                                                        <td><span>On Hold</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span>987</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/4.jpg"
                                                                alt="product image"></td>
                                                        <td><span>Wool hat for men</span></td>
                                                        <td><span>05 Feb 2014</span></td>
                                                        <td><span>$584</span></td>
                                                        <td><span>On Hold</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span>225</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/5.jpg"
                                                                alt="product image"></td>
                                                        <td><span>Women leather purse</span></td>
                                                        <td><span>23 Jul 2013</span></td>
                                                        <td><span>$65</span></td>
                                                        <td><span>On Hold</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span>548</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/6.jpg"
                                                                alt="product image"></td>
                                                        <td><span>Doctor kit toy</span></td>
                                                        <td><span>28 Mar 2011</span></td>
                                                        <td><span>$68</span></td>
                                                        <td><span>Disabled</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><span>684</span></th>
                                                        <td><img class="prod-img" src="assets/images/product-image/7.jpg"
                                                                alt="product image"></td>
                                                        <td><span>Teddy bear for baby</span></td>
                                                        <td><span>16 Apr 2010</span></td>
                                                        <td><span>$360</span></td>
                                                        <td><span>On Hold</span></td>
                                                        <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                                    href="#">View</a></span></td>
                                                    </tr> --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row tabcontent" id="address">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="shipping">
                                                <h2> Shipping Address</h2>
                                                <h5><span class="ship_bold">Name:</span>{{ Auth::user()->name }}</h5>
                                                <h5><span class="ship_bold">Address:</span>{{ Auth::user()->address }}</h5>
                                                <h5><span class="ship_bold">Phone:</span>{{ Auth::user()->phone }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="row tabcontent" id="account_details">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="account_details">
                                                <h2>Account details</h2>
                                                <div class="ec-register-wrapper">
                                                    <div class="ec-register-container">
                                                        <div class="ec-register-form">
                                                            <form action="#" method="post">
                                                                <span class="ec-register-wrap ec-register-half">
                                                                    <label>Customer Name*</label>
                                                                    <input type="text" name="firstname" placeholder="Enter your first name" required />
                                                                </span>
                                                                <span class="ec-register-wrap ec-register-half">
                                                                    <label>Phone*</label>
                                                                    <input type="text" name="phonenumber" placeholder="Enter your phone number"
                                                                        required />
                                                                </span>
                                                                <span class="ec-register-wrap">
                                                                    <label>Shipping Address*</label>
                                                                    <input type="text" name="shipping_address" placeholder="Enter your phone number"
                                                                        required />
                                                                </span>
                                                                <span class="ec-register-wrap">
                                                                    <label>Email Address*</label>
                                                                    <input type="email" name="email" placeholder="Enter your email add..." required />
                                                                </span>

                                                                <span class="ec-register-wrap">
                                                                    <label class="password_change">Change Password</label>
                                                                    </span>

                                                                <span class="ec-register-wrap">
                                                                    <label>New password</label>
                                                                    <input type="password" name="address" placeholder="Address Line 1" />
                                                                </span>
                                                                <span class="ec-register-wrap">
                                                                    <label> Confirm password</label>
                                                                    <input type="password" name="address" placeholder="Address Line 1" />
                                                                </span>
                                                                <span class="ec-register-wrap ec-register-btn">
                                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                                </span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User profile section -->
@endsection
