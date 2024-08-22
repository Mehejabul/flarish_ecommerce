@extends('frontend.layouts.main')

@section('content')
<!-- Ec breadcrumb start -->
 <!-- Ec breadcrumb start -->
 <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Login</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Login</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec login page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Register</h2>
                    <h2 class="ec-title">Register</h2>
                    <!-- <p class="sub-title mb-3">Best place to buy and sell digital products</p> -->
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form action="{{ route('customer.register') }}" method="post"> @csrf
                         <span class="ec-login-wrap">
                             <label>Name*</label>
                             <input type="text" name="name" placeholder="Enter your email add..." required />
                         </span>
                            <span class="ec-login-wrap">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Enter your email add..." required />
                            </span>
                            <span class="ec-login-wrap">
                             <label>Phone*</label>
                             <input type="text" name="phone" placeholder="Enter your phone..." required />
                         </span>
                            <span class="ec-login-wrap">
                             <label>Address*</label>
                             <input type="text" name="address" placeholder="Enter your address..." required />
                         </span>
                            <span class="ec-login-wrap">
                                <label>Password*</label>
                                <input type="password" name="password" placeholder="Enter your password" required />
                            </span>
                            {{-- <span class="ec-login-wrap">
                             <label>Confirm Password*</label>
                             <input type="password" name="password" placeholder="Enter your password" required />
                         </span> --}}
                            <!-- <span class="ec-login-wrap ec-login-fp">
                                <label><a href="#">Forgot Password?</a></label>
                            </span> -->
                            <span class="ec-login-wrap ec-login-btn">
                                <!-- <button class="btn btn-primary" type="submit">Login</button> -->
                                <button type="submit" class="btn btn-secondary">Register</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
