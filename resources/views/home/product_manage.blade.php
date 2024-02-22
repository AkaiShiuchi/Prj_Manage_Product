@extends('home.layouts')

@section('title', 'Home')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/product_manage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/add_modal.css') }}">
@endsection

@section('content')
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/home">MyShop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/product-manage">Product Manage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Purchases Manage</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="justify-content-center row">
            <div class="col-lg-12">
                <div class="candidate-list-widgets mb-4">
                    <form action="#" class="">
                        <div class="g-2 row">
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-briefcase-alt"></i><input id="exampleFormControlInput1"
                                        placeholder="Product name... " type="search"
                                        class="form-control filler-job-input-box form-control" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="filler-job-form">
                                    <i class="uil uil-location-point"></i>
                                    <select class="form-select selectForm__inner" data-trigger="true"
                                        name="choices-single-location" id="choices-single-location"
                                        aria-label="Default select example">
                                        <option value="AF">Đồ gia dụng</option>
                                        <option value="AX">Máy tính</option>
                                        <option value="AL">Phụ kiện</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div>
                                    <a class="btn btn-primary" href="#"><i class="uil uil-filter"></i>
                                        Filter
                                    </a>
                                    <a class="btn btn-success ms-5" href="#"><i class="uil uil-cog"></i>
                                        Import
                                    </a>
                                    <a class="btn btn-success ms-2" href="#"><i class="uil uil-cog"></i>
                                        Export
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="align-items-center row">
                    <div class="col-lg-7">
                        <div class="mb-3 mb-lg-0">
                            <h6 class="fs-16 mb-0">Showing 1 – 8 of 11 results</h6>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="mt-2 mt-lg-0 text-center">
                            <button type="button" class="btn btn-info" title="Add New" data-toggle="modal"
                                data-target="#addNewModal">
                                Thêm
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="candidate-list-widgets">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="selection-widget">
                                        <select class="form-select" data-trigger="true" name="choices-single-filter-orderby"
                                            id="choices-single-filter-orderby" aria-label="Default select example">
                                            <option value="df">Default</option>
                                            <option value="ne">Newest</option>
                                            <option value="od">Oldest</option>
                                            <option value="rd">Random</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="selection-widget mt-2 mt-lg-0">
                                        <select class="form-select" data-trigger="true" name="choices-candidate-page"
                                            id="choices-candidate-page" aria-label="Default select example">
                                            <option value="df">All</option>
                                            <option value="ne">8 per Page</option>
                                            <option value="ne">12 per Page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="candidate-list">
                    <div class="candidate-list-box card mt-4">
                        <div class="p-4 card-body">
                            <div class="align-items-center row">
                                @foreach ($products as $item)
                                    <div class="col-auto">
                                        <div class="candidate-list-images">
                                            <a href="#"><img src="{{ asset('storage/uploads/' . $item->image) }}"
                                                    alt="Product Image"
                                                    class="avatar-md img-thumbnail rounded-circle" /></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="candidate-list-content mt-3 mt-lg-0">
                                            <h5 class="fs-19 mb-0">
                                                <a class="primary-link" href="#">{{ $item->name }}</a>
                                            </h5>
                                            <p class="text-muted mb-2">{{ $item->description }}</p>
                                            <ul class="list-inline mb-0 text-muted">
                                                <li class="list-inline-item"><i
                                                        class="mdi mdi-map-marker"></i>{{ $item->id }}
                                                </li>
                                                <li class="list-inline-item"><i
                                                        class="mdi mdi-wallet"></i>{{ $item->price }}</li>
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
                                            <a class="btn btn-warning" href="#"><i class="uil uil-filter"></i>
                                                Sửa
                                            </a>
                                            <a class="btn btn-danger" href="#"><i class="uil uil-filter"></i>
                                                Xóa
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-4 pt-2 col-lg-12">
                <nav aria-label="Page navigation example">
                    <div class="pagination job-pagination mb-0 justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" tabindex="-1" href="#"><i
                                    class="mdi mdi-chevron-double-left fs-15"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="mdi mdi-chevron-double-right fs-15"></i></a>
                        </li>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @include('home.modal.add_new_product')
@endsection
