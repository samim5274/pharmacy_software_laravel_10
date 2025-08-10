<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;
use App\Models\Purchasecart;
use App\Models\Purchaseorder;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Purchasereturn;
use App\Models\Purchasereturnorder;
use App\Models\Company;
use App\Models\Admin;

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

    public function SupplierReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        $supplier = Supplier::all();
        return view('purchase.report.supplier-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','supplier'));
    }

    public function printSuppierReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment', '5 = purchase return]
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        $company = Company::all();
        return view('purchase.print.print-supplier-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','company'));
    }

    public function findSupplierReport(Request $request){
        $request->validate([
            'cbxSupplier' => 'required',
        ]);
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $supply_id = $request->input('cbxSupplier','');
        $supplier = Supplier::all();
        $purchase = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::where('supplier_id', $supply_id)->whereBetween('order_date', [$start, $end])->sum('due');
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-supplier-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','company'));
        }
        return view('purchase.report.supplier-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','supplier'));
    }

    public function userReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        $user = Admin::all();
        return view('purchase.report.user-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','user'));
    }

    public function printUserReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $purchase = Purchaseorder::whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::whereBetween('order_date', [$start, $end])->sum('due');
        $company = Company::all();
        return view('purchase.print.print-user-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','company'));
    }

    public function findUserReport(Request $request){
        $request->validate([
            'cbxUser' => 'required',
        ]);
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $user = $request->input('cbxUser','');
        $purchase = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->paginate(20); 
        $total = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('total');
        $discount = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('discount');
        $vat = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('vat');
        $payable = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('payable');
        $pay = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('pay');
        $due = Purchaseorder::where('user_id', $user)->whereBetween('order_date', [$start, $end])->sum('due');
        $user = Admin::all();
        $company = Company::all();
        if($request->has('print')){
            return view('purchase.print.print-user-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','company'));
        }
        return view('purchase.report.user-total-purchase-report', compact('purchase','total','discount','vat','payable','pay','due','user'));
    }
}
