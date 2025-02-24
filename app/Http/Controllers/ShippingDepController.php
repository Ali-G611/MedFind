<?php

namespace App\Http\Controllers;

use App\Models\ShippingDep;
use Illuminate\Http\Request;

class ShippingDepController extends Controller
{
    // Show the form to create a new shipping department
    public function create()
    {
        return view('shipping_dep.create');
    }

    // Store a new shipping department
    public function store(Request $request)
    {
        $request->validate([
            'governorate' => 'required|string|max:30',
        ]);

        ShippingDep::create($request->all());

        return redirect()->back()->with('success', 'Shipping Department created successfully!');
    }

    // Show the form to edit an existing shipping department
    public function edit(ShippingDep $shippingDep)
    {
        return view('shipping_dep.edit', compact('shippingDep'));
    }

    // Update an existing shipping department
    public function update(Request $request, ShippingDep $shippingDep)
    {
        $request->validate([
            'governorate' => 'required|string|max:30',
        ]);

        $shippingDep->update($request->all());

        return redirect()->back()->with('success', 'Shipping Department updated successfully!');
    }

    // Delete a shipping department
    public function destroy(ShippingDep $shippingDep)
    {
        $shippingDep->delete();
        return back()->with('success', 'Shipping Department deleted successfully!');
    }
}