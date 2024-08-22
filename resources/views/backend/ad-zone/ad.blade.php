@extends('backend.layout.main')
@section('category','active')

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                    <h1>Ad Zone</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Ad Zone</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <div class="d-flex">
                                    <span><h4> @if (!$ad)
                                    Add New
                               @else
                                    Edit
                               @endif Ad</h4></span> @if ($ad)
                                <span class="ml-6"><a href="{{ route('ad.index') }}" class="btn btn-primary"> + Create</a></span>
                                @endif
                                </div>


                                {{-- Validation check --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success: </strong>{{ Session::get('success') }}
                                            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button> --}}
                                    </div>
                                @endif

                                <form action="@if ($ad)
                                    {{ route('ad.update',$ad->id) }}
                                    @else
                                    {{ route('ad.store') }}
                                @endif" method="post" enctype="multipart/form-data">
                                    @csrf @if($ad)
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Image</label>
                                        <div class="col-12">
                                            <input type="file" name="image" onchange="loadFile(event)" class="form-control">
                                        </div>
                                    </div>
                                    <img id="output" src="@if ($ad)
                                        {{ asset('images/ad/'.$ad->image) }}
                                    @endif" alt="" width="300px" class="mb-2">

                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Ad Type</label>
                                        <div class="col-12">
                                            <select name="type" id="" class="form-control">
                                                {{-- <option value="long">Long Ad</option> --}}
                                                <option value="short_left">Short Left Ad</option>
                                                <option value="short_right">Short Right Ad</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">View Section</label>
                                        <div class="col-12">
                                            <select name="view_section" id="" class="form-control">
                                                <option value="bellow_slider">Bellow Slider</option>
                                                <option value="bellow_trending_categories">Bellow Trending Categories</option>
                                                <option value="bellow_product_type">Bellow Product Type</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary">@if (!$ad)
                                                Create
                                           @else
                                                Update
                                           @endif</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="ec-cat-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Thumb</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($ads)
                                            @foreach ($ads as $banner)
                                                <tr>
                                                    <td><img class="cat-thumb" src="{{ asset('images/ad/'.$banner->image) }}" alt="Ad Image" /></td>
                                                    <td>{{ $banner->type }}</td>
                                                    <td>
                                                        @if($banner->status == 'Active')
                                                        <a class="updateAdStatus" id="product_type-{{ $banner->id }}"
                                                            product_type = "{{ $banner->id }}"
                                                            href="javascript:void(0)">
                                                                <label class="badge badge-success" status="Active">Active</label>
                                                        </a>
                                                    @else
                                                        <a class="updateAdStatus" id="product_type-{{ $banner->id }}"
                                                            product_type = "{{ $banner->id }}"
                                                            href="javascript:void(0)">
                                                                <label class="badge badge-danger" status="Inactive">Inactive</label>
                                                        </a>
                                                    @endif</td>
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
                                                                <a class="dropdown-item" href="{{ route('ad.edit',$banner->id) }}">Edit</a>
                                                                {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
<script src="{{ asset('backend') }}/assets/plugins/tags-input/bootstrap-tagsinput.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/slick/slick.min.js"></script>

<!-- Data Tables -->
<script src='{{ asset('backend') }}/assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='{{ asset('backend') }}/assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='{{ asset('backend') }}/assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<script src="{{ asset('backend') }}/assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="{{ asset('backend') }}/assets/js/ekka.js"></script>
    <script>

        $(document).ready(function (){
            $(document).on("click", ".updateAdStatus", function () {
                var status = $(this).children("label").attr("status");
                var product_type = $(this).attr("product_type");

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "post",
                    url: "{{ route('updateAdStatus') }}",
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

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
