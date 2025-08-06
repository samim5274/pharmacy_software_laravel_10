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
use App\Models\Admin;

class ExpensesReportController extends Controller
{
    public function expensesReport(){
        $date = Carbon::now()->format('Ymd');
        $data = Expenses::where('date', $date)->paginate(20);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.report.total-expenses-report', compact('data', 'total'));
    }

    public function printExpensesReport(){
        $date = Carbon::now()->format('Ymd');
        $data = Expenses::where('date', $date)->paginate(20);
        $total = Expenses::where('date', $date)->sum('amount');
        $company = Company::all();
        return view('expenses.print.print-total-expenses-report-today', compact('data', 'total','company'));
    }

    public function filterExpensesReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');

        $data = Expenses::whereBetween('date', [$start, $end])->paginate(20);
        $total = Expenses::whereBetween('date', [$start, $end])->sum('amount');
        $company = Company::all();
        if($request->has('print')){
            return view('expenses.print.print-total-expenses-report', compact('data', 'total','company','start','end'));
        }
        return view('expenses.report.total-expenses-report', compact('data', 'total'));
    }

    public function categoryExpensesReport(){
        $date = Carbon::now()->format('Ymd');
        $category = Excategory::all();
        $data = Expenses::where('date', $date)->paginate(20);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.report.category-expenses-report', compact('data', 'total','category'));
    }

    public function filterCategoryExpensesReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $category = Excategory::all();
        $request->validate([
            'cbxCategory' => 'required',
        ]);
        $catId = $request->input('cbxCategory','');
        $data = Expenses::whereBetween('date', [$start, $end])->where('catId', $catId)->paginate(20);
        $total = Expenses::whereBetween('date', [$start, $end])->where('catId', $catId)->sum('amount');
        $company = Company::all();
        if($request->has('print')){
            return view('expenses.print.print-category-expenses-report', compact('data', 'total','company','start','end'));
        }
        return view('expenses.report.category-expenses-report', compact('data', 'total','category'));
    }

    public function subCatExpense(){
        $date = Carbon::now()->format('Ymd');
        $category = Excategory::all();
        $data = Expenses::where('date', $date)->paginate(20);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.report.sub-category-expenses-report', compact('data', 'total','category'));
    }

    public function filterSubCatExpenseReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $request->validate([
            'cbxCategory' => 'required',
            'cbxsubcategory' => 'required',
        ]);
        $catId = $request->input('cbxCategory','');
        $subCatId = $request->input('cbxsubcategory','');
        $category = Excategory::all();
        $data = Expenses::whereBetween('date', [$start, $end])->where('catId', $catId)->where('subcatId', $subCatId)->paginate(20);
        $total = Expenses::whereBetween('date', [$start, $end])->where('catId', $catId)->where('subcatId', $subCatId)->sum('amount');
        $company = Company::all();
        if($request->has('print')){
            return view('expenses.print.print-sub-category-expenses-report', compact('data', 'total','category','company','start','end'));
        }
        return view('expenses.report.sub-category-expenses-report', compact('data', 'total','category'));
    }

    public function userExpensesReport(){
        $date = Carbon::now()->format('Ymd');
        $user = Admin::all();
        $data = Expenses::where('date', $date)->paginate(20);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.report.user-expenses-report', compact('data', 'total','user'));
    }

    public function filterUserExpensesReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $request->validate([
            'cbxUser' => 'required',
        ]);
        $userId = $request->input('cbxUser','');
        $user = Admin::all();
        $data = Expenses::whereBetween('date', [$start, $end])->where('userId', $userId)->paginate(20);
        $total = Expenses::whereBetween('date', [$start, $end])->where('userId', $userId)->sum('amount');
        $company = Company::all();
        if($request->has('print')){
            return view('expenses.print.print-user-expenses-report', compact('data', 'total','user','company','start','end'));
        }
        return view('expenses.report.user-expenses-report', compact('data', 'total','user'));
    }
}
