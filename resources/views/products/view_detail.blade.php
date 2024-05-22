@extends('products.view_layout')

@section('title', 'View Detail')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/view_detail.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="product-content product-wrap clearfix product-deatil">
            <div class="row">
                <div class="back">
                    <button class="btn">
                        <a href="{{ route('product_manage') }}"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
                    </button>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="product-image">
                        <div id="myCarousel-2" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ url('storage/uploads/' . $products->image) }}" class="img-responsive"
                                        alt="Product Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                    <h2 class="name">
                        {{ $products->name }}
                        <small>Product of <a href="javascript:void(0);">Lavashop</a></small>
                    </h2>
                    <hr />
                    <h3 class="price-container">
                        {{ $products->price }}₫
                    </h3>
                    <div class="certified">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">Quantity available<span>{{ $products->total }}</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Quantity sold<span>{{ $total_sold }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <hr />
                    <div class="description description-tabs">
                        <strong class="detail">Category</strong>
                        <p class="ppp">
                            {{ $products->category->name }}
                        </p>
                        <strong class="detail">Description</strong>
                        <p class="ppp">
                            {{ $products->describe }}
                        </p>
                    </div>
                    <hr />
                    <div class="row">
                        {{-- <div class="col-sm-12 col-md-6 col-lg-6">
                            <a href="javascript:void(0);" class="btn btn-success btn-lg">
                                <i class="fas fa-cart-plus"></i>Buy (${{ $products->price }})
                            </a>
                        </div> --}}
                        <div class="col-sm-12 col-md-6 col-lg-12">
                            <div class="btn-group pull-right">
                                <form action="{{ route('print_barcode', ['id' => $products->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-info" id="showQRModal">
                                        <i class="fa fa-print"></i>
                                        QR Code
                                    </button>
                                </form>
                                <div>{!! isset($qrCode) ? $qrCode : '' !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
