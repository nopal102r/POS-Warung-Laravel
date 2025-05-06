<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = Buyer::all();
        return view('buyer.index', compact('buyers'));
    }

    public function create()
    {
        return view('buyer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'phone' => 'required|string|max:16',
        ]);

        Buyer::create($validated);

        return redirect()->route('buyer.index')->with('success', 'Buyer added successfully!');
    }

    public function edit($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyer.edit', compact('buyer'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'phone' => 'required|string|max:16',
        ]);

        $buyer = Buyer::findOrFail($id);
        $buyer->update($validated);

        return redirect()->route('buyer.index')->with('success', 'Buyer updated successfully!');
    }

    public function destroy($id)
    {
        $buyer = Buyer::findOrFail($id);
        $buyer->delete();

        return redirect()->route('buyer.index')->with('success', 'Buyer deleted successfully!');
    }
}
