<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\Cart;
use Auth;
use App\Models\Order;
use App\Models\Stock;

class CartController extends Controller
{
    function genRegNum() {
        $order = Order::count() + 1;
        $userId = Auth::guard('admin')->user()->id;
        return Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($order, 4, '0', STR_PAD_LEFT);
    }

    public function cartView(){
        $reg = $this->genRegNum();
        $cart = Cart::where('reg', $reg)->with('medicine')->get();
        $count = Cart::where('reg', $reg)->count();
        return view('cart.cart', compact('cart','count', 'reg'));
    }

    public function addCart(Request $request){
        $id = $request->input('search', '');
        $date = Carbon::now()->format('Y-m-d');
        $cart = new Cart();
        $stock = new Stock();
        $product = Product::where('name', 'like', '%'.$id.'%')->orWhere('id', 'like', '%'.$id.'%')->first();
        if(empty($product)) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }
        if($product->stock <= 0) {
            return redirect()->back()->with('warning','Sorry 😞 This item stock not availabel righ now. Try to another. Thank You!');
        }
        if($product->expiry_date <= $date){
            return redirect()->back()->with('warning','Sorry 😞 This item is expried. Try to another. Thank You!');
        }

        $reg = $this->genRegNum();
        $findFood = Cart::where('reg', $reg)->where('medicine_id', $product->id)->first();

        if($findFood) {
            return redirect()->back()->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
        }

        $cart->reg = $reg;
        $cart->date = $date;
        $cart->user_id = Auth::guard('admin')->user()->id;
        $cart->medicine_id = $product->id;
        $cart->unit_price = $product->price;
        $cart->total_price = $product->price * 1;
        $cart->exp_date = $product->expiry_date;
        $cart->mfg_date = $product->manufacture_date;
        $cart->status = 1;

        $stock->reg = $reg;
        $stock->date = $date;
        $stock->medicine_id = $product->id;
        $stock->stockOut += 1;
        $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out
        $stock->remark = 'Sale';

        $product->stock -= 1;

        $product->update();
        $stock->save();
        $cart->save();
        return redirect()->back();
    }

    public function removeCart($id, $reg){

        $cart = Cart::where('reg', $reg)->where('medicine_id', $id)->first();
        if (!$cart) {
            return redirect()->back()->with('warning', 'This item is no longer available.');
        }

        $product = Product::where('id', $cart->medicine_id)->first();        
        $stock = Stock::where('medicine_id', $cart->medicine_id)->where('reg', $cart->reg)->first();

        if ($product) {
            $txtStock = $cart->qty;
            $product->stock += $txtStock;
            $product->update();
        }

        if ($stock) {
            $stock->delete();
        }

        $cart->delete();
        return redirect()->back();
    }

    public function updateQty(Request $request){
        $request->validate([
            'id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $newQty = $request->quantity;

        $cart = Cart::find($request->id);

        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $product = Product::find($cart->medicine_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $availableStock = $product->stock + $cart->qty;

        if ($newQty > $availableStock) {
            return response()->json(['status' => 'error', 'message' => 'Food stock not available']);
        }

        $oldQty = $cart->qty;
        $diff = $newQty - $oldQty;

        $stock = Stock::where('medicine_id', $cart->medicine_id)
                        ->where('reg', $cart->reg)
                        ->first();
        if (!$stock) {
            return response()->json(['status' => 'error', 'message' => 'Stock record not found for this registration']);
        }

        if($diff > 0) {
            $stock->stockOut += $diff;            
        } elseif ($diff < 0) {
            $adjust = abs($diff);
            if ($stock->stockOut < $adjust) {
                return response()->json(['status' => 'error', 'message' => 'Cannot reduce stock below 0']);
            }
            $stock->stockOut -= $adjust;
        }

        $stock->update();

        $product->stock -= ($newQty - $cart->qty);
        $product->save();

        $cart->qty = $newQty;
        $cart->total_price = $cart->unit_price * $newQty;
        $cart->update();

        return response()->json([
            'status' => 'success',
            'quantity' => $cart->qty,
            'stock' => $product->stock
        ]);
    }
}
