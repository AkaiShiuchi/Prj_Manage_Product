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
                        <a href="{{ route('product_manage') }}"><span class="glyphicon glyphicon-chevron-left"></span></a>
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
                        <small>Product by <a href="javascript:void(0);">TGDĐ</a></small>
                        <i class="fa fa-star fa-2x text-primary"></i>
                        <i class="fa fa-star fa-2x text-primary"></i>
                        <i class="fa fa-star fa-2x text-primary"></i>
                        <i class="fa fa-star fa-2x text-primary"></i>
                        <i class="fa fa-star fa-2x text-muted"></i>
                        <span class="fa fa-2x">
                            <h5>(109) Votes</h5>
                        </span>
                        <a href="javascript:void(0);">109 customer reviews</a>
                    </h2>
                    <hr />
                    <h3 class="price-container">
                        ${{ $products->price }}
                    </h3>
                    <div class="certified">
                        <ul>
                            <li>
                                <a href="javascript:void(0);">Quantity available<span>{{ $products->total }}</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Quantity sold<span>số lượng đã bán</span></a>
                            </li>
                        </ul>
                    </div>
                    <hr />
                    <div class="description description-tabs">
                        <ul id="myTab" class="nav nav-pills">
                            <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product
                                    Description </a></li>
                            <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li>
                            <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="more-information">
                                <br />
                                <strong>Description</strong>
                                <p>
                                    {{ $products->describe }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="specifications">
                                <br />
                                <dl class="">
                                    <dt>Category</dt>
                                    <dd>{{ $products->category->name }}</dd>
                                    <br />

                                    <dt>Configuration</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <br />

                                    <dt>Graphic card</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper</dd>
                                </dl>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <br />
                                <form method="post" class="well padding-bottom-10" onsubmit="return false;">
                                    <textarea rows="2" class="form-control" placeholder="Write a review"></textarea>
                                    <div class="margin-top-10">
                                        <button type="submit" class="btn btn-sm btn-primary pull-right">
                                            Submit Review
                                        </button>
                                        <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip"
                                            data-placement="bottom" title="" data-original-title="Add Location"><i
                                                class="fa fa-location-arrow"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip"
                                            data-placement="bottom" title="" data-original-title="Add Voice"><i
                                                class="fa fa-microphone"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip"
                                            data-placement="bottom" title="" data-original-title="Add Photo"><i
                                                class="fa fa-camera"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip"
                                            data-placement="bottom" title="" data-original-title="Add File"><i
                                                class="fa fa-file"></i></a>
                                    </div>
                                </form>

                                <div class="chat-body no-padding profile-message">
                                    <ul>
                                        <li class="message">
                                            <img src="" class="online" />
                                            <span class="message-text">
                                                <a href="javascript:void(0);" class="username">
                                                    ...
                                                    <span class="badge">Purchase Verified</span>
                                                    <span class="pull-right">
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-muted"></i>
                                                    </span>
                                                </a>
                                                ...
                                            </span>
                                            <ul class="list-inline font-xs">
                                                <li>
                                                    <a href="javascript:void(0);" class="text-info"><i
                                                            class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                                </li>
                                                <li class="pull-right">
                                                    <small class="text-muted pull-right ultra-light"> Posted 1 year ago
                                                    </small>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="message">
                                            <img src="" class="online" />
                                            <span class="message-text">
                                                <a href="javascript:void(0);" class="username">
                                                    ....
                                                    <span class="badge">Purchase Verified</span>
                                                    <span class="pull-right">
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                        <i class="fa fa-star fa-2x text-primary"></i>
                                                    </span>
                                                </a>
                                                ....
                                            </span>
                                            <ul class="list-inline font-xs">
                                                <li>
                                                    <a href="javascript:void(0);" class="text-info"><i
                                                            class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                                </li>
                                                <li class="pull-right">
                                                    <small class="text-muted pull-right ultra-light"> Posted 1 year ago
                                                    </small>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <a href="javascript:void(0);" class="btn btn-success btn-lg">Buy
                                (${{ $products->price }})
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="btn-group pull-right">
                                <button class="btn btn-white btn-default"><i class="fa fa-star"></i> Add to
                                    wishlist</button>
                                <button class="btn btn-white btn-default"><i class="fa fa-envelope"></i> Contact
                                    Seller</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
