<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function productView(){
        $brands = Brand::all();
        $category = Category::all();
        $product = Product::with('category','brand')->paginate(20);
        return view('product.product-view', compact('product','brands','category'));
    }

    public function editView(){
        $brands = Brand::all();
        $category = Category::all();
        $product = Product::with('category','brand')->paginate(20);
        return view('product.edit-product-list', compact('product','brands','category'));
    }

    public function addMedicine(Request $request){
        $data = new Product();
        $data->name = $request->input('name','');
        $data->genericName = $request->input('generic_name','');
        $data->brand_id = $request->input('Brand','');
        $data->category_id = $request->input('category','');
        $data->purchase_price = $request->input('purchaseprice','');
        $data->price = $request->input('price','');
        $data->stock = $request->input('stock','');
        $data->manufacture_date = $request->input('manufacture_date','');
        $data->expiry_date = $request->input('expiry_date','');
        $data->description = $request->input('description','');
        $data->save();
        return redirect()->back()->with('success','New medicine addedd successfully.');
    }

    public function editProduct($id){
        $product = Product::where('id', $id)->first();
        if(empty($product)){
            return redirect()->back()->with('warning','Item not found. Try angain.');
        }
        $brands = Brand::all();
        $category = Category::all();
        return view('product.edit-product-view', compact('product','brands','category'));
    }

    public function updateProduct(Request $request){
        $id = $request->input('id', '');
        $product = Product::where('id', $id)->first();
        if(empty($product)){
            return redirect()->back()->with('warning','Item not found. Try angain.');
        }
        $product->name = $request->input('name','');
        $product->genericName = $request->input('generic_name','');
        $product->brand_id = $request->input('brand_id','');
        $product->category_id = $request->input('category_id','');
        $product->price = $request->input('price','');
        $product->stock = $request->input('stock','');
        $product->manufacture_date = $request->input('manufacture_date','');
        $product->expiry_date = $request->input('expiry_date','');
        $product->description = $request->input('description','');
        $product->update();
        return redirect()->route('product.view')->with('success','Medicine details updated successfully.');
    }

    public function expritedList(){
        $date = Carbon::today()->format('Ymd');
        $end = Carbon::today()->addDays(180)->format('Ymd');
        $product = Product::where('expiry_date', '<=', $date)->paginate(20);
        $total = Product::where('expiry_date', '<=', $date)->sum('price');
        $stock = Product::where('expiry_date', '<=', $date)->sum('stock');
        return view('product.expired-list', compact('product','total', 'stock'));
    }

    public function printExpiredList(){
        $date = Carbon::now()->format('Ymd');
        $product = Product::where('expiry_date', '<=', $date)->paginate(20);
        $total = Product::where('expiry_date', '<=', $date)->sum('price');
        $stock = Product::where('expiry_date', '<=', $date)->sum('stock');
        return view('product.print-expired-list', compact('product','total', 'stock'));
    }

    public function ExpritedListSixMont(){
        $date = Carbon::today()->addDays(180)->format('Ymd');
        $product = Product::where('expiry_date', '<=', $date)->paginate(20);
        $total = Product::where('expiry_date', '<=', $date)->sum('price');
        $stock = Product::where('expiry_date', '<=', $date)->sum('stock');
        return view('product.expired-list-6-month', compact('product','total', 'stock'));
    }

    public function printExpiredListSixMonth(){
        $date = Carbon::today()->addDays(180)->format('Ymd');
        $product = Product::where('expiry_date', '<=', $date)->paginate(20);
        $total = Product::where('expiry_date', '<=', $date)->sum('price');
        $stock = Product::where('expiry_date', '<=', $date)->sum('stock');
        return view('product.print-expired-list-6-month', compact('product','total', 'stock'));
    }
}
