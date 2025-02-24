<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Item;
use App\Models\ShippingDep;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show the form to create a new order
    public function create()
    {
        $customers = Customer::all();
        $shippingDeps = ShippingDep::all();
        $items = Item::all();
        return view('orders.create', compact('customers', 'shippingDeps', 'items'));
    }

    // Store a new order
    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required|date',
            'deliver_date' => 'nullable|date',
            'total_cost' => 'required|integer|min:0',
            'status' => 'required|in:ordered,waiting',
            'customer_id' => 'required|exists:customers,id',
            'shipping_dep_id' => 'required|exists:shipping_deps,id',
            'items' => 'required|array', // Array of item IDs for the cart
            'quantities' => 'required|array', // Array of quantities for each item
        ]);

        // Create the order
        $order = Order::create([
            'order_date' => $request->order_date,
            'deliver_date' => $request->deliver_date,
            'total_cost' => $request->total_cost,
            'status' => $request->status,
            'customer_id' => $request->customer_id,
            'shipping_dep_id' => $request->shipping_dep_id,
        ]);
        return redirect()->back()->with('success', 'Order created successfully!');
    }

    // Show the form to edit an order
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $shippingDeps = ShippingDep::all();
        $items = Item::all();
        return view('orders.edit', compact('order', 'customers', 'shippingDeps', 'items'));
    }

    // Update an existing order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'order_date' => 'required|date',
            'deliver_date' => 'nullable|date',
            'total_cost' => 'required|integer|min:0',
            'status' => 'required|in:ordered,waiting',
            'customer_id' => 'required|exists:customers,id',
            'shipping_dep_id' => 'required|exists:shipping_deps,id',
            'items' => 'required|array', // Array of item IDs for the cart
            'quantities' => 'required|array', // Array of quantities for each item
        ]);

        // Update the order
        $order->update([
            'order_date' => $request->order_date,
            'deliver_date' => $request->deliver_date,
            'total_cost' => $request->total_cost,
            'status' => $request->status,
            'customer_id' => $request->customer_id,
            'shipping_dep_id' => $request->shipping_dep_id,
        ]);

        return redirect()->back()->with('success', 'Order updated successfully!');
    }

    // Delete an order
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Order deleted successfully!');
    }
}