<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;



//
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Customer\SubscriptionController as CustomerSubscriptionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CustomerProductController::class, 'index'])->name('customer.index');


Route::get('/subcription', function(){
    return view('subcription');
});

 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('product')->as('products.')->group(function(){
        Route::get('{product}', [CustomerProductController::class, 'show'])->name('show');
    });

    Route::middleware(['role:admin'])->prefix('admin')->as('admin.')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
        Route::resource('subscriptions', SubscriptionController::class);
    });

    Route::middleware(['role:seller'])->prefix('seller')->as('seller.')->group(function(){
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('index');
    
// report here
Route::get('/report', function(){
    return view('pages.seller.report.index');
})->name('report'); 


        Route::resource('products', ProductController::class);

    });

    Route::middleware(['role:customer|admin'])->prefix('customer')->as('customer.')->group(function(){
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])->name('dashboard');


//  chat here
Route::get('/chat', function(){
    return view('pages.chat.index');
})->name('chat'); 


        Route::prefix('cart')->as('cart.')->group(function(){
            Route::get('', [CartController::class, 'index'])->name('index');
            Route::post('add-to-cart/{product}', [CartController::class, 'addProduct'])->name('add.product');
        });

      

        Route::resource('orders', OrderController::class);

        Route::prefix('products')->as('products.')->group(function(){
            Route::get('{product}/buy-now', [CustomerProductController::class, 'buyNow'])->name('buy-now');
            Route::post('checkout', [CustomerProductController::class, 'checkOut'])->name('checkout');
        });


        Route::middleware(['subscriptionsMiddleware'])->prefix('subscriptions')->as('subscriptions.')->group(function(){
            Route::get('', [CustomerSubscriptionController::class, 'index'])->name('index');
            Route::get('/{subscription}', [CustomerSubscriptionController::class, 'show'])->name('show');
            Route::post('', [CustomerSubscriptionController::class, 'store'])->name('store');
        });

        Route::get('{subscription}/subscribe', [CustomerSubscriptionController::class, 'subscribe'])->name('subscribe');
    });
});




require __DIR__.'/auth.php';
