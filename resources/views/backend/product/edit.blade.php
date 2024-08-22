@extends('backend.layout.main')

@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Edit Product</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
                </div>
                <div>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"> View All
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Edit Product</h2>
                        </div>

                        <div class="card-body">
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
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong>{{ Session::get('error') }}
                                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> --}}
                            </div>
                        @endif
                            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data"> @csrf @method('put')
                            <div class="row ec-vendor-uploads">
                                    <div class="col-lg-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" class="ec-image-upload" name="image"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview"
                                                                src="@if ($product->image)
                                                                {{ asset('images/product_image/'.$product->image) }}
                                                            @else
                                                                {{ asset('backend') }}/assets/img/products/vender-upload-preview.jpg
                                                            @endif"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload-set colo-md-12">
                                                    @if ($product->images)
                                                        @foreach ($product->images as $key => $image)
                                                            <div class="thumb-upload">
                                                                <div class="thumb-edit">
                                                                    <input type='file' id="thumbUpload0{{ $key+1 }}"
                                                                        class="ec-image-upload" name="multiImage[]"
                                                                        accept=".png, .jpg, .jpeg" />
                                                                    <label for="imageUpload"><img
                                                                            src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                            class="svg_img header_svg" alt="edit" /></label>
                                                                </div>
                                                                <div class="thumb-preview ec-preview">
                                                                    <div class="image-thumb-preview">
                                                                        <img class="image-thumb-preview ec-image-preview"
                                                                            src="@if ($image->image)
                                                                            {{ asset('images/multiImage/'.$image->image) }}
                                                                        @else
                                                                            {{ asset('backend') }}/assets/img/products/vender-upload-preview.jpg
                                                                        @endif"
                                                                            alt="edit" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    {{-- <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload02" name="multiImage[]"
                                                                class="ec-image-upload"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img
                                                                    src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend') }}/assets/img/products/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload03"
                                                                class="ec-image-upload" name="multiImage[]"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img
                                                                    src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend') }}/assets/img/products/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload04"
                                                                class="ec-image-upload" name="multiImage[]"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img
                                                                    src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend') }}/assets/img/products/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload05"
                                                                class="ec-image-upload" name="multiImage[]"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img
                                                                    src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend') }}/assets/img/products/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload06"
                                                                class="ec-image-upload" name="multiImage[]"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img
                                                                    src="{{ asset('backend') }}/assets/img/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{ asset('backend') }}/assets/img/products/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="ec-vendor-upload-detail">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="inputEmail4" class="form-label">Product name <span class="red">*</span></label>
                                                    <input type="text" class="form-control slug-title" id="inputEmail4" name="title" value="{{ old('title',$product->title) }}" placeholder="e.g:Kids Premium Water Bottle Sweet Pink" required>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label for="slug" class="col-12 col-form-label">Slug <span class="red">*</span></label>
                                                    <div class="col-12">
                                                        <input id="productSlug" name="slug" class="form-control here set-slug" type="text" placeholder="e.g:kids-premium-water-bottle-sweet-pink" value="{{ old('slug',$product->slug) }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Code <span class="red">*</span></label>
                                                    <input type="text" class="form-control"
                                                        title="Product Code" name="code" value="{{ old('code',$product->code) }}" placeholder="P-123" required>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label class="form-label">Colors</label>
                                                    <input type="text" class="form-control"
                                                        title="Choose your color" value="{{ old('color',$product->color) }}" placeholder="White">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Select Category <span class="red">*</span></label>
                                                    <select name="category_id" id="category" class="form-select" required>
                                                        <option value="">----select category-----</option>
                                                        @foreach ($categories as $catalogue)
                                                            <optgroup label="{{ $catalogue['name'] }}"></optgroup>
                                                            @foreach ($catalogue['category'] as $category)
                                                                <option @if ($category['id'] == $product->category_id)
                                                                    selected
                                                                @endif value="{{ $category['id'] }}">&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category['name'] }}</option>
                                                                @foreach ($category['subcategories'] as $subcategories)
                                                                    <option @if ($subcategories['id'] == $product->category_id)
                                                                        selected
                                                                    @endif value="{{ $subcategories['id'] }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;{{ $subcategories['name'] }}</option>
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Select Brand <span class="red">*</span></label>
                                                    <select name="brand_id" id="brand" class="form-select">
                                                        <option value="">----select brand----</option>
                                                        @foreach ($brands as $brand)
                                                            <option @if ($product->brand_id == $brand->id)
                                                                selected
                                                            @endif value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Select View Section</label>
                                                    <select name="view_section" id="view_section" class="form-select">
                                                        <option value="">----select View Section----</option>
                                                        @foreach ($product_views as $view)
                                                            <option @if ($product->view_section == $view->id)
                                                                selected
                                                            @endif value="{{ $view['id'] }}">{{ $view['title'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- <div class="col-md-8 mb-25">
                                                    <label class="form-label">Size</label>
                                                    <div class="form-checkbox-box">
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="size1" value="size">
                                                            <label>S</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="size1" value="size">
                                                            <label>M</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="size1" value="size">
                                                            <label>L</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="size1" value="size">
                                                            <label>XL</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="size1" value="size">
                                                            <label>XXL</label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-4 mt-3">
                                                    <label class="form-label">Purchased<span>( In BDT ) </span> <span class="red">*</span></label>
                                                    <input type="number" class="form-control" id="purchasePrice" placeholder="100" name="cost" value="{{ old('cost',$product->cost) }}"required>
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label class="form-label">Price<span>( In BDT ) </span> <span class="red">*</span></label>
                                                    <input type="number" class="form-control" id="mrpPrice" required name="mrp" placeholder="150" value="{{ old('mrp',$product->mrp) }}">
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label class="form-label">Discount<span>( In BDT )</label>
                                                    <input type="number" class="form-control" id="discount_amount" name="discount_amount" value="{{ old('discount_amount',$product->discount_amount) }}" placeholder="0">
                                                </div>
                                                {{-- <div class="col-md-4 mt-3">
                                                    <label class="form-label">Stock Size <span class="red">*</span></label>
                                                    <input type="number" class="form-control" id="quantity1" name="stock" placeholder="100" required>
                                                </div> --}}
                                                <div class="col-md-4 mt-3">
                                                    <label class="form-label">Stock Alert <span class="red">*</span></label>
                                                    <input type="number" class="form-control" id="quantity1" value="{{ old('alert_stock',$product->alert_stock) }}" required name="alert_stock" placeholder="10">
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label class="form-label">Select Unit <span class="red">*</span></label>
                                                    <select name="unit_id" id="unit" class="form-select">
                                                        <option value="">----select View Section----</option>
                                                        @foreach ($units as $view)
                                                            <option @if ($product->unit_id == $view->id)
                                                                selected
                                                            @endif value="{{ $view['id'] }}">{{ $view['title'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label class="form-label">Details</label>
                                                    <textarea class="form-control" rows="2" id="details" name="details">{{ $product->description }}</textarea>
                                                </div>
                                                <div class="col-md-12 mt-4 mb-4">
                                                    <label class="form-label">More Information</label>
                                                    <textarea class="form-control" rows="4" id="moreInfo" name="moreInfo">{{ $product->details_description }}</textarea>
                                                </div>
                                                {{-- <div class="col-md-12">
                                                    <label class="form-label">Product Tags <span>( Type and
                                                            make comma to separate tags )</span></label>
                                                    <input type="text" class="form-control" id="group_tag"
                                                        name="group_tag" value="" placeholder=""
                                                        data-role="tagsinput" />
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

	<!-- Option Switcher -->
	<script src="{{ asset('backend') }}/assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="{{ asset('backend') }}/assets/js/ekka.js"></script>
<script>
    $(function () {
        $("#inputEmail4").focus();
    });
</script>
<script>
    $('#inputEmail4').on("keyup change", function (e) {
        var name = $(this).val();
        if (name) {
            var name = $('#inputEmail4').val();
            // console.log(name);
            $slugGen = name.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            // console.log($slugGen);
            $('#productSlug').attr('value', $slugGen);
        }
    })
</script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#details' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#moreInfo' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
