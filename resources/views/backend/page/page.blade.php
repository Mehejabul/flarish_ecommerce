@extends('backend.layout.main')
@section('page','active')

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                    <h1>Page</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Page</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <div class="d-flex">
                                    <span><h4> @if (!$page)
                                    Add New
                               @else
                                    Edit
                               @endif Page</h4></span> @if ($page)
                                <span class="ml-6"><a href="{{ route('page.index') }}" class="btn btn-primary"> + Create</a></span>
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

                                <form action="@if ($page)
                                    {{ route('page.update',$page->id) }}
                                    @else
                                    {{ route('page.store') }}
                                @endif" method="post" enctype="multipart/form-data">
                                    @csrf @if($page)
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <label for="title" class="col-12 col-form-label">Title</label>
                                        <div class="col-12">
                                            <input id="title" name="title" class="form-control here slug-title" type="text" @if (!$page)
                                                 value="{{ old('title') }}"
                                            @else
                                            value="{{ old('title',$page->title) }}"
                                            @endif required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="content" class="col-12 col-form-label">Content</label>
                                        <div class="col-12">
                                            {{-- <input id="content" name="content" class="form-control here slug-content" type="text" @if (!$page)
                                                 value="{{ old('content') }}"
                                            @else
                                            value="{{ old('content',$page->content) }}"
                                            @endif required> --}}
                                            <textarea name="content" id="content" cols="30" rows="10">@if (!$page)
                                                {{ old('content') }}
                                           @else
                                                {{ old('content',$page->content) }}
                                            @endif</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary">@if (!$page)
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
                                            <th>Title</th>
                                            {{-- <th>Slug</th> --}}
                                            {{-- <th>Product</th> --}}
                                            {{-- <th>Total Sell</th> --}}
                                            <th>Status</th>
                                            {{-- <th>Trending</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($pages)
                                            @foreach ($pages as $page)
                                                <tr>
                                                    {{-- <td><img class="cat-thumb" src="assets/img/category/clothes.png" alt="Product Image" /></td> --}}
                                                    <td>{{ $page->title }}</td>
                                                    {{-- <td>{{ $page->slug }}</td> --}}
                                                    <td>
                                                        @if($page->status == 'Active')
                                                        <a class="updatePageStatus" id="product_type-{{ $page->id }}"
                                                            product_type = "{{ $page->id }}"
                                                            href="javascript:void(0)">
                                                                <label class="badge badge-success" status="Active">Active</label>
                                                        </a>
                                                    @else
                                                        <a class="updatePageStatus" id="product_type-{{ $page->id }}"
                                                            product_type = "{{ $page->id }}"
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
                                                                <a class="dropdown-item" href="{{ route('page.edit',$page->id) }}">Edit</a>
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
            $("#title").focus();
        });
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
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
            $(document).on("click", ".updatePageStatus", function () {
                var status = $(this).children("label").attr("status");
                var product_type = $(this).attr("product_type");

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "post",
                    url: "{{ route('updatePageStatus') }}",
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
