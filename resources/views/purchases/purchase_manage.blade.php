@extends('purchases.purchase_layout')

@section('title', 'Purchases Manage')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/purchase_manage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view_modal.css') }}">
    <script src="{{ asset('js/purchase_manage.js') }}"></script>
    <script src="{{ asset('js/view_modal.js') }}"></script>
    <script src="{{ asset('js/delete_purchase.js') }}"></script>
@endsection

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
                style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="app-brand demo ">
                    <a href="/home" class="app-brand-link">
                        <span class="img nav-link">
                            <img src="../img/logo-chu-p-dep-01.jpg" class="imagess" alt="L" width="25"
                                height="42">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">lavashop</span>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1 ps ps--active-y">
                    <!-- Dashboards -->
                    <li class="menu-item open">
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/home" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/product-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product Manage">Product Manage</div>
                                </a>
                            </li>
                            <li class="menu-item active">
                                <a href="/purchase-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Purchase Manage">Purchase Manage</div>
                                </a>
                            </li>
                            @if (auth()->user()->role_id === 1)
                                <li class="menu-item">
                                    <a href="/user-manage" class="menu-link">
                                        <div class="text-truncate" data-i18n="User Manage">User Manage</div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                            alt="Image User" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                                            alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ session('user_name') }}</span>
                                                    @if (auth()->user()->role_id === 1)
                                                        <small class="text-muted">Admin</small>
                                                    @else
                                                        <small class="text-muted">User</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @if (auth()->user()->role_id === 1)
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="card mb-4">
                                <div class="card-widget-separator-wrapper">
                                    <div class="card-body card-widget-separator">
                                        <div class="row gy-4 gy-sm-1">
                                            <div class="col-sm-6 col-lg-3">
                                                <div
                                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                                    <div>
                                                        <?php
                                                        $pendingCount = 0;
                                                        $paidCount = 0;
                                                        $failedCount = 0;
                                                        $refundedCount = 0;
                                                        ?>
                                                        @foreach ($purchase as $purchas)
                                                            @if ($purchas->status === 'Đã thanh toán')
                                                                @php
                                                                    $paidCount++;
                                                                @endphp
                                                            @elseif ($purchas->status === 'Đã hủy')
                                                                @php
                                                                    $failedCount++;
                                                                @endphp
                                                            @elseif ($purchas->status === 'Hoàn trả')
                                                                @php
                                                                    $paidCount++;
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $pendingCount++;
                                                                @endphp
                                                            @endif
                                                        @endforeach

                                                        @if ($pendingCount > 0)
                                                            <h3 class="mb-2">{{ $pendingCount }}</h3>
                                                            <p class="mb-0">Pending Payment</p>
                                                        @else
                                                            <h3 class="mb-2">0</h3>
                                                            <p class="mb-0">Pending Payment</p>
                                                        @endif
                                                    </div>
                                                    <div class="avatar me-sm-4">
                                                        <span class="avatar-initial rounded bg-label-secondary">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr class="d-none d-sm-block d-lg-none me-4">
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                                <div
                                                    class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                                    <div>
                                                        @if ($paidCount > 0)
                                                            <h3 class="mb-2">{{ $paidCount }}</h3>
                                                            <p class="mb-0">Completed</p>
                                                        @else
                                                            <h3 class="mb-2">0</h3>
                                                            <p class="mb-0">Completed</p>
                                                        @endif
                                                    </div>
                                                    <div class="avatar me-lg-4">
                                                        <span class="avatar-initial rounded bg-label-secondary">
                                                            <i class="fas fa-check-double"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr class="d-none d-sm-block d-lg-none">
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                                <div
                                                    class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                                                    <div>
                                                        @if ($refundedCount > 0)
                                                            <h3 class="mb-2">{{ $refundedCount }}</h3>
                                                        @else
                                                            <h3 class="mb-2">0</h3>
                                                        @endif
                                                        <p class="mb-0">Refunded</p>
                                                    </div>
                                                    <div class="avatar me-sm-4">
                                                        <span class="avatar-initial rounded bg-label-secondary">
                                                            <i class="fas fa-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        @if ($failedCount > 0)
                                                            <h3 class="mb-2">{{ $failedCount }}</h3>
                                                        @else
                                                            <h3 class="mb-2">0</h3>
                                                        @endif
                                                        <p class="mb-0">Failed</p>
                                                    </div>
                                                    <div class="avatar">
                                                        <span class="avatar-initial rounded bg-label-secondary">
                                                            <i class="fas fa-exclamation-circle"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order List Table -->
                            <div class="card">
                                <div class="card-datatable table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                        class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div
                                            class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center">
                                            <div class="ms-n2">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                    @if (auth()->user()->role_id === 1)
                                                        <form action="{{ route('search_purchase') }}" method="POST"
                                                            id="search_purchase_form">
                                                            @csrf
                                                            <label class="borde">
                                                                <i class="fas fa-briefcase"></i>
                                                                <input type="search" class="form-control"
                                                                    placeholder="Search Order" id="purchase_code"
                                                                    name="purchase_code"
                                                                    value="{{ old('purchase_code') }}">
                                                            </label>
                                                            <label class="bord">
                                                                <i class="fas fa-id-card"></i>
                                                                <input type="search" class="form-control"
                                                                    placeholder="Search Customer" id="purchase_customer"
                                                                    name="purchase_customer"
                                                                    value="{{ old('purchase_customer') }}">
                                                            </label>
                                                            <button class="btn btn-primary" type="submit"
                                                                id="search">
                                                                <i class="fas fa-filter"></i>Filter
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <button class="btn btn-info ml-auto" data-toggle="modal"
                                                data-target="#addNewModal">Tạo</button>
                                        </div>
                                        <div id="data_table">
                                            <table class="datatables-order table border-top dataTable no-footer dtr-column"
                                                aria-describedby="DataTables_Table_0_info" style="width: 1211px;">
                                                <thead>
                                                    <tr>
                                                        <th class="" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1" style="width: 49px;"
                                                            aria-label="order: activate to sort column ascending">STT</th>
                                                        <th class="" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1" style="width: 123px;"
                                                            aria-label="date: activate to sort column descending"
                                                            aria-sort="ascending">order
                                                        </th>
                                                        <th class="" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1" style="width: 235px;"
                                                            aria-label="customers: activate to sort column ascending">
                                                            customers
                                                        </th>
                                                        <th class="" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1" style="width: 99px;"
                                                            aria-label="payment: activate to sort column ascending">
                                                            quantity
                                                        </th>
                                                        <th class="" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1" style="width: 129px;"
                                                            aria-label="status: activate to sort column ascending">status
                                                        </th>
                                                        <th class="" rowspan="1" colspan="1"
                                                            style="width: 67px;" aria-label="Actions">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($purchases as $pur)
                                                        <?php $sum_quantity = 0; ?>
                                                        @foreach ($pur->products as $prod)
                                                            <?php $sum_quantity += $prod->pivot->quantity; ?>
                                                        @endforeach

                                                        @php
                                                            $stt =
                                                                ($purchases->currentPage() - 1) *
                                                                    $purchases->perPage() +
                                                                $loop->index +
                                                                1;
                                                        @endphp

                                                        <tr class="odd">
                                                            <td><span class="fw-medium">{{ $stt }}</span>
                                                            </td>
                                                            <td class="sorting_1"><span
                                                                    class="text-nowrap">{{ $pur->id }}</span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                                    <div class="d-flex flex-column">
                                                                        <h6 class="m-0">
                                                                            <a href="" class="text-body">
                                                                                {{ $pur->user->name }}
                                                                            </a>
                                                                        </h6>
                                                                        <small
                                                                            class="text-muted">{{ $pur->user->email }}</small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $sum_quantity }}
                                                            </td>
                                                            <td>
                                                                <h6
                                                                    class="mb-0 w-px-105 {{ $pur->status === 'Đã thanh toán' ? 'text-success' : ($pur->status === 'Đã hủy' ? 'text-danger' : ($pur->status === 'Chờ xác nhận' ? 'text-warning' : 'text-info')) }}">
                                                                    <i class="fas fa-circle"></i> {{ $pur->status }}
                                                                </h6>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-sm-end align-items-sm-center">
                                                                    @if ($pur->status === 'Chờ xác nhận')
                                                                        <a href="{{ route('confirm', ['id' => $pur->id]) }}"
                                                                            class="btn btn-outline-danger">
                                                                            Xác nhận
                                                                        </a>
                                                                    @endif
                                                                    <button
                                                                        class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-end m-0"
                                                                        style="">
                                                                        <a href="{{ route('detail_purchase', ['id' => $pur->id]) }}"
                                                                            class="dropdown-item"
                                                                            style="font-size: 16px;">View Detail
                                                                        </a>
                                                                        @if (auth()->user()->role_id === 1)
                                                                            <button type="button" data-toggle="modal"
                                                                                data-target="#deletePurchase"
                                                                                data-delete-id="{{ $pur->id }}"
                                                                                class="dropdown-item delete-record">Delete
                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row mx-2">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_info" id="DataTables_Table_0_info"
                                                        role="status" aria-live="polite">Displaying
                                                        {{ $purchases->firstItem() }} to
                                                        {{ $purchases->lastItem() }} of {{ $purchases->total() }} entries
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="DataTables_Table_0_paginate">
                                                        <ul class="pagination">
                                                            @if ($purchases->currentPage() == 1)
                                                                <li class="paginate_button page-item previous disabled">
                                                                    <a class="page-link">Previous</a>
                                                                </li>
                                                            @else
                                                                <li class="paginate_button page-item previous">
                                                                    <a class="page-link"
                                                                        href="{{ $purchases->previousPageUrl() }}">Previous</a>
                                                                </li>
                                                            @endif

                                                            @for ($page = 1; $page <= $purchases->lastPage(); $page++)
                                                                <li
                                                                    class="page-item {{ $purchases->currentPage() == $page ? 'active' : '' }}">
                                                                    <a class="page-link"
                                                                        href="{{ $purchases->url($page) }}">{{ $page }}</a>
                                                                </li>
                                                            @endfor

                                                            @if ($purchases->currentPage() == $purchases->lastPage())
                                                                <li class="page-item disabled">
                                                                    <span class="page-link">Next</span>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link"
                                                                        href="{{ $purchases->nextPageUrl() }}">Next</a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="width: 1%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="container-xxl flex-grow-1 container-p-y"
                            style="padding-right: 18px; padding-left: 18px;">
                            <div class="row">
                                <!-- Customer-detail Sidebar -->
                                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                                    <!-- Customer-detail Card -->
                                    <div class="car card mb-4">
                                        <div class="card-body">
                                            <div class="customer-avatar-section">
                                                <div class="d-flex align-items-center flex-column">
                                                    <img class="img-fluid rounded my-3"
                                                        src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                                        height="110" width="110" alt="User avatar">
                                                    <div class="customer-info text-center">
                                                        <h4 class="mb-1">{{ $user_view->name }}</h4>
                                                        <small>Customer ID {{ $user_view->id }}</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="info-container">
                                                <small
                                                    class="d-block pt-4 border-top fw-normal text-uppercase text-muted my-3">DETAILS</small>
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <span class="fw-medium me-2">Username:</span>
                                                        <span>{{ $user_view->name }}</span>
                                                    </li>
                                                    <li class="mb-3">
                                                        <span class="fw-medium me-2">Email:</span>
                                                        <span>{{ $user_view->email }}</span>
                                                    </li>
                                                    <li class="mb-3">
                                                        <span class="fw-medium me-2">Status:</span>
                                                        <span class="badge bg-label-success">Active</span>
                                                    </li>
                                                    <li class="mb-3">
                                                        <span class="fw-medium me-2">Contact:</span>
                                                        <span>0123 456 789</span>
                                                    </li>

                                                    <li class="mb-3">
                                                        <span class="fw-medium me-2">Country:</span>
                                                        <span>Viet Nam</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Customer-detail Card -->
                                </div>
                                <!--/ Customer Sidebar -->

                                <!-- Customer Content -->
                                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                                    <!-- Customer Pills -->
                                    <ul class="nav nav-pills flex-column flex-md-row mb-4" id="tabList">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void(0);" data-target="overview">
                                                <i class="bx bx-user me-1"></i>Overview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" data-target="history">
                                                <i class='bx bx-history me-1'></i>History
                                            </a>
                                        </li>
                                    </ul>
                                    <!--/ Customer Pills -->

                                    <!-- Overview table -->
                                    <div class="ca card mb-4 active" id="overview">
                                        <div class="table-responsive mb-3">
                                            <div id="DataTables_Table_0_wrapper"
                                                class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="card-header d-flex flex-wrap py-3 py-sm-2">
                                                    <div class="head-label text-center me-4 ms-1">
                                                        <h5 class="card-title mb-0 text-nowrap">Orders List</h5>
                                                    </div>
                                                    <div id="add_button_purchase" class="dataTables_filter">
                                                        <button class="btn btn-info ml-auto" data-toggle="modal"
                                                            data-target="#addNewModal">Tạo</button>
                                                    </div>
                                                </div>
                                                <table
                                                    class="table datatables-customer-order border-top dataTable no-footer dtr-column"
                                                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                                    style="width: 800px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="control sorting_disabled dtr-hidden" rowspan="1"
                                                                colspan="1" style="width: 0px; display: none;"
                                                                aria-label=""></th>
                                                            <th style="width: 18px;">Stt</th>
                                                            <th style="width: 72px;"
                                                                aria-label="Order: activate to sort column ascending">Order
                                                            </th>
                                                            <th style="width: 140px;">
                                                                Customer
                                                            </th>
                                                            <th style="width: 140px;">
                                                                Quantity</th>
                                                            <th style="width: 77px;">
                                                                Status
                                                            </th>
                                                            <th class="text-md-center sorting_disabled" rowspan="1"
                                                                colspan="1" style="width: 88px;" aria-label="Actions">
                                                                Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cus_purchase as $pur)
                                                            @if ($pur->user->name === session('user_name'))
                                                                <?php $sum_quantity = 0; ?>
                                                                @foreach ($pur->products as $prod)
                                                                    <?php $sum_quantity += $prod->pivot->quantity; ?>
                                                                @endforeach

                                                                @php
                                                                    $stt =
                                                                        ($cus_purchase->currentPage() - 1) *
                                                                            $cus_purchase->perPage() +
                                                                        $loop->index +
                                                                        1;
                                                                @endphp

                                                                <tr class="odd">
                                                                    <td><span class="fw-medium">{{ $stt }}</span>
                                                                    </td>
                                                                    <td class="sorting_1"><span
                                                                            class="text-nowrap">{{ $pur->id }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                                            <div class="d-flex flex-column">
                                                                                <h6 class="m-0">
                                                                                    <a href="" class="text-body">
                                                                                        {{ $pur->user->name }}
                                                                                    </a>
                                                                                </h6>
                                                                                <small
                                                                                    class="text-muted">{{ $pur->user->email }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ $sum_quantity }}
                                                                    </td>
                                                                    <td>
                                                                        <h6
                                                                            class="mb-0 w-px-100 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
                                                                            <i class="fas fa-circle"></i>
                                                                            {{ $pur->status }}
                                                                        </h6>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex justify-content-sm-center align-items-sm-center">
                                                                            <button
                                                                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end m-0"
                                                                                style="">
                                                                                <a href="{{ route('detail_purchase', ['id' => $pur->id]) }}"
                                                                                    class="dropdown-item"
                                                                                    style="font-size: 16px;">View
                                                                                    Detail
                                                                                </a>
                                                                                @if (auth()->user()->role_id === 1)
                                                                                    <button type="button"
                                                                                        data-toggle="modal"
                                                                                        data-target="#deletePurchase"
                                                                                        data-delete-id="{{ $pur->id }}"
                                                                                        class="dropdown-item delete-record">Delete
                                                                                    </button>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="row mx-4">
                                                    <div
                                                        class="col-md-12 col-xl-6 text-center text-xl-start pb-2 pb-lg-0 pe-0">
                                                        <div class="dataTables_info" id="DataTables_Table_0_info"
                                                            role="status" aria-live="polite">Showing
                                                            {{ $cus_purchase->firstItem() }} to
                                                            {{ $cus_purchase->lastItem() }}
                                                            of {{ $cus_purchase->total() }}
                                                            orders</div>
                                                    </div>
                                                    <div
                                                        class="col-md-12 col-xl-6 d-flex justify-content-center justify-content-xl-end">
                                                        <div class="dataTables_paginate paging_simple_numbers"
                                                            id="DataTables_Table_0_paginate">
                                                            <ul class="pagination">
                                                                @if ($cus_purchase->currentPage() == 1)
                                                                    <li
                                                                        class="paginate_button page-item previous disabled">
                                                                        <a class="page-link">Previous</a>
                                                                    </li>
                                                                @else
                                                                    <li class="paginate_button page-item previous">
                                                                        <a class="page-link"
                                                                            href="{{ $cus_purchase->previousPageUrl() }}">Previous</a>
                                                                    </li>
                                                                @endif

                                                                @for ($page = 1; $page <= $cus_purchase->lastPage(); $page++)
                                                                    <li
                                                                        class="page-item {{ $cus_purchase->currentPage() == $page ? 'active' : '' }}">
                                                                        <a class="page-link"
                                                                            href="{{ $cus_purchase->url($page) }}">{{ $page }}</a>
                                                                    </li>
                                                                @endfor

                                                                @if ($cus_purchase->currentPage() == $cus_purchase->lastPage())
                                                                    <li class="page-item disabled">
                                                                        <span class="page-link">Next</span>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link"
                                                                            href="{{ $cus_purchase->nextPageUrl() }}">Next</a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 1%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Overview table -->

                                    <!-- History table -->
                                    <div class="ca card mb-4" id="history" style="display:none;">
                                        <div class="table-responsive mb-3">
                                            <div id="DataTables_Table_0_wrapper"
                                                class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="card-header d-flex flex-wrap py-3 py-sm-4">
                                                    <div class="head-label text-center me-4 ms-1">
                                                        <h5 class="card-title mb-0 text-nowrap">Orders History</h5>
                                                    </div>
                                                </div>
                                                <table
                                                    class="table datatables-customer-order border-top dataTable no-footer dtr-column"
                                                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                                    style="width: 800px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="control sorting_disabled dtr-hidden" rowspan="1"
                                                                colspan="1" style="width: 0px; display: none;"
                                                                aria-label=""></th>
                                                            <th style="width: 18px;">Stt</th>
                                                            <th style="width: 72px;"
                                                                aria-label="Order: activate to sort column ascending">Order
                                                            </th>
                                                            <th style="width: 140px;">
                                                                Customer
                                                            </th>
                                                            <th style="width: 140px;">
                                                                Quantity</th>
                                                            <th style="width: 77px;">
                                                                Status
                                                            </th>
                                                            <th class="text-md-center sorting_disabled" rowspan="1"
                                                                colspan="1" style="width: 88px;" aria-label="Actions">
                                                                Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($customer_purchase as $pur)
                                                            @if ($pur->user->name === session('user_name'))
                                                                <?php $sum_quantity = 0; ?>
                                                                @foreach ($pur->products as $prod)
                                                                    <?php $sum_quantity += $prod->pivot->quantity; ?>
                                                                @endforeach

                                                                @php
                                                                    $stt =
                                                                        ($customer_purchase->currentPage() - 1) *
                                                                            $customer_purchase->perPage() +
                                                                        $loop->index +
                                                                        1;
                                                                @endphp

                                                                <tr class="odd">
                                                                    <td><span class="fw-medium">{{ $stt }}</span>
                                                                    </td>
                                                                    <td class="sorting_1"><span
                                                                            class="text-nowrap">{{ $pur->id }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                                            <div class="d-flex flex-column">
                                                                                <h6 class="m-0">
                                                                                    <a href="" class="text-body">
                                                                                        {{ $pur->user->name }}
                                                                                    </a>
                                                                                </h6>
                                                                                <small
                                                                                    class="text-muted">{{ $pur->user->email }}</small>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ $sum_quantity }}
                                                                    </td>
                                                                    <td>
                                                                        <h6
                                                                            class="mb-0 w-px-100 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
                                                                            <i class="fas fa-circle"></i>
                                                                            {{ $pur->status }}
                                                                        </h6>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex justify-content-sm-center align-items-sm-center">
                                                                            <button
                                                                                class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-end m-0"
                                                                                style="">
                                                                                <a href="{{ route('detail_purchase', ['id' => $pur->id]) }}"
                                                                                    class="dropdown-item"
                                                                                    style="font-size: 16px;">View
                                                                                    Detail
                                                                                </a>
                                                                                @if (auth()->user()->role_id === 1)
                                                                                    <button type="button"
                                                                                        data-toggle="modal"
                                                                                        data-target="#deletePurchase"
                                                                                        data-delete-id="{{ $pur->id }}"
                                                                                        class="dropdown-item delete-record">Delete
                                                                                    </button>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="row mx-4">
                                                    <div
                                                        class="col-md-12 col-xl-6 text-center text-xl-start pb-2 pb-lg-0 pe-0">
                                                        <div class="dataTables_info" id="DataTables_Table_0_info"
                                                            role="status" aria-live="polite">Showing
                                                            {{ $customer_purchase->firstItem() }} to
                                                            {{ $customer_purchase->lastItem() }}
                                                            of {{ $customer_purchase->total() }}
                                                            orders</div>
                                                    </div>
                                                    <div
                                                        class="col-md-12 col-xl-6 d-flex justify-content-center justify-content-xl-end">
                                                        <div class="dataTables_paginate paging_simple_numbers"
                                                            id="DataTables_Table_0_paginate">
                                                            <ul class="pagination">
                                                                @if ($customer_purchase->currentPage() == 1)
                                                                    <li
                                                                        class="paginate_button page-item previous disabled">
                                                                        <a class="page-link">Previous</a>
                                                                    </li>
                                                                @else
                                                                    <li class="paginate_button page-item previous">
                                                                        <a class="page-link"
                                                                            href="{{ $customer_purchase->previousPageUrl() }}">Previous</a>
                                                                    </li>
                                                                @endif

                                                                @for ($page = 1; $page <= $customer_purchase->lastPage(); $page++)
                                                                    <li
                                                                        class="page-item {{ $customer_purchase->currentPage() == $page ? 'active' : '' }}">
                                                                        <a class="page-link"
                                                                            href="{{ $customer_purchase->url($page) }}">{{ $page }}</a>
                                                                    </li>
                                                                @endfor

                                                                @if ($customer_purchase->currentPage() == $customer_purchase->lastPage())
                                                                    <li class="page-item disabled">
                                                                        <span class="page-link">Next</span>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link"
                                                                            href="{{ $customer_purchase->nextPageUrl() }}">Next</a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="width: 1%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /History table -->
                                </div>
                                <!--/ Customer Content -->
                            </div>

                        </div>
                    @endif

                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    @include('purchases.modal.view_modal')
    @include('purchases.modal.add_purchase')
    @include('purchases.modal.delete_purchase')
@endsection
