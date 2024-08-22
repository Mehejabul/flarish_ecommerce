@extends('backend.layout.main')

@section('content')

    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2">
						<h1>Order Detail</h1>
						<p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Orders
						</p>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-odr-dtl card card-default">
								<div class="card-header card-header-border-bottom d-flex justify-content-between">
									<h2 class="ec-odr">Order Detail<br>
										<span class="small">Order ID: #{{ $order->id }}</span>
									</h2>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Customer:</strong></div><br>
												<div class="info-content">
													{{ $order->user->name }}<br>
													Email: {{ $order->user->email }}<br>
													Address: {{ $order->user->address }}<br>
													<abbr title="Phone">Phone:</abbr> {{ $order->user->phone }}
												</div>
											</address>
										</div>
										{{-- <div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Shipped To:</strong></div><br>
												<div class="info-content">
													Elaine Hernandez<br>
													P. Sherman 42,<br>
													Wallaby Way, Sidney<br>
													<abbr title="Phone">P:</abbr> (123) 345-6789
												</div>
											</address>
										</div> --}}
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Payment Method:</strong></div><br>
												<div class="info-content">
													COD (Cash On Delivery)<br>
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Order Date:</strong></div><br>
												<div class="info-content">
													{{ date('d M Y h:i A ',strtotime($order->created_at)) }}
												</div>
											</address>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h3 class="tbl-title">PRODUCT SUMMARY</h3>
											<div class="table-responsive">
												<table class="table table-striped o-tbl">
													<thead>
														<tr class="line">
															<td><strong>#</strong></td>
															<td class="text-center"><strong>IMAGE</strong></td>
															<td class="text-center"><strong>PRODUCT</strong></td>
															<td class="text-center"><strong>PRICE/UNIT</strong></td>
															<td class="text-right"><strong>QUANTITY</strong></td>
															<td class="text-right"><strong>SUBTOTAL</strong></td>
														</tr>
													</thead>
													<tbody>
                                                        @foreach ($orderItems as $key => $item)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td><img class="product-img"
                                                                        src="@if ($item->product->image)
                                                                            {{ asset('images/product_image/'.$item->product->image) }}
                                                                        @else
                                                                           {{ asset('backend') }}/assets/img/products/p1.jpg
                                                                        @endif" alt="" /></td>
                                                                <td><strong>{{ $item->product->title }}</strong><br>Code: {{ $item->product->code }}</td>
                                                                <td class="text-center">{{ $item->price }} Tk</td>
                                                                <td class="text-right">{{ $item->quantity }}</td>
                                                                <td class="text-right">{{ $item->price*$item->quantity }} Tk</td>
                                                            </tr>
                                                        @endforeach

                                                        <tr class="line"></tr>
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Sub Total</strong></td>
															<td class="text-right"><strong>{{ $order->subtotal }} Tk</strong></td>
														</tr>
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Shipping Charge</strong></td>
															<td class="text-right"><strong>{{ $order->shipping }} Tk</strong></td>
														</tr>
														<tr>
															<td colspan="4">
															</td>
															<td class="text-right"><strong>Total</strong></td>
															<td class="text-right"><strong>{{ $order->total }} Tk</strong></td>
														</tr>

														{{-- <tr>
															<td colspan="4">
															</td>
															<td class="text-right"><strong>Payment Status</strong></td>
															<td class="text-right"><strong>PAID</strong></td>
														</tr> --}}
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Tracking Detail -->
							{{-- <div class="card mt-4 trk-order">
								<div class="p-4 text-center text-white text-lg bg-dark rounded-top">
									<span class="text-uppercase">Tracking Order No - </span>
									<span class="text-medium">34VB5540K83</span>
								</div>
								<div
									class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped
											Via:</span> UPS Ground</div>
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
										Checking Quality</div>
									<div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected
											Date:</span> DEC 09, 2021</div>
								</div>
								<div class="card-body">
									<div
										class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-cart"></i></div>
											</div>
											<h4 class="step-title">Confirmed Order</h4>
										</div>
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-tumblr-reblog"></i></div>
											</div>
											<h4 class="step-title">Processing Order</h4>
										</div>
										<div class="step completed">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-gift"></i></div>
											</div>
											<h4 class="step-title">Product Dispatched</h4>
										</div>
										<div class="step">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-truck-delivery"></i></div>
											</div>
											<h4 class="step-title">On Delivery</h4>
										</div>
										<div class="step">
											<div class="step-icon-wrap">
												<div class="step-icon"><i class="mdi mdi-hail"></i></div>
											</div>
											<h4 class="step-title">Product Delivered</h4>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

@endsection

@section('js')
<!-- Common Javascript -->
<script src="{{ 'backend' }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="{{ 'backend' }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ 'backend' }}/assets/plugins/simplebar/simplebar.min.js"></script>
<script src="{{ 'backend' }}/assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="{{ 'backend' }}/assets/plugins/slick/slick.min.js"></script>

<!-- Option Switcher -->
<script src="{{ 'backend' }}/assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="{{ 'backend' }}/assets/js/ekka.js"></script>
@endsection
