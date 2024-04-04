@extends('products.layouts')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/product_manage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add_modal.css') }}">
    <script src="{{ asset('js/product_manage/add_product_modal.js') }}"></script>
@endsection

{{-- @section('content')
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
                        <a class="nav-link" href="/product-manage"><span class="nabav">Product Manage</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/purchase-manage">Purchases Manage</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                    <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                    <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container1">
            <div class="justify-content-center row">
                <div class="col-lg-8">
                    <div class="candidate-list-widgets mb-4">
                        <form action="{{ route('search') }}" method="POST" id="searchForm">
                            @csrf
                            <div class="g-2 row">
                                <div class="col-lg-5">
                                    <div class="filler-job-form">
                                        <i class="uil uil-briefcase-alt"></i><input id="product_name" name="product_name"
                                            placeholder="Product name... " type="search" value="{{ old('product_name') }}"
                                            class="form-control filler-job-input-box form-control" style="height: 30px" />
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="filler-job-form">
                                        <i class="uil uil-location-point"></i>
                                        <select class="form-select selectForm__inner" data-trigger="true" name="category_id"
                                            id="category_id" aria-label="Default select example">
                                            <option value="0">Chọn thể loại sản phẩm</option>
                                            <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Đồ gia
                                                dụng</option>
                                            <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Máy tính
                                            </option>
                                            <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Phụ kiện
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div>
                                        <button class="btn btn-primary" type="submit" id="search_button"><i
                                                class="uil uil-filter"></i>
                                            Filter
                                        </button>
                                        <button type="button" class="btn btn-info" title="Add New" data-toggle="modal"
                                            data-target="#addNewModal">
                                            Thêm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="{{ route('import_products') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex">
                        @csrf
                        <input id="import_file" type="file" name="import">
                        <button class="btn btn-success ms-5"><i class="uil uil-cog"></i>
                            Import
                        </button>
                        <a class="btn btn-success ms-2" href="{{ route('export_products') }}"><i class="uil uil-cog"></i>
                            Export
                        </a>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="align-items-center row">
                        <div class="col-lg-7">
                            @if (isset($products))
                                <div class="mb-3 mb-lg-0">
                                    @if ($products->total() > 0)
                                        @php
                                            $from = ($products->currentPage() - 1) * $products->perPage() + 1;
                                            $to = $from + $products->count() - 1;
                                        @endphp
                                        <h6 class="fs-16 mb-0">Showing {{ $from }} – {{ $to }} of
                                            {{ $products->total() }} results</h6>
                                    @else
                                        <h6 class="fs-16 mb-0">No results found</h6>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="candidate-list">
                        @if (isset($results) && $results->count() > 0)
                            @foreach ($results as $item)
                                <div class="candidate-list-box card mt-4">
                                    <div class="p-4 card-body">
                                        <div class="align-items-center row">
                                            <div class="col-auto">
                                                <div class="candidate-list-images">
                                                    <a href="{{ route('view_detail', ['id' => $item->id]) }}"><img
                                                            src="{{ asset('storage/uploads/' . $item->image) }}"
                                                            alt="Product Image"
                                                            class="avatar-md img-thumbnail rounded-circle" /></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="candidate-list-content mt-3 mt-lg-0">
                                                    <h5 class="fs-19 mb-0">
                                                        <a class="primary-link"
                                                            href="{{ route('view_detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                                    </h5>
                                                    <p class="text-muted mb-2"></p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item"><i
                                                                class="mdi mdi-map-marker"></i>{{ $item->id }}
                                                        </li>
                                                        <li class="list-inline-item"><i class="mdi mdi-wallet"></i>
                                                            ${{ $item->price }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span
                                                        class="badge bg-soft-secondary fs-14 mt-1">{{ $item->category->name }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <a class="btn btn-warning"
                                                        href="{{ route('edit_product', ['id' => $item->id]) }}"><i
                                                            class="uil uil-filter"></i>
                                                        Sửa
                                                    </a>
                                                    <button type="button" class="btn btn-danger" title="delete"
                                                        data-delete-url="{{ route('delete_product', ['id' => $item->id]) }}"
                                                        data-toggle="modal" data-target="#deleteModal">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif (isset($results) && $results->count() == 0)
                            <p>Không tìm thấy sản phẩm nào.</p>
                        @else
                            @foreach ($products as $item)
                                <div class="candidate-list-box card mt-4">
                                    <div class="p-4 card-body">
                                        <div class="align-items-center row">
                                            <div class="col-auto">
                                                <div class="candidate-list-images">
                                                    <a href="{{ route('view_detail', ['id' => $item->id]) }}"><img
                                                            src="{{ asset('storage/uploads/' . $item->image) }}"
                                                            alt="Product Image"
                                                            class="avatar-md img-thumbnail rounded-circle" /></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="candidate-list-content mt-3 mt-lg-0">
                                                    <h5 class="fs-19 mb-0">
                                                        <a class="primary-link"
                                                            href="{{ route('view_detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                                    </h5>
                                                    <p class="text-muted mb-2"></p>
                                                    <ul class="list-inline mb-0 text-muted">
                                                        <li class="list-inline-item"><i
                                                                class="mdi mdi-map-marker"></i>{{ $item->id }}
                                                        </li>
                                                        <li class="list-inline-item"><i class="mdi mdi-wallet"></i>
                                                            ${{ $item->price }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <span
                                                        class="badge bg-soft-secondary fs-14 mt-1">{{ $item->category->name }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                                    <a class="btn btn-warning"
                                                        href="{{ route('edit_product', ['id' => $item->id]) }}"><i
                                                            class="uil uil-filter"></i>
                                                        Sửa
                                                    </a>
                                                    <button type="button" class="btn btn-danger" title="delete"
                                                        data-delete-url="{{ route('delete_product', ['id' => $item->id]) }}"
                                                        data-toggle="modal" data-target="#deleteModal">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-4 pt-2 col-lg-12">
                    @if (isset($products))
                        <nav aria-label="Page navigation example">
                            <div class="pagination job-pagination mb-0 justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" tabindex="-1" href="#"><i
                                                class="mdi mdi-chevron-double-left fs-15"></i></a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="page-item {{ $i === $products->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}"><i
                                                class="mdi mdi-chevron-double-right fs-15"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('products.modal.add_new_product')
    @include('products.modal.delete_product')
    <script src="{{ asset('js/product_manage.js') }}"></script>
@endsection --}}

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
                            <li class="menu-item active">
                                <a href="/product-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product Manage">Product Manage</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/purchase-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Purchase Manage">Purchase Manage</div>
                                </a>
                            </li>
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
                                        <img src="" alt="Image User" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="" alt=""
                                                            class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Product List Table -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Filter</h5>
                                <form action="{{ route('search') }}" method="POST" id="search_product">
                                    @csrf
                                    <div class="d-flex justify-content-right align-items-center row py-3 gap-3 gap-md-0">
                                        <div class="col-md-3 product_status">
                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                <label>
                                                    <input id="product_name" name="product_name"
                                                        placeholder="Search Product" type="search"
                                                        value="{{ old('product_name') }}"
                                                        class="form-control filler-job-input-box form-control" />
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 product_category">
                                            <select id="ProductCategory" class="form-select text-capitalize"
                                                name="category_id" id="category_id">
                                                <option value="0">Chọn thể loại sản phẩm</option>
                                                <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Đồ
                                                    gia
                                                    dụng</option>
                                                <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Máy
                                                    tính
                                                </option>
                                                <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Phụ
                                                    kiện
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit" id="search_button">
                                                <i class='bx bxs-filter-alt'></i>Filter
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-datatable table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div
                                        class="card-header d-flex border-top rounded-0 flex-wrap py-md-2 justify-content-end">
                                        <div
                                            class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                                            <div
                                                class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                                                <div class="dt-buttons btn-group flex-wrap d-flex">
                                                    <form action="{{ route('import_products') }}" method="POST"
                                                        enctype="multipart/form-data" class="for d-flex">
                                                        @csrf
                                                        <input id="import_file" type="file" name="import">
                                                        <button class="btn btn-label-secondary me-3">
                                                            <i class='bx bx-import me-1'></i>Import
                                                        </button>
                                                        <a class="btn btn-label-secondary me-3"
                                                            href="{{ route('export_products') }}">
                                                            <span><i class="bx bx-export me-1"></i>Export</span>
                                                        </a>
                                                    </form>
                                                    <button class="btn btn-secondary add-new btn-primary" type="button"
                                                        title="Add New" data-toggle="modal" data-target="#addNewModal">
                                                        <span>
                                                            <i class="bx bx-plus me-0 me-sm-1"></i>
                                                            <span class="d-none d-sm-inline-block">Add Product</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table
                                        class="datatables-products table border-top dataTable no-footer dtr-column collapsed"
                                        id="products_table" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1211px;">
                                        <thead>
                                            <tr>
                                                <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 3px;" aria-label="">stt</th>
                                                <th class="sorting" style="width: 30px; ">id</th>
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 370px;"
                                                    aria-label="product: activate to sort column descending"
                                                    aria-sort="ascending">product</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 130px;"
                                                    aria-label="category: activate to sort column ascending">category</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 80px;" aria-label="stock">total</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 80px;"
                                                    aria-label="price: activate to sort column ascending">price</th>
                                                <th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                                    style="width: 80px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $item)
                                                <tr class="odd parent">
                                                    @php
                                                        $stt =
                                                            ($products->currentPage() - 1) * $products->perPage() +
                                                            $loop->index +
                                                            1;
                                                    @endphp
                                                    <td class="control">{{ $stt }}</td>
                                                    <td>{{ $item->id }}</td>
                                                    <td class="sorting_1">
                                                        <div
                                                            class="d-flex justify-content-start align-items-center product-name">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar me-2 rounded-2">
                                                                    <img src="{{ asset('storage/uploads/' . $item->image) }}"
                                                                        alt="Product Image"
                                                                        class="avatar-md img-thumbnail rounded-circle" />
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <h6 class="text-body text-nowrap mb-0">
                                                                    {{ $item->name }}</h6>
                                                                <small
                                                                    class="text-muted text-truncate d-none d-sm-block">{{ $item->describe }}</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-truncate d-flex align-items-center">
                                                            <span
                                                                class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2">
                                                                <i class='bx bx-laptop'></i>
                                                            </span>{{ $item->category->name }}
                                                        </span>
                                                    </td>
                                                    <td><span>{{ $item->total }}</span></td>
                                                    <td><span>${{ $item->price }}</span></td>
                                                    <td class="dtr-hidden">
                                                        <div class="d-inline-block text-nowrap">
                                                            <a class="btn btn-sm btn-icon"
                                                                href="{{ route('edit_product', ['id' => $item->id]) }}">
                                                                <i class="bx bx-edit"></i>
                                                            </a>
                                                            <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded me-2"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end m-0">
                                                                <a href="{{ route('view_detail', ['id' => $item->id]) }}"
                                                                    class="dropdown-item">View</a>
                                                                <button type="button" class="dropdown-item"
                                                                    title="delete"
                                                                    data-delete-url="{{ route('delete_product', ['id' => $item->id]) }}"
                                                                    data-toggle="modal" data-target="#deleteModal">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row mx-2">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                aria-live="polite">Displaying {{ $products->firstItem() }} to
                                                {{ $products->lastItem() }} of {{ $products->total() }} entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                id="DataTables_Table_0_paginate">
                                                <ul class="pagination justify-content-end">
                                                    @if ($products->currentPage() == 1)
                                                        <li class="page-item disabled">
                                                            <a class="page-link">Previous</a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{{ $products->previousPageUrl() }}">Previous</a>
                                                        </li>
                                                    @endif

                                                    @for ($page = 1; $page <= $products->lastPage(); $page++)
                                                        <li
                                                            class="paginate_button page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                                                            <a href="{{ $products->url($page) }}"
                                                                class="page-link">{{ $page }}</a>
                                                        </li>
                                                    @endfor

                                                    @if ($products->currentPage() == $products->lastPage())
                                                        <li class="page-item disabled">
                                                            <a class="page-link">Next</a>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a href="{{ $products->nextPageUrl() }}"
                                                                class="page-link">Next</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 1%;"></div>
                                    <div style="width: 1%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    @include('products.modal.add_new_product')
    @include('products.modal.delete_product')
    <script src="{{ asset('js/product_manage.js') }}"></script>
@endsection
