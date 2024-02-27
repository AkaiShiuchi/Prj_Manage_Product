@extends('products.edit_layout')

@section('title', 'Edit Product')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/edit_product.css') }}">
@endsection

@section('content')
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0">Edit</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Product picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Product Picture</div>
                    <div class="card-body text-center">
                        <!-- Product picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="{{ asset('storage/uploads/' . $product->image) }}" alt="Product Image">
                        <!-- Product picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Product picture upload button-->
                        <label for="fileInput" class="btn btn-primary">Upload New Image</label>
                        <input id="fileInput" type="file" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Product Details</div>
                    <div class="card-body">
                        <form action="{{ route('handle_edit', ['id' => $product->id]) }}", method="POST">
                            @csrf
                            <!-- Form Group (product_name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="product_name">Product name</label>
                                <input class="form-control" id="product_name" type="text" name="product_name"
                                    placeholder="Enter product name" value="{{ $product->name }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Total)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="total">Total available</label>
                                    <input class="form-control" id="total" type="number" name="total"
                                        placeholder="Enter your total available" value="{{ $product->total }}">
                                </div>
                                <!-- Form Group (Price)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="price">Price</label>
                                    <input class="form-control" id="price" type="text" placeholder="Enter your price"
                                        name="price" value="{{ $product->price }}">
                                </div>
                            </div>
                            <!-- Form Group (Describe)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="describe">Description</label>
                                <input class="form-control" id="describe" type="text" placeholder="Enter your describe"
                                    name="describe" value="{{ $product->describe }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Categories)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="category">Categories</label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="1">Đồ gia dụng</option>
                                        <option value="2">Máy tính</option>
                                        <option value="3">Phụ kiện</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <a href="{{ route('product_manage') }}" class="btn btn-secondary">Cancel</a>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
