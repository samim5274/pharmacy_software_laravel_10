<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Cart;
use Auth;
use App\Models\Order;
use App\Models\Stock;

class HomeController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->subDays(30)->format('Y-m-d');
        $end = Carbon::now()->format('Y-m-d');
        
        $dates = [];
        $totalSales = [];
        $totalDue = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $formattedDate = $date->format('D'); // Mon, Tue, Wed ...
            $dates[] = $formattedDate;

            $sale = Order::whereDate('date', $date)->sum('payable');
            $due = Order::whereDate('date', $date)->sum('due');

            $totalDue[] = $due;
            $totalSales[] = $sale;
        }

        $userSales = Order::select(
                'user_id',
                DB::raw('SUM(total) as total'),
                DB::raw('SUM(due) as due'),
                DB::raw('SUM(discount) as discount'),
                DB::raw('SUM(vat) as vat'),
                DB::raw('SUM(payable) as payable'),
                DB::raw('SUM(pay) as pay')
            )
            ->whereBetween('date', [$start, $end])
            ->with('user')
            ->groupBy('user_id')
            ->paginate(5);

        return view('welcome', compact('dates', 'totalSales', 'totalDue','userSales'));
    }
}
