<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buyerCount = Transaction::distinct('buyer_id')->count('buyer_id');
        $totalProductBought = Transaction::sum('quantity');
        $totalProducts = Product::count();

        $sales = Transaction::selectRaw("DATE(created_at) as date, SUM(quantity) as total")
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $label = now()->subDays($i)->format('D'); // contoh: Mon, Tue

            $chartLabels[] = $label;
            $data = $sales->firstWhere('date', $date);
            $chartData[] = $data ? $data->total : 0;
        }


        return view('dashboard', compact(
            'buyerCount',
            'totalProductBought',
            'totalProducts',
            'chartLabels',
            'chartData'
        ));

    }
}
