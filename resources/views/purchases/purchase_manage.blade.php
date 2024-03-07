@extends('purchases.purchase_layout')

@section('title', 'Purchases Manage')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
    <script src="{{ asset('js/purchase_manage.js') }}"></script>
@endsection

@section('content')
    <div class="be-wrapper be-fixed-sidebar">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="img nav-link" href="/home"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product-manage">Product Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/purchase-manage">Purchases Manage</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                    <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                    <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card card-table">
                    <div class="card-header">Danh mục đơn hàng</div>
                    <div class="card-body" style="height: 260px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">STT</th>
                                    <th style="width: 20%;">Mã Sản Phẩm</th>
                                    <th style="width: 35%;">Tên Sản Phẩm</th>
                                    <th class="number">Số Lượng</th>
                                    <th style="width: 15%;">Đơn Giá</th>
                                    <th class="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="action">
                                        <a class="icon" href="#">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header card-header-divider pb-2">Khách hàng</div>
                    <div class="card-body pt-4" style="height: 246px">
                        <div class="row user-progress user-progress-small">
                            <div class="col-lg-5"><span class="title">Tên</span></div>
                            <div class="col-lg-7 text-end">aaaaa</div>
                        </div>
                        <div class="row user-progress user-progress-small">
                            <div class="col-lg-5"><span class="title">Email</span></div>
                            <div class="col-lg-7 text-end">aaaaaaaaa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card-body table-responsive">
                    <table class="table table-striped table-borderless">
                        <div class="container py-3">
                            <div class="row">
                                @foreach ($product as $prod)
                                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                                        <div class="card">
                                            <div class="d-flex justify-content-between p-3">
                                                <p class="lead mb-0">{{ $prod->name }}</p>
                                                <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                    style="width: 35px; height: 35px;">
                                                    <p class="text-white mb-0 small">x4</p>
                                                </div>
                                            </div>
                                            <img src="{{ asset('storage/uploads/' . $prod->image) }}" class="card-img-top"
                                                alt="Laptop" />
                                            <div class="below card-body">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <h5 class="mb-0">
                                                        <button class="modal-trigger-btn">
                                                            <span>{{ $prod->category->name }}</span>
                                                        </button>
                                                    </h5>
                                                    <h5 class="text-dark mb-0">${{ $prod->price }}</h5>
                                                </div>

                                                <div class="d-flex justify-content-between mb-2">
                                                    <p class="text-muted mb-0">Available: <span
                                                            class="fw-bold">{{ $prod->total }}</span></p>
                                                    <div class="ms-auto text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header card-header-divider pb-1">Thanh Toán</div>
                    <form action="" method="">
                        <div class="card-body pt-5">
                            <div class="row user-progress user-progress-small">
                                <div class="col-lg-5"><span class="title">Tổng tiền</span></div>
                                <div class="col-lg-7">
                                    {{-- {{ $purchase->quantity }} --}}
                                </div>
                            </div>
                            <div class="row user-progress user-progress-small">
                                <div class="col-lg-5"><span class="title">Chiết khấu</span></div>
                                <div class="col-lg-7">

                                </div>
                            </div>
                            <div class="row user-progress user-progress-small">
                                <div class="col-lg-5"><span class="title">Khách hàng phải trả</span></div>
                                <div class="col-lg-7">

                                </div>
                            </div>
                            <div class="row user-progress user-progress-small">
                                <div class="col-lg-5"><span class="title"></span></div>
                                <div class="col-lg-7">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Thanh toán</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @include('purchases.modal.view_modal')
@endsection
