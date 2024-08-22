@extends('backend.layout.main')
@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
@section('content')
{{-- <form class="">
	<!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
	Repeater 1
	<div class='repeater'>
		<div data-repeater-list="group-a">
			<div data-repeater-item>
				<input type="text" name="text-input" value="A" />
				<input data-repeater-delete type="button" value="Delete" />
			</div>
			<div data-repeater-item>
				<input type="text" name="text-input" value="B" />
				<input data-repeater-delete type="button" value="Delete" />
			</div>
		</div>
		<input data-repeater-create type="button" value="Add" />
	</div>

	Repeater 2
	<div class='repeater'>
		<!-- Make sure the repeater list value is different from the first repeater  -->
		<div data-repeater-list="group-b">
			<div data-repeater-item>
				<input type="text" name="text-input" value="G" />
				<input data-repeater-delete type="button" value="Delete" />
			</div>
		</div>
		<input data-repeater-create type="button" value="Add" />
	</div>
</form> --}}
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <h1>Product Variation</h1>
        <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Add Product Variation</p>
    </div>
    <div class="row">
        <div class="col-xl-10 col-lg-10">
            <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
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

                        <form action="{{ route('productVariation') }}" method="post" enctype="multipart/form-data"> @csrf
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <input list="browsers" name="product" id="product" class="form-control" required>
                                        <datalist id="browsers">
                                            @foreach (App\Models\Product::get()->all() as $product)
                                                <option value="{{ $product->slug }}">
                                                    (code: {{ $product->code }})
                                                    (stock:
                                                    @if ($product->stock)
                                                    {{ $product->stock->quantity }}
                                                    @endif
                                                    )
                                                </option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row targetDiv" id="div0">
                                <div class="col-md-12">
                                <div id="group1" class="fvrduplicate">
                                    <div class="row entry">
                                    <div class="col-xs-12 col-md-5">
                                        <div class="form-group">
                                        <label>Size</label>
                                        {{-- <input class="form-control form-control-sm" name="fields[]" type="text" placeholder="Length"> --}}
                                        <select name="size_id[]" id="size_id" class="form-control" required>
                                            <option value="">--select size--</option>
                                            @foreach (App\Models\ProductVariation::get()->all() as $variation)
                                                <option value="{{ $variation->id }}">{{ $variation->size }}</option>
                                            @endforeach

                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-5">
                                        <div class="form-group">
                                        <label>Qty(pcs)</label>
                                        <input class="form-control form-control-sm" name="qty[]" type="number" min="1" placeholder="Qty" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="button" class="btn btn-success btn-sm btn-add">
                                            <i class="fa fa-plus" aria-hidden="true">+</i>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            var controlForm = $(this).closest('.fvrduplicate'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);
            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<i class="fa fa-minus" aria-hidden="true">-</i>');
        }).on('click', '.btn-remove', function(e) {
            $(this).closest('.entry').remove();
            return false;
        });
    });
</script>
@endsection
