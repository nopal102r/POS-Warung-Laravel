<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment.index', compact('payments'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);

        Payment::create($request->all());
        return redirect()->route('payment.index')->with('success', 'Payment method added!');
    }

    public function edit(Payment $payment)
    {
        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'name' => 'required|max:200',
        ]);

        $payment->update($request->all());
        return redirect()->route('payment.index')->with('success', 'Payment method updated!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payment.index')->with('success', 'Payment method deleted!');
    }
}
