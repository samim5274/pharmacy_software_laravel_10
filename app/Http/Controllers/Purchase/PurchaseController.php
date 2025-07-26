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

class PurchaseController extends Controller
{
    function genRegNum() {
        $order = Purchaseorder::count() + 1;
        $userId = Auth::guard('admin')->user()->id;
        return Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($order, 4, '0', STR_PAD_LEFT);
    }

    public function purchaseOrderView(){
        $reg = $this->genRegNum();
        $cart = Purchasecart::where('chalan_reg', $reg)->with('medicine')->get();
        $count = Purchasecart::where('chalan_reg', $reg)->count();
        return view('purchase.make-order', compact('cart','count','reg'));
    }

    public function addToCart(Request $request){
        $id = $request->input('search', '');
        $date = Carbon::now()->format('Y-m-d');
        
        $cart = new Purchasecart();

        $product = Product::where('name', 'like', '%'.$id.'%')->orWhere('id', 'like', '%'.$id.'%')->first();

        if(empty($product)) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }

        $reg = $this->genRegNum();
        $findFood = Purchasecart::where('chalan_reg', $reg)->where('medicine_id', $product->id)->first();

        if($findFood) {
            return redirect()->back()->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
        }

        $cart->date = $date;
        $cart->user_id = Auth::guard('admin')->user()->id;
        $cart->chalan_reg = $reg;
        $cart->medicine_id = $product->id;
        $cart->status = 1;
        $cart->remark = 'Ordered';
        $cart->purchase_price = $product->purchase_price;
        $cart->price = $product->price;

