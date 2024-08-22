@extends('backend.layout.main')

@section('content')

    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Customer</h1>
							<p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Customer</p>
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
													{{-- <th>Image</th> --}}
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Status</th>
													<th>Registration Date</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        {{-- <td><img class="tbl-thumb" src="{{ asset('images/profile/'.$customer->image) }}" alt="Product Image" /></td> --}}
                                                        <td>{{ $customer->name }}</td>
                                                        <td>{{ $customer->email }}</td>
                                                        <td>{{ $customer->phone }}</td>
                                                        <td>
                                                            @if($customer->status == 'Active')
                                                            <a class="updateCustomerStatus" id="product_type-{{ $customer->id }}"
                                                                product_type = "{{ $customer->id }}"
                                                                href="javascript:void(0)">
                                                                    <label class="badge badge-success" status="Active">Active</label>
                                                            </a>
                                                        @else
                                                            <a class="updateCustomerStatus" id="product_type-{{ $customer->id }}"
                                                                product_type = "{{ $customer->id }}"
                                                                href="javascript:void(0)">
                                                                    <label class="badge badge-danger" status="Inactive">Inactive</label>
                                                            </a>
                                                        @endif</td>
                                                        <td>{{ date('d M Y',strtotime($customer->created_at)) }}</td>
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
                                                                    <a class="dropdown-item" href="">History</a>
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
<script>

    $(document).ready(function (){
        $(document).on("click", ".updateCustomerStatus", function () {
            var status = $(this).children("label").attr("status");
            var product_type = $(this).attr("product_type");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "post",
                url: "{{ route('updateCustomerStatus') }}",
                data: { status: status, product_type: product_type },
                success: function (resp) {
                    if (resp["status"] == 'Inactive') {
                        $("#product_type-" + product_type).html(
                            "<label class='badge badge-danger' status='Inactive'>Inactive</label>"
                        );
                    } else if (resp["status"] == 'Active') {
                        $("#product_type-" + product_type).html(
                            "<label class='badge badge-success' status='Active'>Active</label>"
                        );
                    }
                },
                error: function () {
                    alert("Error");
                },
            });
        });
    })

</script>
@endsection
