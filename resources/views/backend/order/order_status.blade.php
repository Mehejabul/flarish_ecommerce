@extends('backend.layout.main')

@section('content')

<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <h1>Order Status Update</h1>
        <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Update Order Status</p>
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
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error: </strong>{{ Session::get('error') }}
                            </div>
                        @endif

                        <form action="{{ route('orderStatusUpdate',$order->id) }}" method="post" enctype="multipart/form-data"> @csrf
                            <div class="row">
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <input type="text" name="product" id="product" class="form-control" value="{{ $order->user->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Order Id</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $order->id }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Order Current Status</label>
                                        <input type="text" name="updatequantity" id="updatequantity" class="form-control" value="{{ $order->status }}" readonly>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-md-8">
                                    <div class="form-group">
                                        <label>Change Order Status</label>
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--select--</option>
                                            <option value="confirm">Confirm</option>
                                            <option value="shipping">Shipping</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="canceled">Canceled</option>
                                        </select>
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

