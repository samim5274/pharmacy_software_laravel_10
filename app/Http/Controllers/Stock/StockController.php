<?php

namespace App\Http\Controllers\Stock;

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
use App\Models\Category;
use App\Models\Brand;

class StockController extends Controller
{
    public function totalStock(){
        $data = Product::paginate(15);
        $stock = Product::sum('stock');
        $purchasePrice = Product::sum('purchase_price');
        $salePrice = Product::sum('price');
        return view('stock.report.total-stock-report', compact('data','stock','purchasePrice','salePrice'));
    }

    public function printStock(){
        $company = Company::all();
        $data = Product::all();
        $stock = Product::sum('stock');
        $purchasePrice = Product::sum('purchase_price');
        $salePrice = Product::sum('price');
        return view('stock.print.print-total-stock-report', compact('data','stock','purchasePrice','salePrice','company'));
    }

    public function categoryStock(){
        $data = Product::paginate(15);
        $stock = Product::sum('stock');
        $purchasePrice = Product::sum('purchase_price');
        $salePrice = Product::sum('price');
        $category = Category::all();
        return view('stock.report.category-stock-report', compact('data','stock','purchasePrice','salePrice','category'));
    }

    public function filterCategoryStock(Request $request){
        $request->validate([
            'cbxCategory' => 'required',
        ]);
        $company = Company::all();
        $category = $request->input('cbxCategory','');
        $data = Product::where('category_id', $category)->paginate(15);
        $stock = Product::where('category_id', $category)->sum('stock');
        $purchasePrice = Product::where('category_id', $category)->sum('purchase_price');
        $salePrice = Product::where('category_id', $category)->sum('price');
        $category = Category::all();
        if($request->has('print')){
            return view('stock.print.print-category-stock-report', compact('data','stock','purchasePrice','salePrice','category','company'));
        }
        return view('stock.report.category-stock-report', compact('data','stock','purchasePrice','salePrice','category'));
    }

    public function brandStock(){
        $data = Product::paginate(15);
        $stock = Product::sum('stock');
        $purchasePrice = Product::sum('purchase_price');
        $salePrice = Product::sum('price');
        $brand = Brand::all();
        return view('stock.report.brand-stock-report', compact('data','stock','purchasePrice','salePrice','brand'));
    }

    public function brandFilterStock(Request $request){
        $request->validate([
            'cbxCategory' => 'required',
        ]);
        $company = Company::all();
        $brand = $request->input('cbxCategory','');
        $data = Product::where('brand_id', $brand)->paginate(15);
        $stock = Product::where('brand_id', $brand)->sum('stock');
        $purchasePrice = Product::where('brand_id', $brand)->sum('purchase_price');
        $salePrice = Product::where('brand_id', $brand)->sum('price');
        $brand = Brand::all();
        if($request->has('print')){
            return view('stock.print.print-brand-stock-report', compact('data','stock','purchasePrice','salePrice','brand','company'));
        }
        return view('stock.report.brand-stock-report', compact('data','stock','purchasePrice','salePrice','brand'));
    }

    public function productStock(){
        $data = Product::paginate(15);
        $product = Product::all();
        $stock = Product::sum('stock');
        $purchasePrice = Product::sum('purchase_price');
        $salePrice = Product::sum('price');
        return view('stock.report.product-stock-report', compact('data','stock','purchasePrice','salePrice','product'));
    }

    public function filterProductStock(Request $request){
        $request->validate([
            'cbxProduct' => 'required',
        ]);
        $company = Company::all();
        $product = Product::all();
        $id = $request->input('cbxProduct','');
        $stock = Stock::where('medicine_id', $id)->with('product')->paginate(15);
        $stockIn = Stock::where('medicine_id', $id)->with('product')->sum('stockIn');
        $stockOut = Stock::where('medicine_id', $id)->with('product')->sum('stockOut');
        $totalStock = Product::where('id', $id)->sum('stock');
        $purchasePrice = Product::where('id', $id)->sum('purchase_price');
        $salePrice = Product::where('id', $id)->sum('price');
        if($request->has('print')){
            return view('stock.print.print-specific-product-stock-report', compact('stock','stockIn','stockOut','totalStock','purchasePrice','salePrice','product','company'));
        }
        return view('stock.report.specific-product-stock-report', compact('stock','stockIn','stockOut','totalStock','purchasePrice','salePrice','product'));
    }
}
