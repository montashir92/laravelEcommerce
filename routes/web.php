<?php

use Illuminate\Support\Facades\Route;

//frontend
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartsController;
use App\Http\Controllers\Frontend\CheckoutsController;
use App\Http\Controllers\Frontend\DashboardsController;

//backend
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\ProfilesController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\DivisionsController;
use App\Http\Controllers\Backend\DistrictsController;
use App\Http\Controllers\Backend\SlidersController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\CustomersController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contacts');

//Product Routes for Frontend
Route::prefix(md5('products'))->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/new/search', [PagesController::class, 'search'])->name('product.search');
    
    //Category Product for Frontend
    Route::get('/categories/{id}', [ProductController::class, 'categoryProduct'])->name('categories.show');
    //Brand Product for Frontend
    Route::get('/brands/{id}', [ProductController::class, 'brandProduct'])->name('brands.show');
});

//Cart Routes
Route::prefix(md5('carts'))->group(function(){
    Route::get('/', [CartsController::class, 'index'])->name('carts');
    Route::post('/store', [CartsController::class, 'store'])->name('cart.store');
    Route::post('/update/{id}', [CartsController::class, 'update'])->name('cart.update');
    Route::get('/delete/{id}', [CartsController::class, 'delete'])->name('cart.delete');
});

//Customer Signup Process
Route::get('/customer-login', [CheckoutsController::class, 'index'])->name('customer.login');
Route::get('/customer-signup', [CheckoutsController::class, 'signup'])->name('customer.signup');
Route::post('/signup-store', [CheckoutsController::class, 'store'])->name('customer.signup.store');
Route::get('/get-district', [CheckoutsController::class, 'getDistrict'])->name('get.district');
Route::get('/email-verify', [CheckoutsController::class, 'emailVerify'])->name('customer.email.verify');
Route::post('/verify-store', [CheckoutsController::class, 'verifyStore'])->name('customer.email.verify.store');
Route::get('/checkouts', [CheckoutsController::class, 'checkout'])->name('customer.checkout');
Route::post('/checkout/store', [CheckoutsController::class, 'checkoutStore'])->name('customer.checkout.store');


Auth::routes();

//Customer Dashboard Routes
Route::group(['middleware' => ['auth', 'customer']], function(){
    Route::get('/dashboard', [DashboardsController::class, 'index'])->name('customer.dashboard');
    Route::get('/edit-profile', [DashboardsController::class, 'edit'])->name('customer.edit.profile');
    Route::post('/update-profile', [DashboardsController::class, 'update'])->name('customer.update.profile');
    Route::get('/customer-change-password', [DashboardsController::class, 'changePassword'])->name('customer.change.password');
    Route::post('/customer-update-password', [DashboardsController::class, 'updatePassword'])->name('customer.update.password');
    Route::get('/customer-order-list', [DashboardsController::class, 'orderList'])->name('customer.order.list');
    Route::get('/order-details/{id}', [DashboardsController::class, 'orderDetails'])->name('customer.order.details');
    
});

//Admin Dashboard Routes
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    
    //User Routes
    Route::prefix('users')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/store', [UsersController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::post('/user/delete', [UsersController::class, 'delete'])->name('users.delete');
    });
    
    //User Profile Routes
    Route::prefix('profiles')->group(function(){
        Route::get('/', [ProfilesController::class, 'index'])->name('user.profiles.index');
        Route::get('/edit', [ProfilesController::class, 'edit'])->name('user.profile.edit');
        Route::post('/update', [ProfilesController::class, 'update'])->name('user.profile.update');
        Route::get('/user/change-password', [ProfilesController::class, 'changePassword'])->name('user.change.password');
        Route::post('/user/update-password', [ProfilesController::class, 'updatePassword'])->name('user.update.password');
    });
    
    //Customer Routes
    Route::prefix('customers')->group(function(){
        Route::get('/', [CustomersController::class, 'index'])->name('customers.show');
        Route::get('/draft/view', [CustomersController::class, 'draftShow'])->name('customers.draft.show');
        Route::post('/customer/delete', [CustomersController::class, 'delete'])->name('customers.draft.delete');
    });
    
    //Category Routes
    Route::prefix('categories')->group(function(){
        Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
        Route::post('/user/delete', [CategoriesController::class, 'delete'])->name('categories.delete');
    });
    
    //Brand Routes
    Route::prefix('brands')->group(function(){
        Route::get('/', [BrandsController::class, 'index'])->name('brands.index');
        Route::get('/create', [BrandsController::class, 'create'])->name('brands.create');
        Route::post('/store', [BrandsController::class, 'store'])->name('brands.store');
        Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('brands.edit');
        Route::post('/update/{id}', [BrandsController::class, 'update'])->name('brands.update');
        Route::post('/brand/delete', [BrandsController::class, 'delete'])->name('brands.delete');
    });
    
    //Product Routes
    Route::prefix('products')->group(function(){
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductsController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::post('/update/{id}', [ProductsController::class, 'update'])->name('products.update');
        Route::post('/product/delete', [ProductsController::class, 'delete'])->name('products.delete');
    });
    
    //Division Routes
    Route::prefix('divisions')->group(function(){
        Route::get('/', [DivisionsController::class, 'index'])->name('divisions.index');
        Route::get('/create', [DivisionsController::class, 'create'])->name('divisions.create');
        Route::post('/store', [DivisionsController::class, 'store'])->name('divisions.store');
        Route::get('/edit/{id}', [DivisionsController::class, 'edit'])->name('divisions.edit');
        Route::post('/update/{id}', [DivisionsController::class, 'update'])->name('divisions.update');
        Route::post('/division/delete', [DivisionsController::class, 'delete'])->name('divisions.delete');
    });
    
    //District Routes
    Route::prefix('districts')->group(function(){
        Route::get('/', [DistrictsController::class, 'index'])->name('districts.index');
        Route::get('/create', [DistrictsController::class, 'create'])->name('districts.create');
        Route::post('/store', [DistrictsController::class, 'store'])->name('districts.store');
        Route::get('/edit/{id}', [DistrictsController::class, 'edit'])->name('districts.edit');
        Route::post('/update/{id}', [DistrictsController::class, 'update'])->name('districts.update');
        Route::post('/district/delete', [DistrictsController::class, 'delete'])->name('districts.delete');
    });
    
    //Slider Routes
    Route::prefix('sliders')->group(function(){
        Route::get('/', [SlidersController::class, 'index'])->name('sliders.index');
        Route::post('/store', [SlidersController::class, 'store'])->name('sliders.store');
        Route::post('/update/{id}', [SlidersController::class, 'update'])->name('sliders.update');
        Route::post('/slider/delete', [SlidersController::class, 'delete'])->name('sliders.delete');
    });
    
    //Order Routes
    Route::prefix('orders')->group(function(){
        Route::get('/', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/show/{id}', [OrdersController::class, 'show'])->name('orders.show');
        Route::post('/charge/update/{id}', [OrdersController::class, 'updateCharge'])->name('orders.update.charge');
        Route::post('/complete/{id}', [OrdersController::class, 'completed'])->name('orders.complete');
        Route::post('/paid/{id}', [OrdersController::class, 'paid'])->name('orders.paid');
        Route::get('/invoice/{id}', [OrdersController::class, 'invoice'])->name('orders.invoice');
        Route::post('/order/delete', [OrdersController::class, 'delete'])->name('orders.delete');
    });
    
});

