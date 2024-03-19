<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\CrudProductController;
use App\Http\Controllers\CrudPurchaseController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileCsvController;
use App\Http\Controllers\PurcharseManage;

Route::get('/register', [RegistrationController::class, 'display'])->name('authentication.register');
Route::post('/handle-register', [RegistrationController::class, 'store'])->name('handle_register');
Route::get('/actived/{user}/{token}', [RegistrationController::class, 'actived'])->name('actived');
Route::get('/get-actived', [RegistrationController::class, 'get_actived'])->name('get_actived');
Route::post('/post-get', [RegistrationController::class, 'post_get']);

Route::get('/', [LoginController::class, 'display'])->name('authentication.login');
Route::post('/handle-login', [LoginController::class, 'handle_login']);

Route::get('/forget-password', [LoginController::class, 'forget_pass'])->name('forget_password');
Route::post('/handle-forget', [LoginController::class, 'handle_forget']);
Route::get('/get-password/{user}/{token}', [LoginController::class, 'get_pass'])->name('get_password');
Route::post('/handle-get/{user}/{token}', [LoginController::class, 'handle_get']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'display'])->name('home');
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('/product-manage', [HomeController::class, 'product_manage'])->name('product_manage');
    Route::get('/purchase-manage', [HomeController::class, 'purchase_manage'])->name('purchase_manage');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/search', [CrudProductController::class, 'search'])->name('search');

    Route::post('/add-product', [CrudProductController::class, 'add_product'])->name('add_product');

    Route::get('/product-manage/view-detail/{id}', [CrudProductController::class, 'view_detail'])->name('view_detail');

    Route::get('/product-manage/edit-product/{id}', [CrudProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/handle-edit/{id}', [CrudProductController::class, 'handle_edit'])->name('handle_edit');

    Route::delete('/delete/{id}', [CrudProductController::class, 'delete_product'])->name('delete_product');

    Route::get('/export-products', [FileCsvController::class, 'export_products'])->name('export_products');
    Route::post('import-products', [FileCsvController::class, 'import_products'])->name('import_products');

    Route::get('/print-barcode/{id}', [BarcodeController::class, 'print_barcode'])->name('print_barcode');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/purchase-manage/view-detail/{id}', [PurcharseManage::class, 'view_detail'])->name('view_detail_1');
    Route::get('/get-category/{id}', [PurcharseManage::class, 'get_category']);

    Route::post('/add-purchase', [CrudPurchaseController::class, 'add_purchase'])->name('add_purchase');
    Route::get('/detail-purchase/{id}', [CrudPurchaseController::class, 'detail_purchase'])->name('detail_purchase');
    Route::post('/purchase/{purchase_id}/add-product', [CrudPurchaseController::class, 'add_product_to_purchase'])->name('purchase_addProduct');
    Route::delete('/delete-purchase/{id}', [CrudPurchaseController::class, 'delete_purchase'])->name('delete_purchase');
    Route::post('/delete-product-purchase/{ids}', [CrudPurchaseController::class, 'delete_product_to_purchase'])->name('purchase_deleteProduct');
    Route::post('/payment/{id}', [CrudPurchaseController::class, 'payment'])->name('payment');
});