<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Buyer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'payment', 'buyer'])->get();

        // Menyiapkan data untuk grafik
        $sales = Transaction::selectRaw("DATE(created_at) as date, SUM(quantity) as total")
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Menyusun labels dan data untuk chart
        $chartLabels = [];
        $chartData = [];

        foreach ($sales as $sale) {
            $chartLabels[] = $sale->date; // label berdasarkan tanggal
            $chartData[] = $sale->total;  // jumlah total item yang terjual
        }

        return view('transaction.index', compact('transactions', 'chartLabels', 'chartData'));
    }

    public function create()
    {
        $products = Product::all();
        $payments = Payment::all();
        $buyers = Buyer::all();
        return view('transaction.create', compact('products', 'payments', 'buyers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'payment_id' => 'required|exists:payments,id',
        'buyer_id' => 'required|exists:buyers,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $totalPrice = $this->calculateTotalPrice($request->product_id, $request->quantity);

    Transaction::create([
        'product_id' => $request->product_id,
        'payment_id' => $request->payment_id,
        'buyer_id' => $request->buyer_id,
        'quantity' => $request->quantity,
        'total_price' => $totalPrice,
    ]);

    return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
}


    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $products = Product::all();
        $payments = Payment::all();
        $buyers = Buyer::all();
        return view('transaction.edit', compact('transaction', 'products', 'payments', 'buyers'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'payment_id' => 'required|exists:payments,id',
        'buyer_id' => 'required|exists:buyers,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $transaction = Transaction::findOrFail($id);
    $totalPrice = $this->calculateTotalPrice($request->product_id, $request->quantity);

    $transaction->update([
        'product_id' => $request->product_id,
        'payment_id' => $request->payment_id,
        'buyer_id' => $request->buyer_id,
        'quantity' => $request->quantity,
        'total_price' => $totalPrice,
    ]);

    return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
}


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }


public function show($id)
{
    $transaction = Transaction::with(['product', 'payment', 'buyer'])->findOrFail($id);
    return view('transaction.show', compact('transaction'));
}

private function calculateTotalPrice($productId, $quantity)
{
    $product = Product::findOrFail($productId);
    return $product->price * $quantity;
}


}