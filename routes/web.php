<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Purchase\PurchaseController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login', [LoginController::class, 'loginView'])->name('login.view');
Route::get('/user-login', [LoginController::class, 'userLogin']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/add-product-view', [ProductController::class, 'productView'])->name('product.view');
Route::get('/edit-product-view', [ProductController::class, 'editView']);
Route::post('/add-medicine', [ProductController::class, 'addMedicine']);
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product.view');
Route::post('/update-medicine', [ProductController::class, 'updateProduct']);
Route::get('/expired-list', [ProductController::class, 'expritedList'])->name('expired.list.view');
Route::get('/print-expired-list', [ProductController::class, 'printExpiredList']);
Route::get('/expired-list-6-month', [ProductController::class, 'ExpritedListSixMont'])->name('expired.list.180.days.view');
Route::get('/print-expired-list-6-month', [ProductController::class, 'printExpiredListSixMonth']);

Route::get('/cart-view', [CartController::class, 'cartView']);
Route::get('/add-to-cart', [CartController::class, 'addCart']);
Route::get('/remove-to-cart/{id}/{reg}', [CartController::class, 'removeCart']);
Route::post('/cart/update-quantity', [CartController::class, 'updateQty']);

Route::post('/confirm-order', [SaleController::class, 'confirmOrder']);
Route::get('/specific-order-print/{reg}', [SaleController::class, 'printOrder']);
Route::post('/due-collection/{reg}', [SaleController::class, 'dueCollection']);

Route::get('/order-list', [OrderController::class, 'orderList'])->name('order.list');
Route::get('/print-all-order', [OrderController::class, 'printOrder']);
Route::get('/view-order/{reg}', [OrderController::class, 'showOrderItem']);
Route::get('/order-return-confirm/{reg}', [OrderController::class, 'orderCancel']);
Route::get('/return-list', [OrderController::class, 'returnView'])->name('return.view');

Route::get('/make-purchase-order', [PurchaseController::class, 'purchaseOrderView'])->name('purchase.order.view');
Route::get('/add-to-purchase-cart', [PurchaseController::class, 'addToCart']);
Route::post('/purchase/cart/update-quantity', [PurchaseController::class, 'updateQty']);
Route::get('/remove-to-purchase-cart/{id}/{reg}', [PurchaseController::class, 'removeCart']);
Route::post('/confirm-purchase-order', [PurchaseController::class, 'confirmOrder']);
Route::get('/specific-purchase-order-print/{reg}', [PurchaseController::class, 'printPurchaseOrder']);
Route::get('/purchase-order-list', [PurchaseController::class, 'purchaseOrderlist'])->name('purchase.order.list');
Route::get('/specific-purchase-order-print/{reg}', [PurchaseController::class, 'printPurchaseOrderSpecific']);
Route::get('/view-purchase-order/{reg}', [PurchaseController::class, 'viewPurchaseOrder']);
Route::get('/purchase-order-cancel/{reg}', [PurchaseController::class, 'cancelOrder']);
Route::get('/purchase-order-delivery/{reg}', [PurchaseController::class, 'deliveryView']);
Route::post('/confirm-purchase-order-qty', [PurchaseController::class, 'confirmQtyOrder']);
Route::get('/purchase-order-confirm/{reg}', [PurchaseController::class, 'deliveryComplete']);
Route::get('/complete-purchase-order', [PurchaseController::class, 'completeOrder'])->name('complete.order.view');
Route::get('/purchase-bill-pay/{reg}', [PurchaseController::class, 'payBill'])->name('purchase.order.bill.pay.view');
Route::post('/purchase-pay', [PurchaseController::class, 'billPay']);
Route::get('/payment-list', [PurchaseController::class, 'paymentList'])->name('payment.list.view');
Route::post('/due-pay-purchase-order', [PurchaseController::class, 'duePay']);