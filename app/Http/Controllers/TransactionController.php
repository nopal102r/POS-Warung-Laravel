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
        return view('transaction.index', compact('transactions'));
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
        ]);

        Transaction::create($request->all());

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
        $transaction = Transaction::findOrFail($id);
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'payment_id' => 'required|exists:payments,id',
            'buyer_id' => 'required|exists:buyers,id',
        ]);
        $transaction->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }
}
