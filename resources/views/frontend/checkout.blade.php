@extends('frontend.layouts.main')

@section('content')

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Checkout</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ route('client.home') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Checkout</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec checkout page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="checkout-success col-lg-12 col-md-12">

            </div>
            <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                <!-- checkout content Start -->
                <div class="ec-checkout-content">
                    <div class="ec-checkout-inner">

                        <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                            <div class="ec-checkout-block ec-check-bill">
                                <h3 class="ec-checkout-title">Billing Details</h3>
                                <div class="ec-bl-block-content">
                                    <div class="ec-check-bill-form">
                                        <form action="" method="">
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>FUll name <span class="text-danger">*</span></label>
                                                <input type="text" id="name" value="{{ Auth::user()->name }}"
                                                    placeholder="Enter your first name" required readonly />
                                            </span>
                                            <span class="ec-bill-wrap ec-bill-half">
                                                <label>Phone<span class="text-danger">*</span></label>
                                                <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}"
                                                    placeholder="Enter your last name" required readonly />
                                            </span>
                                            <span class="ec-bill-wrap">
                                                <label>District <span class="text-danger">*</span></label>
                                                <span class="ec-bl-select-inner">
                                                    <select name="district" id="district"
                                                        class="ec-bill-select" required>
                                                        <option>--Select District--</option>
                                            @if(Auth::user()->district)
                                                <option selected>{{ Auth::user()->district }}</option>
                                            @endif
                                            <option>Bagerhat</option>
                                            <option>Bandarban</option>
                                            <option>Barguna</option>
                                            <option>Barisal</option>
                                            <option>Bhola</option>
                                            <option>Bogura</option>
                                            <option>Brahmanbaria</option>
                                            <option>Chandpur</option>
                                            <option>Chapainawabganj</option>
                                            <option>Chattogram</option>
                                            <option>Chuadanga</option>
                                            <option>Comilla</option>
                                            <option>Coxsbazar</option>
                                            <option>Dhaka</option>
                                            <option>Dinajpur</option>
                                            <option>Faridpur</option>
                                            <option>Feni</option>
                                            <option>Gaibandha</option>
                                            <option>Gazipur</option>
                                            <option>Gopalganj</option>
                                            <option>Habiganj</option>
                                            <option>Jamalpur</option>
                                            <option>Jashore</option>
                                            <option>Jhalakathi</option>
                                            <option>Jhenaidah</option>
                                            <option>Joypurhat</option>
                                            <option>Khagrachhari</option>
                                            <option>Khulna</option>
                                            <option>Kishoreganj</option>
                                            <option>Kurigram</option>
                                            <option>Kushtia</option>
                                            <option>Lakshmipur</option>
                                            <option>Lalmonirhat</option>
                                            <option>Madaripur</option>
                                            <option>Magura</option>
                                            <option>Manikganj</option>
                                            <option>Meherpur</option>
                                            <option>Moulvibazar</option>
                                            <option>Munshiganj</option>
                                            <option>Mymensingh</option>
                                            <option>Naogaon</option>
                                            <option>Narail</option>
                                            <option>Narayanganj</option>
                                            <option>Narsingdi</option>
                                            <option>Natore</option>
                                            <option>Netrokona</option>
                                            <option>Nilphamari</option>
                                            <option>Noakhali</option>
                                            <option>Pabna</option>
                                            <option>Panchagarh</option>
                                            <option>Patuakhali</option>
                                            <option>Pirojpur</option>
                                            <option>Rajbari</option>
                                            <option>Rajshahi</option>
                                            <option>Rangamati</option>
                                            <option>Rangpur</option>
                                            <option>Satkhira</option>
                                            <option>Shariatpur</option>
                                            <option>Sherpur</option>
                                            <option>Sirajganj</option>
                                            <option>Sunamganj</option>
                                            <option>Sylhet</option>
                                            <option>Tangail</option>
                                            <option>Thakurgaon</option>
                                        </select>
                                                </span>
                                            </span>
                                            <span class="ec-bill-wrap">
                                                <label>Shipping full Address<span class="text-danger">*</span></label>
                                                <input type="text" name="address" id="address" placeholder="Enter Shipping address" value="{{ Auth::user()->address }}" />
                                            </span>
                                            <span class="ec-bill-wrap">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Enter Email Address" readonly/>
                                            </span>
                                            {{-- <span class="ec-bill-wrap">
                                                <label>Order Note<span class="text-danger">*</span></label>
                                                <input type="email" name="email" placeholder="Enter Email Address" />
                                            </span> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="ec-check-order-btn">
                            <button cus-url="{{ route('client.placeOrder') }}"  class="btn btn-primary orderPlaceBtn">Place Order</button>
                        </span>
                    </div>
                </div>
                <!--cart content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-checkout-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title ec_title_custom">
                            <h3 class="ec-sidebar-title">Product</h3>
                            <h3 class="ec-sidebar-title d-flex">Total</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <div class="ec-checkout-summary ec_custom_block_content checkout-page-view">
                                <div>
                                    <span class="text-left">Exclusive Men's Panjabi X 1</span>
                                    <span class="text-right">৳ 650.00</span>
                                </div>
                            </div>
                       </div>
                        <div class="ec-sb-block-content">
                            <div class="ec-checkout-summary">
                                <div>
                                    <span class="text-left">Sub-Total</span>
                                    <span class="text-right cart-total-price">৳ 650.00</span>
                                </div>
                                <div>
                                    <span class="text-left">Delivery Charges</span>
                                    <span class="text-right shipping-total">৳ 120.00</span>
                                </div>
                                <div class="ec-checkout-summary-total">
                                    <span class="text-left">Total Amount</span>
                                    <span class="text-right payable-total">৳ 750.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
                <div class="ec-sidebar-wrap ec-checkout-pay-wrap">
                    <!-- Sidebar Payment Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Payment Method</h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <div class="ec-checkout-pay">
                                {{-- <form action="#"> --}}
                                    <span class="ec-pay-option">
                                        <span>
                                            <span>Cash On Delivery</span>
                                            <input type="hidden" value="cod" name="paymentMethod">
                                        </span>
                                    </span>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Payment Block -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    {{-- <script>
        $(function (){
            let district = document.getElementById("district");
            let selectedIndex = district.selectedIndex;
            let selectedOptionText = district.options[selectedIndex].text;
            let shippingCharge = 0;
            let payableTotal = 0;
            if (selectedOptionText == 'Dhaka'){
                shippingCharge = 70;
            }else{
                shippingCharge = 120;
            }
            let totalPrice = localStorage.getItem('totalPrice');

            payableTotal = parseFloat(totalPrice) + parseFloat(shippingCharge);
            $('.shipping-total').html('Tk '+shippingCharge)
            $('.payable-total').html('Tk '+payableTotal)
            $('#amountTotal').attr('value', payableTotal);
            localStorage.setItem('shippingCharge',JSON.stringify(shippingCharge));
        });
    </script> --}}
    <script>
        $('select[name="district"]').on('change', function(){
            // console.log('d');
            let district = document.getElementById("district");
            let selectedIndex = district.selectedIndex;
            let selectedOptionText = district.options[selectedIndex].text;
            let shippingCharge = 0;
            let payableTotal = 0;
            if (selectedOptionText == 'Dhaka'){
                shippingCharge = 70;
            }else{
                shippingCharge = 120;
            }
            // console.log(selectedOptionText);
            let totalPrice = localStorage.getItem('totalPrice');
            payableTotal = parseFloat(totalPrice) + parseFloat(shippingCharge);
            $('.shipping-total').html('Tk '+shippingCharge)
            $('.payable-total').html('Tk '+payableTotal)
            $('#amountTotal').attr('value', payableTotal);
            localStorage.setItem('shippingCharge',JSON.stringify(shippingCharge));
        });
    </script>

@endsection