        $cart->save();
        return redirect()->back();
    }

    public function updateQty(Request $request){
        // $request->validate([
        //     'id' => 'required|exists:carts,id',
        //     'quantity' => 'required|integer|min:1',
        //     'reg' => 'required|integer'
        // ]);

        $cart = Purchasecart::where('id', $request->id)->where('chalan_reg', $request->reg)->first();

        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $product = Product::find($cart->medicine_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Medicine item not found'], 404);
        }

        $newQty = $request->quantity;

        $cart->order_qty = $newQty;
        $cart->total_purchase_price = $product->purchase_price * $newQty;
        $cart->save();

        return response()->json([
            'status' => 'success',
            'quantity' => $cart->order_qty,
            'reg' => $request->reg
        ]);
    }

    public function removeCart($id, $reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->where('medicine_id', $id)->first();
        if (!$cart) {
            return redirect()->back()->with('warning', 'This item is no longer available.');
        }
        $cart->delete();
        return redirect()->back();
    }

    public function confirmOrder(Request $request){
        
        try{
            
            $order = new Purchaseorder();

            $request->validate([
                'txtReg' => 'required',
                'txtSubTotal' => 'required',
            ]);

            $reg = $request->input('txtReg', '');

            $findReg = Purchaseorder::where('chalan_reg', $reg)->first();

            if($findReg) {
                return redirect()->back()->with('error', 'This order already taken. Please add product to cart and try again. Thank You!');
            } 

            if($request->input('txtSubTotal', '') <= 0) {
                return redirect()->back()->with('error', 'Your cart is empty. Try again.');
            }

            $received = $request->input('txtPay', 0);
            $total = $request->input('txtSubTotal', 0);
            $discount = $request->input('txtDiscount', 0);
            $vat = $request->input('txtVAT', 0);

            $newVat = $total * $vat / 100;
            $payable = ($total - $discount) + $newVat;
            $dueAmount = $payable - $received;

            if($received < 0) {
                return redirect()->back()->with('warning', 'You must be payment some amount. Unless you can not sale this product. Thanks');
            }

            $order->order_date = Carbon::now()->format('Y-m-d');
            $order->user_id = Auth::guard('admin')->user()->id;
            $order->chalan_reg = $reg;
            $order->total = $total;
            $order->discount = $discount;
            $order->vat = $newVat;
            $order->payable = $payable;


            if($received >= $payable) {
                $order->pay = $payable;
                $order->due = 0;
            } else {
                $order->pay = $received;
                $order->due = $dueAmount;
            }
            
            $order->status = 1; // ['1 = order', '2 = delivery', '3 = cancelled', '3 = bill payment']
            
            $order->save();
            return redirect()->back()->with('success', 'Order sale successfully.')->with('reg', $reg);

        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Your cart is empty. Try again.'.$e);
        }
    }

    public function printPurchaseOrder($reg){
        $order = Purchaseorder::where('chalan_reg', $reg)->orderBy('id', 'desc')->firstOrFail();        
        $cart = Purchasecart::where('chalan_reg', $reg)->get();
        return view('purchase.printPurchaseOrder', compact('order','cart'));
    }

    public function purchaseOrderlist(){
        $order = Purchaseorder::where('status', 1)->with('user')->paginate(20);
        $total = Purchaseorder::where('status', 1)->sum('total');
        $discount = Purchaseorder::where('status', 1)->sum('discount');
        $payable = Purchaseorder::where('status', 1)->sum('payable');
        $pay = Purchaseorder::where('status', 1)->sum('pay');
        $due = Purchaseorder::where('status', 1)->sum('due');
        $vat = Purchaseorder::where('status', 1)->sum('vat');
        return view('purchase.purchase-order-list', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function printPurchaseOrderSpecific($reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->with('medicine','user')->get();
        $order = Purchaseorder::where('chalan_reg', $reg)->with('user')->first();
        // dd($order,$cart);
        return view('purchase.printPurchaseOrderSpecific', compact('order','cart'));
    }

    public function viewPurchaseOrder($reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->with('medicine','user')->get();
        $count = Purchasecart::where('chalan_reg', $reg)->count();
        $order = Purchaseorder::where('chalan_reg', $reg)->with('user')->first();
        return view('purchase.purchase-cart', compact('order','cart','reg','count'));
    }

    public function cancelOrder($reg){
        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        $order->status = 3;
        $order->update();
        return redirect()->route('purchase.order.list')->with('success', 'Order cancel successfully.');
    }

    public function deliveryView($reg){
        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        $cart = Purchasecart::where('chalan_reg', $reg)->with('medicine','user')->get();
        return view('purchase.delivery-list', compact('order','cart'));
    }

    public function confirmQtyOrder(Request $request){
        $qty = $request->input('txtDeliveryQty','');
        $medicine = $request->input('txtMedicine','');
        $reg = $request->input('txtReg','');

        $cart = Purchasecart::where('chalan_reg', $reg)->where('medicine_id', $medicine)->first();
        if(!$cart){
            return redirect()->back()->with('error', 'Item not found. Please try again. Thank You!');
        }
        $cart->delivery_qty = $qty;

        $stock = new Stock();
        $stock->medicine_id = $medicine;
        $stock->stockIn = $qty;
        $stock->stockOut = 0;
        $stock->date = Carbon::now()->format('Y-m-d');
        $stock->reg = $reg;
        $stock->remark = 'Purchase';

        $product = Product::where('id', $medicine)->first();
        $product->stock += $qty;

        $product->update();
        $cart->update();
        $stock->save();
        return redirect()->back()->with('success','Delivery qty updated successfully.');
    }

    public function deliveryComplete($reg){
        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        if(!$order){
            return redirect()->back()->with('error', 'Item not found. Please try again. Thank You!');
        }
        $order->status = 2;
        $order->delivary_date = Carbon::now()->format('Y-m-d');
        // dd($order);
        $order->update();
        return redirect()->route('purchase.order.list')->with('success','Delivery completed successfully.');
    }

    public function completeOrder(){
        $order = Purchaseorder::where('status', 2)->paginate(20);
        $total = Purchaseorder::where('status', 2)->sum('total');
        $discount = Purchaseorder::where('status', 2)->sum('discount');
        $payable = Purchaseorder::where('status', 2)->sum('payable');
        $pay = Purchaseorder::where('status', 2)->sum('pay');
        $due = Purchaseorder::where('status', 2)->sum('due');
        $vat = Purchaseorder::where('status', 2)->sum('vat');
        return view('purchase.complete-order', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function payBill($reg){
        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        $cart = Purchasecart::where('chalan_reg', $reg)->get();
        $count = Purchasecart::where('chalan_reg', $reg)->count();
        // dd($order);
        return view('purchase.bill-pay', compact('reg','cart','order','count'));
    }

    public function billPay(Request $request){
        try{

            $request->validate([
                'txtReg' => 'required',
                'txtSubTotal' => 'required',
            ]);

            $reg = $request->input('txtReg', '');

            $order = Purchaseorder::where('chalan_reg', $reg)->first();

            if(!$order) {
                return redirect()->back()->with('error', 'This order already taken. Please add product to cart and try again. Thank You!');
            } 

            if($request->input('txtSubTotal', '') <= 0) {
                return redirect()->back()->with('error', 'Your cart is empty. Try again.');
            }

            $received = $request->input('txtPay', 0);
            $total = $request->input('txtSubTotal', 0);
            $discount = $request->input('txtDiscount', 0);
            $vat = $request->input('txtVAT', 0);

            $newVat = $total * $vat / 100;
            $payable = ($total - $discount) + $newVat;
            $dueAmount = $payable - $received;

            if($received < 0) {
                return redirect()->back()->with('warning', 'You must be payment some amount. Unless you can not sale this product. Thanks');
            }

            $order->order_date = Carbon::now()->format('Y-m-d');
            $order->user_id = Auth::guard('admin')->user()->id;
            $order->chalan_reg = $reg;
            $order->total = $total;
            $order->discount = $discount;
            $order->vat = $newVat;
            $order->payable = $payable;


            if($received >= $payable) {
                $order->pay = $payable;
                $order->due = 0;
            } else {
                $order->pay = $received;
                $order->due = $dueAmount;
            }
            
            $order->status = 4; // ['1 = order', '2 = delivery', '3 = cancelled', '4 = bill payment']
            
            $order->update();
            return redirect()->back()->with('success', 'Order sale successfully.')->with('reg', $reg);

        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Your cart is empty. Try again.'.$e);
        }
    }

    public function paymentList(){
        $order = Purchaseorder::where('status', 4)->paginate(20);
        $total = Purchaseorder::where('status', 4)->sum('total');
        $discount = Purchaseorder::where('status', 4)->sum('discount');
        $payable = Purchaseorder::where('status', 4)->sum('payable');
        $pay = Purchaseorder::where('status', 4)->sum('pay');
        $due = Purchaseorder::where('status', 4)->sum('due');
        $vat = Purchaseorder::where('status', 4)->sum('vat');
        return view('purchase.payment-list', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function duePay(Request $request){
        $reg = $request->input('txtReg', '');
        $received = $request->input('txtReceivedAmount', '');

        $order = Purchaseorder::where('chalan_reg', $reg)->first();
        if(!$order){
            return redirect()->back()->with('error', 'This order not found. Please try to another and try again. Thank You!');
        }

        $due = $order->due;

        if($due <= $received){
            $order->due = 0;
            $order->pay += $due;
        } else {
            $order->due -= $received;
            $order->pay += $received;
        }
        $order->update();
        return redirect()->back()->with('success', 'Order sale successfully.');
    }
}
