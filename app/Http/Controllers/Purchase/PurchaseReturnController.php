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

class PurchaseReturnController extends Controller
{
    public function purchaseReturn(){
        $order = Purchaseorder::where('status', 2)->orWhere('status', 4)->paginate(20);      // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment','5 = purchase return']
        return view('purchase.return.return-purchase', compact('order'));
    }

    public function findPurchaseMedicine($reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->get();
        $count = Purchasecart::where('chalan_reg', $reg)->count();
        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        return view('purchase.return.return-purchase-medicine', compact('cart', 'reg','order','count'));
    }

    public function returnQty(Request $request){
        $reg = $request->input('txtReg', '');
        $qty = $request->input('return_qty', '');
        $medicine = $request->input('txtMedicineId', '');
        
        $cart = Purchasecart::where('chalan_reg', $reg)->where('medicine_id',$medicine)->first();
        if(!$cart){
            return redirect()->back()->with('error', 'This item not found. Please try to another and try again. Thank You!');
        }
        $cart->return_qty = $qty;
        // $returnAmount = $qty * $cart->purchase_price;
        // $cart->total_purchase_price -= $returnAmount;
        
        $product = Product::where('id', $medicine)->first();
        if(!$product){
            return redirect()->back()->with('error', 'This item not found. Please try to another and try again. Thank You!');
        }
        $product->stock -= $qty;

        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        if(!$order){
            return redirect()->back()->with('error', 'This item not found. Please try to another and try again. Thank You!');
        }

        $stock = new Stock();
        $stock->medicine_id = $medicine;
        $stock->stockOut = $qty;
        $stock->remark = 'Return';
        $stock->date = Carbon::now()->format('Y-m-d');

        $purReturnCart = Purchasereturn::where('chalan_reg', $reg)->where('product_id', $medicine)->first();
        if($purReturnCart){
            return redirect()->back()->with('error', 'This item already returned. Please try to another and try again. Thank You!');
        }
        $purReturn = new Purchasereturn();
        $purReturn->chalan_reg = $reg;
        $purReturn->product_id = $medicine;
        $purReturn->supplier_id = $order->supplier_id;
        $purReturn->return_qty = $qty;
        $purReturn->return_date = Carbon::now()->format('Y-m-d');
        
        $cart->update();
        $product->update();
        $stock->save();
        $purReturn->save();
        return redirect()->back()->with('success', 'Return qty updated successfully. Thank You!');
    }

    public function returnPayment(Request $request){

        $returnOrder = new Purchasereturnorder();
        
        $request->validate([
                'txtVAT' => 'required',
                'txtDiscount' => 'required',
                'txtPay' => 'required'
            ]);

        $reg = $request->input('txtReg','');
        $subTotal = $request->input('txtSubTotal','');
        $supplier = $request->input('txtSupplier','');
        $vat = $request->input('txtVAT','');
        $discount = $request->input('txtDiscount','');
        $received = $request->input('txtPay','');

        $findReg = Purchasereturnorder::where('chalan_reg', $reg)->first();

        if($findReg) {
            return redirect()->back()->with('error', 'This order already taken. Please add product to cart and try again. Thank You!');
        }

        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        if(!$order) {
            return redirect()->back()->with('warning', 'This order not found. Please try again. Thank You!');
        }
        $order->status = 5; // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment','5 = purchase return']

        $newVat = $subTotal * $vat / 100;
        $payable = ($subTotal - $discount) + $newVat;
        $dueAmount = $payable - $received;

        if($received <= 0) {
            return redirect()->back()->with('warning', 'You must be payment some amount. Unless you can not sale this product. Thanks');
        }

        $returnOrder->return_date = Carbon::now()->format('Y-m-d');
        $returnOrder->user_id = Auth::guard('admin')->user()->id;
        $returnOrder->supplier_id = $supplier;
        $returnOrder->chalan_reg = $reg;
        $returnOrder->total = $subTotal;
        $returnOrder->discount = $discount;
        $returnOrder->vat = $newVat;
        $returnOrder->payable = $payable;
        
        if($received >= $payable) {
            $returnOrder->pay = $payable;
            $returnOrder->due = 0;
        } else {
            $returnOrder->pay = $received;
            $returnOrder->due = $dueAmount;
        }

        $order->update();
        $returnOrder->save();

        return redirect()->route('purchase.return.view')->with('success', 'Order sale successfully.')->with('reg', $reg);
    }
}
