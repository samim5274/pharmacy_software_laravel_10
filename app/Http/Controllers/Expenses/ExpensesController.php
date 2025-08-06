<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;
use App\Models\Expenses;
use App\Models\Excategory;
use App\Models\Subexcategory;
use App\Models\Company;

class ExpensesController extends Controller
{
    public function expenses(){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->paginate(20);
        $category = Excategory::all();
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.expenses', compact('expenses','total','category'));
    }

    public function getSubCategory($id){
        $subCategory = Subexcategory::where('ex_category_id', $id)->get();
        return response()->json(['subCategory' => $subCategory]);
    }

    public function dailyExpenses(Request $request){
        if(empty($request->input('cbxCategory', '')) || empty($request->input('cbxsubcategory', '') || empty($request->input('txtAmount', '')))){
            return redirect()->back()->with('success', 'Some information is missing. Please full fill all information & try again. Thank You!');
        }
        $userId = optional(Auth::guard('admin')->user())->id;
        if (!$userId) {
            return back()->withErrors(['error' => 'No admin user is logged in.']);
        }
        $data = new Expenses();
        $data->catId = $request->input('cbxCategory', '');
        $data->subcatId = $request->input('cbxsubcategory', '');
        $data->userId = $userId;
        $data->date = Carbon::now()->format('Ymd');
        $data->amount = $request->input('txtAmount', '');
        $data->save();
        return redirect()->back()->with('success', 'Daily expenses added successfully.');
    }

    public function exSetting(){
        $cat = Excategory::paginate(5);
        $subCat = Subexcategory::paginate(5);
        $category = Excategory::all();
        return view('expenses.expenses-setting', compact('cat','category','subCat'));
    }

    public function addExCategory(Request $request){
        $request->validate([
            'txtCategroy' => 'required',
        ]);

        $cat = $request->input('txtCategroy', '');

        $data = new Excategory();
        $data->name = $cat;
        $data->save();
        return redirect()->back()->with('success', 'New expenses category added successfully.');
    }

    public function addExSubCategory(Request $request){
        $request->validate([
            'txtSubCategroy' => 'required',
            'cbxCategory' => 'required',
        ]);

        $catId = $request->input('cbxCategory', '');
        $subCat = $request->input('txtSubCategroy', '');

        $data = new Subexcategory();
        $data->name = $subCat;
        $data->ex_category_id = $catId;
        $data->save();
        return redirect()->back()->with('success', 'New expenses category added successfully.');
    }

    public function editExpenses($id){
        $expenses = Expenses::where('id', $id)->first();
        $category = Excategory::all();
        $subcategory = Subexcategory::all();
        // dd($expenses);
        return view('expenses.edit-expenses', compact('expenses','category','subcategory'));
    }

    public function updateExpenses(Request $request, $id){
        if(empty($request->input('cbxCategory', '')) || empty($request->input('cbxsubcategory', '') || empty($request->input('txtAmount', '')))){
            return redirect()->back()->with('success', 'Some information is missing. Please full fill all information & try again. Thank You!');
        }
        $userId = optional(Auth::guard('admin')->user())->id;
        if (!$userId) {
            return back()->withErrors(['error' => 'No admin user is logged in.']);
        }
        $data = Expenses::where('id', $id)->first();
        $data->catId = $request->input('cbxCategory', '');
        $data->subcatId = $request->input('cbxsubcategory', '');
        $data->userId = $userId;
        $data->date = Carbon::now()->format('Ymd');
        $data->amount = $request->input('txtAmount', '');
        $data->update();
        return redirect()->route('expenses.view')->with('success', 'Daily expenses added successfully.');
    }

    public function printExpensesSpecific($id){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('id', $id)->get();
        $company = Company::all();
        return view('expenses.print.specific-expenses-print', compact('expenses','company'));
    }

    public function printDailyExpenses(){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->get();
        $total = Expenses::where('date', $date)->sum('amount');
        $company = Company::all();
        return view('expenses.print.daily-expenses-print', compact('expenses','company','total'));
    }
}
