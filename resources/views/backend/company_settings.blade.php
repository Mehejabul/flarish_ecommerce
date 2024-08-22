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
                <div class="col-xl-8 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <div class="d-flex">
                                    <span><h4>
                                    Update Company Details</h4></span>
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
                                    </div>
                                @endif

                                <form action="{{ route('setting.update',$details->id) }}" method="post" enctype="multipart/form-data"> @csrf
                                        @method('put')


                                        <div class="form-group row">
                                            <label class="col-12 col-form-label">Logo</label>
                                            <div class="col-12">
                                                <input type="file" name="logo" onchange="loadLogo(event)" class="form-control">
                                            </div>
                                        </div>
                                        <img id="logoOutput" src="@if ($details)
                                            {{ asset('images/company/'.$details->logo) }}
                                        @endif" alt="" width="300px" class="mb-2">
                                        <div class="form-group row">
                                            <label class="col-12 col-form-label">Favicon</label>
                                            <div class="col-12">
                                                <input type="file" name="favicon" onchange="loadFavicon(event)" class="form-control">
                                            </div>
                                        </div>
                                        <img id="faviconOutput" src="@if ($details)
                                            {{ asset('images/company/'.$details->favicon) }}
                                        @endif" alt="" width="100px" class="mb-2">

                                    <div class="form-group row">
                                        <label for="phone" class="col-12 col-form-label">Phone</label>
                                        <div class="col-12">
                                            <input id="phone" name="phone" class="form-control here slug-title" type="text"
                                            value="{{ old('phone',$details->phone) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-12 col-form-label">Email</label>
                                        <div class="col-12">
                                            <input id="email" name="email" class="form-control here slug-title" type="email"
                                            value="{{ old('email',$details->email) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="support_hour" class="col-12 col-form-label">Support Hour</label>
                                        <div class="col-12">
                                            <input id="support_hour" name="support_hour" class="form-control here slug-title" type="text"
                                            value="{{ old('support_hour',$details->support_hour) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="facebook" class="col-12 col-form-label">Facebook</label>
                                        <div class="col-12">
                                            <input id="facebook" name="facebook" class="form-control here slug-title" type="text"
                                            value="{{ old('facebook',$details->facebook) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="youtube" class="col-12 col-form-label">Youtube</label>
                                        <div class="col-12">
                                            <input id="youtube" name="youtube" class="form-control here slug-title" type="text"
                                            value="{{ old('youtube',$details->youtube) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instagram" class="col-12 col-form-label">Instagram</label>
                                        <div class="col-12">
                                            <input id="instagram" name="instagram" class="form-control here slug-title" type="text"
                                            value="{{ old('instagram',$details->instagram) }}">
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="slug" class="col-12 col-form-label">Slug</label>
                                        <div class="col-12">
                                            <input id="slug" name="slug" class="form-control here set-slug" type="text"  @if (!$category)
                                            value="{{ old('slug') }}"
                                       @else
                                       value="{{ old('slug',$category->slug) }}"
                                       @endif>
                                            <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group row">
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

                                            </select>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">Description</label>
                                        <div class="col-12">
                                            <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control">@if (!$category)
                                                {{ old('sortdescription') }}
                                           @else
                                           {{ old('sortdescription',$category->description) }}
                                           @endif</textarea>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group row">
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
                                    </div> --}}
                                    {{-- <div class="form-group row">
                                        <label class="col-12 col-form-label">Image</label>
                                        <div class="col-12">
                                            <input type="file" name="image" onchange="loadFile(event)" class="form-control">
                                        </div>
                                    </div>
                                    <img id="output" src="@if ($category)
                                        {{ asset('images/category/'.$category->image) }}
                                    @endif" alt="" width="300px" class="mb-2"> --}}

                                    <div class="row">
                                        <div class="col-12">
                                            <button name="submit" type="submit" class="btn btn-primary">
                                                Update
                                           </button>
                                        </div>
                                    </div>
                                </form>
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
        var loadLogo = function(event) {
            var logoOutput = document.getElementById('logoOutput');
            logoOutput.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <script>
        var loadFavicon = function(event) {
            var faviconOutput = document.getElementById('faviconOutput');
            faviconOutput.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection

