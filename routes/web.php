<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductionController;
use App\Http\Controllers\Admin\QcController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckOutController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// First Landing Page
Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/category', [UserController::class, 'category'])->name('category');
Route::get('/category/{name}', [UserController::class, 'categoryview'])->name('categoryview');
Route::get('/category/{name}/{slug}', [UserController::class, 'productview'])->name('productview');


// User Landing Page
Route::middleware(['auth'])->group(function (){

    // Cart
    Route::post('/add-to-cart', [CartController::class, 'addProduct']);
    Route::get('/cart', [CartController::class, 'viewcart'])->name('cart');
    Route::post('/delete-cart-item', [CartController::class, 'deleteProduct']);
    Route::post('/update-cart', [CartController::class, 'updatecart']);

    // Checkout & Orders
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('/place-order', [CheckOutController::class, 'placeorder']);
    Route::get('/myorders', [OrderController::class, 'order'])->name('myorders');

    // Payment
    Route::get('/payment/edit/{order_id}', [PaymentController::class, 'edit'])->name(('payment.edit'));
    Route::put('/payment/update/{order_id}', [PaymentController::class, 'update'])->name(('payment.update'));
});


// Admin Landing Page (Dashboard)
Route::prefix('/admin')->middleware('auth', 'isAdmin')->group(function() {
    Route::get('/',[DashboardController::class, 'Chart'])->name('admin.dashboard');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/add', [CategoryController::class, 'add'])->name('admin.category.add');
    Route::post('/category/save', [CategoryController::class, 'save'])->name(('admin.category.save'));
    Route::get('/category/edit/{cat_id}', [CategoryController::class, 'edit'])->name(('admin.category.edit'));
    Route::put('/category/update/{cat_id}', [CategoryController::class, 'update'])->name(('admin.category.update'));
    Route::get('/category/delete/{cat_id}', [CategoryController::class, 'delete'])->name(('admin.category.delete'));

    // Catalog
    Route::get('/catalog', [CatalogController::class, 'catalog'])->name('admin.catalog');
    Route::get('/catalog/add', [CatalogController::class, 'add'])->name('admin.catalog.add');
    Route::post('/catalog/save', [CatalogController::class, 'save'])->name(('admin.catalog.save'));
    Route::get('/catalog/edit/{catalog_id}', [CatalogController::class, 'edit'])->name(('admin.catalog.edit'));
    Route::put('/catalog/update/{catalog_id}', [CatalogController::class, 'update'])->name(('admin.catalog.update'));
    Route::get('/catalog/delete/{catalog_id}', [CatalogController::class, 'delete'])->name(('admin.catalog.delete'));


    // Production
    Route::get('/production', [ProductionController::class, 'production'])->name('admin.production');
    Route::get('/production/add', [ProductionController::class, 'add'])->name('admin.production.add');
    Route::post('/production/save', [ProductionController::class, 'save'])->name(('admin.production.save'));
    Route::get('/production/edit/{production_id}', [ProductionController::class, 'edit'])->name(('admin.production.edit'));
    Route::put('/production/update/{production_id}', [ProductionController::class, 'update'])->name(('admin.production.update'));
    Route::get('/production/delete/{production_id}', [ProductionController::class, 'delete'])->name(('admin.production.delete'));

    // Quality Control
    Route::get('/quality-control', [QcController::class, 'qualitycontrol'])->name('admin.qualitycontrol');
    Route::get('/quality-control/lolos/{production_id}', [QcController::class, 'lolos'])->name(('admin.qualitycontrol.lolos'));
    Route::get('/quality-control/tidaklolos/{production_id}', [QcController::class, 'tidaklolos'])->name(('admin.qualitycontrol.tidaklolos'));


    // Inventory
    Route::get('/inventory', [InventoryController::class, 'inventory'])->name('admin.inventory');

    // Shipping (ganti jadi order)
    Route::get('/order', [ShippingController::class, 'order'])->name('admin.order');
    Route::get('/order/edit/{order_id}', [ShippingController::class, 'edit'])->name(('admin.order.edit'));
    Route::put('/order/update/{order_id}', [ShippingController::class, 'update'])->name(('admin.order.update'));

});
