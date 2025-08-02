<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;use Illuminate\Support\Carbon;

use Auth;
use App\Models\Purchasecart;
use App\Models\Purchaseorder;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Purchasereturn;
use App\Models\Purchasereturnorder;
use App\Models\Company;

class PurchaseReportController extends Controller
{
    public function totalPurchase(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        return view('purchase.report.total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function searchPurchaseOrder(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
        }
        return view('purchase.report.total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function printPurchaseReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $company = Company::all();
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->get();
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        return view('purchase.print.print-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
    }

    public function purchaseDeliveryReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('due');
        return view('purchase.report.delivery-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function printPurchaseDeliveryReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $company = Company::all();
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('due');
        return view('purchase.print.print-delivery-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
    }

    public function searchPurchaseDeliveryReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 2)->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-delivery-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
        }
        return view('purchase.report.delivery-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function paymentCompleteReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('due');
        return view('purchase.report.payment-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function printPaymentCompleteReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $company = Company::all();
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('due');
        return view('purchase.print.print-payment-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
    }

    public function searchPaymentCompleteReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 4)->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-payment-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
        }
        return view('purchase.report.payment-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function cancelPurchaseReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('due');
        return view('purchase.report.cancel-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function printCancelPurchaseReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $company = Company::all();
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('due');
        return view('purchase.print.print-cancel-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
    }

    public function searchCancelPurchaseReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 3)->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-cancel-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
        }
        return view('purchase.report.cancel-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function returnPurchaseReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('due');
        return view('purchase.report.return-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }

    public function printReturnPurchaseReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $company = Company::all();
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('due');
        return view('purchase.print.print-return-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
    }

    public function searchPurchaseReturnReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->where('status', 5)->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-return-total-purchase-report', compact('purchase','company','total','discount','vat','payable','pay','due'));
        }
        return view('purchase.report.return-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due'));
    }
}
