@extends('backend.layout.main')

@section('content')

    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Order List</h1>
							<p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>{{ $title }}</p>
						</div>
						{{-- <div>
							<a href="{{ route('product.create') }}" class="btn btn-primary"> Add Porduct</a>
						</div> --}}
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table"
											style="width:100%">
											<thead>
												<tr>
													<th>Customer</th>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    @if($title == 'All Order List')
                                                    <th>Status</th>
                                                    @endif
                                                    <th>Product Cost</th>
                                                    <th>Shipping Cost</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($orderlist as $list)
                                                    <tr>
                                                        <td>{{ $list->user->name }}</td>
                                                        <td>{{ $list->id }}</td>
                                                        <td>{{ date('d M Y h:i A ', strtotime($list->created_at)) }}</td>
                                                        @if ($title == 'All Order List')
                                                            <td><span style="@if ($list->status == 'confirm')
                                                                color: blue;
                                                            @elseif($list->status == 'delivered')
                                                            color: green;
                                                            @elseif($list->status == 'shipping')
                                                            color: yellow;
                                                            @elseif($list->status == 'canceled')
                                                            color: red;
                                                            @elseif($list->status == 'ordered')
                                                            color: black;
                                                            @endif">{{ $list->status }}</span></td>
                                                        @endif

                                                        <td>{{ $list->subtotal }}</td>
                                                        <td>{{ $list->shipping }}</td>
                                                        <td>{{ $list->total }}</td>

                                                        <td>
                                                            <div class="btn-group mb-1">
                                                                <button type="button"
                                                                    class="btn btn-outline-success">Info</button>
                                                                <button type="button"
                                                                    class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false" data-display="static">
                                                                    <span class="sr-only">Info</span>
                                                                </button>

                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('orderItemlist',$list->id) }}">Details</a>
                                                                    <a class="dropdown-item" href="{{ route('orderStatusUpdate',$list->id) }}">Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

@endsection

@section('js')
<!-- Common Javascript -->
<script src="{{ asset('backend') }}/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/slick/slick.min.js"></script>

<!-- Datatables -->
<script src='{{ asset('backend') }}/assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='{{ asset('backend') }}/assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='{{ asset('backend') }}/assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<script src="{{ asset('backend') }}/assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="{{ asset('backend') }}/assets/js/ekka.js"></script>
@endsection
