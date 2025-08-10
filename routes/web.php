<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Sale\SaleReportController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Purchase\PurchaseReturnController;
use App\Http\Controllers\Purchase\PurchaseReportController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Expenses\ExpensesReportController;
use App\Http\Controllers\Stock\StockController;

Auth::routes();

Route::get('/login', [LoginController::class, 'loginView'])->name('login.view');
Route::get('/user-login', [LoginController::class, 'userLogin']);
Route::get('/new-account-create-view', [LoginController::class, 'createAccountView'])->name('new.account.create.view');
Route::post('/create-new-account', [LoginController::class, 'createNewAccount']);

Route::group(['middleware' => ['admin']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/clear-all', [AdminController::class, 'ClearAll']);
    Route::get('/backup-database', [AdminController::class, 'backUp']);

    Route::get('/profile', [UserController::class, 'profile'])->name('profile.view');
    Route::get('/edit-profile/{id}', [UserController::class, 'editView']);
    Route::post('/update-profile/{id}', [UserController::class, 'updateProfile']);
    Route::get('/change-password', [UserController::class, 'passView']);
    Route::post('/change-password/{id}', [UserController::class, 'changePass']);

    Route::get('/add-product-view', [ProductController::class, 'productView'])->name('product.view');
    Route::get('/edit-product-view', [ProductController::class, 'editView']);
    Route::post('/add-medicine', [ProductController::class, 'addMedicine']);
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit.product.view');
    Route::post('/update-medicine', [ProductController::class, 'updateProduct']);
    Route::get('/expired-list', [ProductController::class, 'expritedList'])->name('expired.list.view');
    Route::get('/print-expired-list', [ProductController::class, 'printExpiredList']);
    Route::get('/expired-list-6-month', [ProductController::class, 'ExpritedListSixMont'])->name('expired.list.180.days.view');
    Route::get('/print-expired-list-6-month', [ProductController::class, 'printExpiredListSixMonth']);
    Route::get('/damage-product', [ProductController::class, 'damageProduct'])->name('damage.product.view');
    Route::get('/live-search-order', [ProductController::class, 'liveSearchOrder']);

    Route::get('/cart-view', [CartController::class, 'cartView']);
    Route::get('/add-to-cart', [CartController::class, 'addCart']);
    Route::get('/remove-to-cart/{id}/{reg}', [CartController::class, 'removeCart']);
    Route::post('/cart/update-quantity', [CartController::class, 'updateQty']);

    Route::post('/confirm-order', [SaleController::class, 'confirmOrder']);
    Route::get('/specific-order-print/{reg}', [SaleController::class, 'printOrder']);
    Route::post('/due-collection/{reg}', [SaleController::class, 'dueCollection']);

    Route::get('/sale-report', [SaleReportController::class, 'saleReport'])->name('current.date.wise.sale.report');
    Route::get('/filter-date-wise-sale-report', [SaleReportController::class, 'filterDateWiseSaleReport']);
    Route::get('/product-sale-report', [SaleReportController::class, 'productAndDateSaleReport']);
    Route::get('/filter-date-wise-product-sale-report', [SaleReportController::class, 'dateWiseProductSaleReport']);
    Route::get('/date-wise-product-sale-report', [SaleReportController::class, 'dateWiseProductReport']);
    Route::get('/filter-date-wise-product-report', [SaleReportController::class, 'dateWiseSaleProductReport']);
    Route::get('/sale-return-report', [SaleReportController::class, 'saleReturnReport'])->name('sale.return.report.view');
    Route::get('/filter-date-wise-sale-return-report', [SaleReportController::class, 'filterSaleReturnReport']);
    Route::get('/sale-profit-report', [SaleReportController::class, 'SaleProfitReport'])->name('sale.report.profit.view');
    Route::get('/filter-date-wise-sale-profit', [SaleReportController::class, 'filterSaleReportProfit']);
    Route::get('/sale-profit-report-by-specified-order', [SaleReportController::class, 'specificSaleProfitReport'])->name('every.order.profit.report.view');
    Route::get('/user-sale-report', [SaleReportController::class, 'userSaleReport'])->name('user.wise.sale.report');
    Route::get('/filter-user-wise-sale-report', [SaleReportController::class, 'filterUserSaleReport']);

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
    Route::get('/specific-purchase-order-print-make/{reg}', [PurchaseController::class, 'printPurchaseOrderSpecific']);
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
    Route::get('/print-specific-purchase-pay-order/{reg}', [PurchaseController::class, 'printPaymentOrder']);
    Route::get('/cancel-purchase-order-list', [PurchaseController::class, 'cancelOrderList'])->name('purchase.order.cancel.list.view');
    Route::get('/print/purchase/order/list', [PurchaseController::class, 'printPurchaseOrderList']);
    Route::get('/print/complete/purchase/order', [PurchaseController::class, 'printCompletePurchaseOrder']);
    Route::get('/print/payment/order/list', [PurchaseController::class, 'printPaymentList']);
    Route::get('/print/cancel/order/list', [PurchaseController::class, 'printCancelOrder']);
    Route::get('/purchase-due', [PurchaseController::class, 'purchaseDue'])->name('purchase.due.list.and.collection.view');
    Route::post('/purchase-due-payment', [PurchaseController::class, 'purchaseDuePayment']);
    Route::get('/print/purchase/due/list', [PurchaseController::class, 'printPurchaseDueList']);

    Route::get('/purchase-return', [PurchaseReturnController::class, 'purchaseReturn'])->name('purchase.return.view');
    Route::get('/find-purchase-medicine/{reg}', [PurchaseReturnController::class, 'findPurchaseMedicine'])->name('view.purchase.order.medicine');
    Route::post('/return-qty', [PurchaseReturnController::class, 'returnQty']);
    Route::post('/purchase-return-payment', [PurchaseReturnController::class, 'returnPayment']);
    Route::get('/print-purchase-return-invoice/{reg}', [PurchaseReturnController::class, 'printReturn']);

    Route::get('/purchase-report', [PurchaseReportController::class, 'totalPurchase'])->name('total.purchase.report.view');
    Route::get('/search-purchase-order', [PurchaseReportController::class, 'searchPurchaseOrder']);
    Route::get('/print/purchase/order/list/report', [PurchaseReportController::class, 'printPurchaseReport']);
    Route::get('/purchase-delivery-report', [PurchaseReportController::class, 'purchaseDeliveryReport'])->name('purchase.delivery.report.view');
    Route::get('/print/purchase/order/delivery/report', [PurchaseReportController::class, 'printPurchaseDeliveryReport']);
    Route::get('/search-purchase-delivery-report', [PurchaseReportController::class, 'searchPurchaseDeliveryReport']);
    Route::get('/purchase-payment-report', [PurchaseReportController::class, 'paymentCompleteReport']);
    Route::get('/print/purchase/order/payment/report', [PurchaseReportController::class, 'printPaymentCompleteReport']);
    Route::get('/search-purchase-payment-report', [PurchaseReportController::class, 'searchPaymentCompleteReport']);
    Route::get('/purchase-cancel-report', [PurchaseReportController::class, 'cancelPurchaseReport']);
    Route::get('/print/purchase/order/cancel/report', [PurchaseReportController::class, 'printCancelPurchaseReport']);
    Route::get('/search-purchase-cancel-report', [PurchaseReportController::class, 'searchCancelPurchaseReport']);
    Route::get('/purchase-return-report', [PurchaseReportController::class, 'returnPurchaseReport']);
    Route::get('/print/purchase/order/return/report', [PurchaseReportController::class, 'printReturnPurchaseReport']);
    Route::get('/search-purchase-return', [PurchaseReportController::class, 'searchPurchaseReturnReport']);
    Route::get('/purchase-supplier-report', [PurchaseReportController::class, 'SupplierReport']);
    Route::get('/print/supplier/purchase/report', [PurchaseReportController::class, 'printSuppierReport']);
    Route::get('/search-supplier-purchase', [PurchaseReportController::class, 'findSupplierReport']);
    Route::get('/purchase-user-report', [PurchaseReportController::class, 'userReport']);
    Route::get('/search-user-purchase', [PurchaseReportController::class, 'findUserReport']);
    Route::get('/print/user/purchase/report', [PurchaseReportController::class, 'printUserReport']);

    Route::get('/expenses', [ExpensesController::class, 'expenses'])->name('expenses.view');
    Route::get('/getSubCategory/{id}', [ExpensesController::class, 'getSubCategory']);
    Route::post('/daily-expenses', [ExpensesController::class, 'dailyExpenses']);
    Route::get('/edit-expenses/{id}', [ExpensesController::class, 'editExpenses'])->name('edit.expenses.view');
    Route::post('/update-expenses/{id}', [ExpensesController::class, 'updateExpenses']);
    Route::get('/specific-expenses-list-print/{id}', [ExpensesController::class, 'printExpensesSpecific']);
    Route::get('/expenses-setting', [ExpensesController::class, 'exSetting'])->name('expenses.setting.view');
    Route::post('/add-new-category', [ExpensesController::class, 'addExCategory']);
    Route::post('/add-new-sub-category', [ExpensesController::class, 'addExSubCategory']);
    Route::get('/print-daily-expenses', [ExpensesController::class, 'printDailyExpenses']);
    Route::get('/update-ex-category', [ExpensesController::class, 'updateExCat']);
    Route::get('/update-ex-sub-category', [ExpensesController::class, 'updateExSubCat']);

    Route::get('/expenses-report', [ExpensesReportController::class, 'expensesReport'])->name('total.expenses.view');
    Route::get('/filter-expenses-report', [ExpensesReportController::class, 'filterExpensesReport']);
    Route::get('/print-total-expenses-report',[ExpensesReportController::class, 'printExpensesReport']);
    Route::get('/category-expenses-report', [ExpensesReportController::class, 'categoryExpensesReport'])->name('category.wise.expenses.report.view');
    Route::get('/filter-category-expenses-report', [ExpensesReportController::class, 'filterCategoryExpensesReport']);
    Route::get('/sub-category-expenses-report', [ExpensesReportController::class, 'subCatExpense'])->name('sub-category.wise.report.view');
    Route::get('/filter-sub-category-expenses-report', [ExpensesReportController::class, 'filterSubCatExpenseReport']);
    Route::get('/user-expenses-report', [ExpensesReportController::class, 'userExpensesReport'])->name('user.wise.expenses.report');
    Route::get('/filter-user-expenses-report', [ExpensesReportController::class, 'filterUserExpensesReport']);

    Route::get('/total-stock', [StockController::class, 'totalStock'])->name('total.stock.view');
    Route::get('/print/total/stock/report', [StockController::class, 'printStock']);
    Route::get('/category-stock', [StockController::class, 'categoryStock'])->name('category.wise.stock.report.view');
    Route::get('search-category-stock-report', [StockController::class, 'filterCategoryStock']);
    Route::get('/brank-stock', [StockController::class, 'brandStock'])->name('brand.wise.stock.view');
    Route::get('/search-brand-stock-report', [StockController::class, 'brandFilterStock']);
    Route::get('/product-stock', [StockController::class, 'productStock'])->name('product.stock.report');
    Route::get('/search-product-stock-report', [StockController::class, 'filterProductStock']);
});