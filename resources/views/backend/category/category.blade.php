@extends('backend.layout.main')
@section('category','active')

@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                    <h1>Category</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Category</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <div class="d-flex">
                                    <span><h4> @if (!$category)
                                    Add New
                               @else
                                    Edit
                               @endif Category</h4></span> @if ($category)
                                <span class="ml-6"><a href="{{ route('category.index') }}" class="btn btn-primary"> + Create</a></span>
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

                                <form action="@if ($category)
                                    {{ route('category.update',$category->id) }}
                                    @else
                                    {{ route('category.store') }}
                                @endif" method="post" enctype="multipart/form-data">
                                    @csrf @if($category)
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <label for="name" class="col-12 col-form-label">Name</label>
                                        <div class="col-12">
                                            <input id="name" name="name" class="form-control here slug-title" type="text" @if (!$category)
                                                 value="{{ old('name') }}"
                                            @else
                                            value="{{ old('name',$category->name) }}"
                                            @endif>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="slug" class="col-12 col-form-label">Slug</label>
                                        <div class="col-12">
                                            <input id="slug" name="slug" class="form-control here set-slug" type="text"  @if (!$category)
                                            value="{{ old('slug') }}"
                                       @else
                                       value="{{ old('slug',$category->slug) }}"
                                       @endif>
                                            <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="catalogue_id" class="col-12 col-form-label">Catalogue</label>
                                        <div class="col-12">
                                            <select id="catalogue_id" name="catalogue_id" class="custom-select">
                                            <option value=""> --- Select Catalogue ---</option>
                                            @if ($catalogues)
                                                @foreach ($catalogues as $catalogue)
                                                    <option @if (!empty($category) && $category->catalogue_id == $catalogue->id)
                                                        selected
                                                    @endif value="{{ $catalogue->id }}">{{ $catalogue->name }}</option>
                                                @endforeach
                                            @endif
                                            {{-- <option value="new category">Jewellry</option>
                                            <option value="new category">Perfume</option>
                                            <option value="new category">Cosmatics</option>
                                            <option value="new category">Glasses</option>
                                            <option value="new category">Bags</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="appendCatagories">
                                        @include('backend.category.append_categories_level')
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Description</label>
                                        <div class="col-12">
                                            <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control">@if (!$category)
                                                {{ old('sortdescription') }}
                                           @else
                                           {{ old('sortdescription',$category->description) }}
                                           @endif</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Home Page View</label>
                                        <div class="col-12">
                                            <select name="homepage_view" id="" class="custom-select">
                                                <option @if (!empty($category) && $category->homepage_view == "no")
                                                    selected
                                                @endif value="no">No</option>
                                                <option @if (!empty($category) && $category->homepage_view == "yes")
                                                    selected
                                                @endif value="yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-form-label">Image</label>
                                        <div class="col-12">
                                            <input type="file" name="image" onchange="loadFile(event)" class="form-control">
                                        </div>
                                    </div>
                                    <img id="output" src="@if ($category)
                                        {{ asset('images/category/'.$category->image) }}
                                    @endif" alt="" width="300px" class="mb-2">


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
                                            <button name="submit" type="submit" class="btn btn-primary">@if (!$category)
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
                                            <th>Name</th>
                                            <th>Catalogue</th>
                                            <th>Sub Categories</th>
                                            <th>Homepage View</th>
                                            {{-- <th>Total Sell</th> --}}
                                            <th>Status</th>
                                            {{-- <th>Trending</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td><img class="cat-thumb" src="{{ asset('images/category/'.$category->image) }}" alt="Category Image" /></td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->catalogue->name }}</td>
                                                    <td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories">{{ count($category->subcategories) }}</span>
                                                        @foreach ($category->subcategories as $subcategory)
														<span class="ec-sub-cat-tag"><a href="{{ route('category.edit',$subcategory->id) }}">{{ $subcategory->name }}</a></span>
                                                        @endforeach
														</span>
													</td>
                                                    <td>{{ $category->homepage_view }}</td>
                                                    <td>
                                                        @if($category->status == 'Active')
                                                        <a class="updateCategoryStatus" id="product_type-{{ $category->id }}"
                                                            product_type = "{{ $category->id }}"
                                                            href="javascript:void(0)">
                                                                <label class="badge badge-success" status="Active">Active</label>
                                                        </a>
                                                    @else
                                                        <a class="updateCategoryStatus" id="product_type-{{ $category->id }}"
                                                            product_type = "{{ $category->id }}"
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
                                                                <a class="dropdown-item" href="{{ route('category.edit',$category->id) }}">Edit</a>
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
            $(document).on("click", ".updateCategoryStatus", function () {
                var status = $(this).children("label").attr("status");
                var product_type = $(this).attr("product_type");

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    type: "post",
                    url: "{{ route('updateCategoryStatus') }}",
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
        $(document).ready(function() {
            $("#catalogue_id").change(function() {
                var catalogue_id = $(this).val();
                //alert(catalogue_id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "get",
                    url: "{{ route('appendCategory') }}",
                    data: {
                        catalogue_id: catalogue_id
                    },
                    success: function(resp) {
                        //alert("done");
                        //console.log(resp);
                        $("#appendCatagories").html(resp);
                    },
                    error: function() {
                        alert("error");
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
