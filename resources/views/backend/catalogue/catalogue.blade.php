@extends('backend.layout.main')
@section('catalogue','active')

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                    <h1>Catalogue</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Catalogue</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <div class="d-flex">
                                    <span><h4> @if (!$catalogue)
                                    Add New
                               @else
                                    Edit
                               @endif Catalogue</h4></span> @if ($catalogue)
                                <span class="ml-6"><a href="{{ route('catalogue.index') }}" class="btn btn-primary"> + Create</a></span>
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

                                <form action="@if ($catalogue)
                                    {{ route('catalogue.update',$catalogue->id) }}
                                    @else
                                    {{ route('catalogue.store') }}
                                @endif" method="post" enctype="multipart/form-data">
                                    @csrf @if($catalogue)
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label">Name</label>
                                        <div class="col-12">
                                            <input id="name" name="name" class="form-control here slug-title" type="text" @if (!$catalogue)
                                                 value="{{ old('name') }}"
                                            @else
                                            value="{{ old('name',$catalogue->name) }}"
                                            @endif>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="slug" class="col-12 col-form-label">Slug</label>
                                        <div class="col-12">
                                            <input id="slug" name="slug" class="form-control here set-slug" type="text"  @if (!$catalogue)
                                            value="{{ old('slug') }}"
                                       @else
                                       value="{{ old('slug',$catalogue->slug) }}"
                                       @endif>
                                            <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">Sort Description</label>
                                        <div class="col-12">
                                            <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">Full Description</label>
                                        <div class="col-12">
                                            <textarea id="fulldescription" name="fulldescription" cols="40" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">Product Tags <span>( Type and
                                                make comma to separate tags )</span></label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="group_tag" name="group_tag" value="" placeholder="" data-role="tagsinput">
                                        </div>
                                    </div> --}}

                                    <div class="row">
                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary">@if (!$catalogue)
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
                                            {{-- <th>Thumb</th> --}}
                                            <th>Name</th>
                                            <th>Slug</th>
                                            {{-- <th>Product</th> --}}
                                            {{-- <th>Total Sell</th> --}}
                                            <th>Status</th>
                                            {{-- <th>Trending</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($catalogues)
                                            @foreach ($catalogues as $catalogue)
                                                <tr>
                                                    {{-- <td><img class="cat-thumb" src="assets/img/category/clothes.png" alt="Product Image" /></td> --}}
                                                    <td>{{ $catalogue->name }}</td>
                                                    <td>{{ $catalogue->slug }}</td>
                                                    <td>
                                                        @if($catalogue->status == 'Active')
                                                        <a class="updateCatalogueStatus" id="product_type-{{ $catalogue->id }}"
                                                            product_type = "{{ $catalogue->id }}"
                                                            href="javascript:void(0)">
                                                                <label class="badge badge-success" status="Active">Active</label>
                                                        </a>
                                                    @else
                                                        <a class="updateCatalogueStatus" id="product_type-{{ $catalogue->id }}"
                                                            product_type = "{{ $catalogue->id }}"
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
                                                                <a class="dropdown-item" href="{{ route('catalogue.edit',$catalogue->id) }}">Edit</a>
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
    $(function () {
        $("#name").focus();
    });
</script>
<script>
    $('#name').on("keyup change", function (e) {
        var name = $(this).val();
        if (name) {
            var name = $('#name').val();
            $slugGen = name.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            $('#slug').attr('value', $slugGen);
        }
    })
</script>
    <script>

        $(document).ready(function (){
            $(document).on("click", ".updateCatalogueStatus", function () {
                var status = $(this).children("label").attr("status");
                var product_type = $(this).attr("product_type");

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "post",
                    url: "{{ route('updateCatalogueStatus') }}",
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
