@extends('backend.layout.main')

@section('content')

<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <h1>Product Variation</h1>
        <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Update Product Variation</p>
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

                        <form action="{{ route('updateStockVariation',$variation->id) }}" method="post" enctype="multipart/form-data"> @csrf
                            <div class="row">
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Product</label>
                                        <input type="text" name="product" id="product" class="form-control" value="{{ $variation->product->title }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Stock Size</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $variation->quantity }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Update Stock Size</label>
                                        <input type="number" name="updatequantity" id="updatequantity" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

