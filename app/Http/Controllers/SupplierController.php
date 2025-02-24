<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Show the form to create a new supplier
    public function create()
    {
        return view('supplier.create');
    }

    // Store a new supplier
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
        ]);

        Supplier::create($request->all());

        return redirect()->back()->with('success', 'Supplier created successfully!');
    }

    // Show the form to edit an existing supplier
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    // Update an existing supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
        ]);

        $supplier->update($request->all());

        return redirect()->back()->with('success', 'Supplier updated successfully!');
    }

    // Delete a supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('success', 'Supplier deleted successfully!');
    }
}