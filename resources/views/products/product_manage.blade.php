@extends('home.layouts')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/product_manage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <script src="{{ asset('js/product_manage/add_product_modal.js') }}"></script>
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
@endsection
