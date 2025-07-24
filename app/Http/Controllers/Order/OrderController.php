<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\Product;

class OrderController extends Controller
{
    public function orderList(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::where('date', $date)->where('status', '!=', 1)->paginate(20);
        $total = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$date, $date])->where('status', '!=', 1)->sum('vat');
        return view('order.order-list', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function printOrder(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->orderBy('id', 'desc')->get();
        $total = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', '!=', 1)->sum('vat');
        return view('order.print.printOrderlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function showOrderItem($reg){
        $cart = Cart::where('reg', $reg)->with('medicine','user')->get();
        $order = Order::where('reg', $reg)->get();
        $count = Cart::where('reg', $reg)->count();
        return view('order.cart', compact('cart','reg','count','order'));
    }

    public function orderCancel($reg){
        $order = Order::where('reg', $reg)->first();
        if(!$order){
            return redirect()->back()->with('error', $reg.' - Order return not possile. Try again latter. Or contact with manager. Thanks!');
        }
        $cart = Cart::where('reg', $reg)->get();
        foreach ($cart as $item) {
            // Update product stock
            $product = Product::find($item->medicine_id);

            if ($product) {
                $product->stock += $item->qty;
                $product->save();
            }
        }
        $stock = Stock::where('reg', $reg)->get();
        foreach ($stock as $item) {
            $item->status = 2; // status 2 means product returned
            $item->update();
        }
        $order->status = 1; // status 1 means order returned
        $order->update();        
        return redirect()->route('order.list')->with('success', $reg.' - Order return successfully complete.');
    }

    public function returnView(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::where('date', $date)->where('status', 1)->paginate(20);
        $total = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('total');
        $discount = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('pay');
        $due = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('due');
        $vat = Order::whereBetween('date', [$date, $date])->where('status', 1)->sum('vat');
        return view('order.return-list', compact('order','total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }
}
