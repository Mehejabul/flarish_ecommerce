@extends('backend.layout.main')

@section('content')

    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Product Variation Stock</h1>
							<p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i><span><span><a href="{{ route('stock.index') }}">Stock</a></span><i class="mdi mdi-chevron-right"></i></span>Product Variation Stock</p>
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
													<th>Product</th>
													<th>Name</th>
													<th>Size</th>
													<th>Available Stock</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($variants as $variation)
                                                    <tr>
                                                        <td><img class="tbl-thumb" src="{{ asset('images/product_image/'.$variation->product->image) }}" alt="Product Image" /></td>
                                                        <td><a href="">{{ $variation->product->title }}</a> <br> <span class="productNameColor">Code: </span>{{ $variation->product->code }}<br><span class="productNameColor">Color:</span>{{ $variation->product->color }}</td>
                                                        <td>{{ $variation->productvariation->size }}</td>
                                                        <td>{{ $variation->quantity }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-outline-success">Info</button>
                                                                <button type="button"
                                                                    class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false" data-display="static">
                                                                    <span class="sr-only">Info</span>
                                                                </button>

                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="{{ route('updateStockVariation',$variation->id) }}">Edit</a>
                                                                    {{-- <a class="dropdown-item" href="#">Delete</a> --}}
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
