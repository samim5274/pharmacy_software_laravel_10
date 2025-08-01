<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Auth;
use App\Models\Order;
use App\Models\Stock;

class SaleReportController extends Controller
{
    public function saleReport(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->paginate(20);
        $total = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('vat');
        return view('sale.report.current-day-wise-sale-report', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function filterDateWiseSaleReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');

        $order = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->paginate(20);
        $total = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('vat');
        if($request->has('print')){
            return view('sale.print.date-wise-sale-report-print', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','start','end'));
        }
        return view('sale.report.current-day-wise-sale-report', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function productAndDateSaleReport(){
        $date = Carbon::now()->format('Ymd');
        $cart = Cart::with('medicine.category')->where('date', $date)->get()->groupBy('medicine_id')
                        ->map(function ($items){
                            return [
                                'product_name' => optional($items->first()->medicine)->name ?? 'Unknown',
                                'total_quantity' => $items->sum('qty'),
                                'total_price' => $items->sum('total_price'),
                            ];
                        });
        $grand_total_qty = $cart->sum('total_quantity');
        $grand_total_price = $cart->sum('total_price');
        return view('sale.report.product-and-day-wise-sale-report', compact('cart','grand_total_qty','grand_total_price'));
    }

    public function dateWiseProductSaleReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $medicine = $request->input('product','');

        $cartQuery = Cart::with('medicine.category')->whereBetween('date', [$start, $end]);

        if ($medicine) {
            $cartQuery->whereHas('medicine', function($q) use ($medicine) {
                $q->where('name', 'LIKE', '%' . $medicine . '%');
            });
        }

        
        $cart = $cartQuery->get()
                ->groupBy('medicine_id')
                ->map(function ($items){
                    return [
                        'product_name'   => optional($items->first()->medicine)->name ?? 'Unknown',
                        'total_quantity' => $items->sum('qty'),
                        'total_price'    => $items->sum('total_price'),
                    ];
                });

        $grand_total_qty = $cart->sum('total_quantity');
        $grand_total_price = $cart->sum('total_price');

        if($request->has('print')){
            return view('sale.print.product-and-day-wise-sale-print', compact('cart','grand_total_qty','grand_total_price','start','end'));
        }
        return view('sale.report.product-and-day-wise-sale-report', compact('cart','grand_total_qty','grand_total_price'));
    }

    public function dateWiseProductReport(){
        $date = Carbon::now()->format('Ymd');
        $cart = Cart::with('medicine.category')->where('date', $date)->get()->groupBy('medicine_id')
                        ->map(function ($items){
                            return [
                                'product_name' => optional($items->first()->medicine)->name ?? 'Unknown',
                                'total_quantity' => $items->sum('qty'),
                                'total_price' => $items->sum('total_price'),
                            ];
                        });
        $grand_total_qty = $cart->sum('total_quantity');
        $grand_total_price = $cart->sum('total_price');
        return view('sale.report.day-wise-product-sale-report', compact('cart','grand_total_qty','grand_total_price'));
    }

    public function dateWiseSaleProductReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');

        $cartQuery = Cart::with('medicine.category')->whereBetween('date', [$start, $end]);
        
        $cart = $cartQuery->get()
                ->groupBy('medicine_id')
                ->map(function ($items){
                    return [
                        'product_name'   => optional($items->first()->medicine)->name ?? 'Unknown',
                        'total_quantity' => $items->sum('qty'),
                        'total_price'    => $items->sum('total_price'),
                    ];
                });

        $grand_total_qty = $cart->sum('total_quantity');
        $grand_total_price = $cart->sum('total_price');

        if($request->has('print')){
            return view('sale.print.day-wise-product-sale-report-print', compact('cart','grand_total_qty','grand_total_price','start','end'));
        }
        return view('sale.report.day-wise-product-sale-report', compact('cart','grand_total_qty','grand_total_price'));
    }

    public function saleReturnReport(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->paginate(20);
        $total = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$date, $date])->where('status', '=', 1)->sum('vat');
        return view('sale.report.current-day-wise-sale-return-report', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function filterSaleReturnReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');

        $order = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->paginate(20);
        $total = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', '=', 1)->sum('vat');
        if($request->has('print')){
            return view('sale.print.current-day-wise-sale-return-report-print', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','start','end'));
        }
        return view('sale.report.current-day-wise-sale-return-report', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function profitReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');

        $medicineIdsInCart = Cart::whereBetween('date', [$start, $end])->distinct()->pluck('medicine_id');
        $medicines = Product::whereIn('id', $medicineIdsInCart)->get();

        $totalPurchaseByProduct = Cart::join('products', 'carts.medicine_id', '=', 'products.id')
                                    ->select('carts.medicine_id', DB::raw('SUM(carts.qty * products.purchase_price) as total_purchase_price'))
                                    ->groupBy('carts.medicine_id')
                                    ->get(); 
        
        $order = Order::whereBetween('date', [$start, $end])->get();
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');

        // dd($carts,$order);
        return view('sale.report.profit-report', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due','medicines','totalPurchaseByProduct'));
    }
}
