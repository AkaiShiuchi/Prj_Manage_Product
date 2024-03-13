@extends('purchases.purchase_layout')

@section('title', 'Purchases Manage')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view_modal.css') }}">
    <script src="{{ asset('js/purchase_manage.js') }}"></script>
    <script src="{{ asset('js/view_modal.js') }}"></script>
    <script src="{{ asset('js/delete_purchase.js') }}"></script>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Danh mục đơn hàng</span>
                        <button class="btn btn-info ml-auto" data-toggle="modal" data-target="#addNewModal">Tạo</button>
                    </div>
                    <div class="card-body table-responsive" style="height: 260px">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                        style="width: 0px; display: none;" aria-label=""></th>
                                    <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                        colspan="1" style="width: 5%;" data-col="1" aria-label="">
                                        <input type="checkbox" id="select-all-checkbox" class="for form-check-input">
                                    </th>
                                    <th style="width: 5%;">STT</th>
                                    <th style="width: 15%;">Mã Đơn Hàng</th>
                                    <th style="width: 35%;">Khách Hàng</th>
                                    <th class="number">Số Lượng</th>
                                    <th style="width: 15%;">Trạng Thái</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase as $pur)
                                    <tr class="odd">
                                        <td class="control" tabindex="0" style="display: none;"></td>
                                        <td class="dt-checkboxes-cell"><input type="checkbox"
                                                class="for dt-checkboxes form-check-input">
                                        </td>
                                        <td><span class="fw-medium"></span></td>
                                        <td class="sorting_1"><span class="text-nowrap">{{ $pur->id }}</span></td>
                                        <td>
                                            <div
                                                class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <h6 class="m-0">
                                                        <a href="pages-profile-user.html" class="text-body">
                                                            {{ $pur->user->name }}
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted">{{ $pur->user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if (isset($pur->products->quantity))
                                                {{ $pur->products->quantity }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td>
                                            <h6
                                                class="mb-0 w-px-100 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
                                                <i class="bx bxs-circle fs-tiny me-2"></i>{{ $pur->status }}
                                            </h6>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-sm-center align-items-sm-center">
                                                <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                                    <a href="/detail-purchase" class="dropdown-item">
                                                        View
                                                    </a>
                                                    <button type="button" data-toggle="modal" data-target="#deletePurchase"
                                                        data-delete-id="{{ $pur->id }}"
                                                        class="dropdown-item delete-record">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
                            <div class="col-lg-7 text-end">{{ session('user_name') }}</div>
                        </div>
                        <div class="row user-progress user-progress-small">
                            <div class="col-lg-5"><span class="title">Email</span></div>
                            <div class="col-lg-7 text-end">{{ session('user_email') }}</div>
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
                                            <img src="{{ asset('storage/uploads/' . $prod->image) }}"
                                                class="card-img-top" alt="Laptop" />
                                            <div class="below card-body">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <h5 class="mb-0">
                                                        <button type="button" class="modal-trigger-btn"
                                                            data-toggle="modal" data-target="#viewModal"
                                                            data-product-id="{{ $prod->id }}">
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
    @include('purchases.modal.add_purchase')
    @include('purchases.modal.delete_purchase')
@endsection
