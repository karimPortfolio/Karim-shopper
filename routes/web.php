<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\payments\StripeController;
use App\Http\Controllers\PaypalController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


//product manage routes
Route::controller(ProductController::class)->group(function ()
{
    Route::get('products/{cat}','index')->name('products');
    Route::get('/','homeProducts')->name('products');
    Route::get("products/{id}/details" , "productDetails")->name("products.details");
    Route::get('dashboard/products' , 'userProductsDashboard')->name('dashboard.products');
    Route::get('dashboard/manageproducts/addproduct' , 'useraddproduct' )->name('dashboard.manageProducts.addproduct');
    Route::post('dashboard/manageproducts/storeproduct', 'userInsertProduct')->name('dashboard.manageProducts.store');
    Route::delete('dashboard/manageProducts/deleteproduct/{id}' , 'userDeleteProduct')->name('dashboard.manageProducts.delete');
    Route::get('dashboard/manageProducts/editproduct/{id}' , 'userEditProduct')->name('dashboard.manageProducts.editproduct');
    Route::post('dashboard/manageProducts/updateproduct/{id}' , 'userUpdateProduct')->name('dashboard.manageProducts.updateproduct');
});

//cart routes
Route::controller(CartController::class)->group( function () {
    Route::get("/cart" , "index")->name("cart");
    Route::post("/cart/add" , "store")->name("cart.add");
    Route::delete("/cart/{id}/destroy" , "destroy")->name("cart.destroy");
});


//search routes

Route::controller(SearchController::class)->group( function () {
    Route::post("/search" , "searchProduct")->name("search");
    Route::get("/search" , "searchProduct")->name("search");
});

//checkout

Route::controller(CheckoutController::class)->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'])->group(function () {
     Route::get("/checkout" , "index");
     Route::get("/checkout/success" , "paymentsSuccess")->name("checkout.thankyou");
});

//paypal
Route::controller(PaypalController::class)->group(function () {
    Route::get("payment" , "payment")->name("payment");
    Route::get("payment/cancel" , "cancel")->name("payment.cancel");
    Route::get("payment/success" , "success")->name("payment.success");
});

//stripe payments
Route::controller(StripeController::class)->group(function () {
    Route::post("payments" , "paymentStripe")->name("addmoney.paymentstripe");
    Route::post('payments/check','postPaymentStripe')->name('addmoney.stripe');
});


//mail
Route::get("/send" , function () {
    Mail::to("benkarim1999@gmail.com")->send(new TestMail);
    return response("Email send with success");
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
});

//dashboard routes
Route::controller(DashboardController::class)->group(function () {
    Route::get("/dashboard" , "dashboardAnalytics")->name("dashboard");
    //handle whishlist products
    Route::get("/dashboard/whishlist" ,"userWhishlist")->name("dashboard.whishlist");
    Route::delete("/dashboard/whishlist/{id}/delete" ,"removeFromWhishlist")->name("dashboard.whishlist.delete");
    //handle ordres
    Route::get("/dashboard/orders" , "userOrders" )->name("dashboard.orders");
});





