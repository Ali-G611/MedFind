<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\ShippingDep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'birth' => 'date|required',
            'phone' => 'string|required',
            'first_name' => 'string|max:10|required',
            'last_name' => 'string|max:15|required',
            'location' => 'string|required|max:100',
        ]);
        // Create a new Customer instance and fill it with validated data
        $user = Auth::user();
        $user->customer()->create($validatedData);
        return back();
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'birth' => 'date|required',
            'phone' => 'string|required',
            'first_name' => 'string|max:10|required',
            'last_name' => 'string|max:15|required',
            'location' => 'string|required|max:100',
        ]);
        // Create a new Customer instance and fill it with validated data
        $user = Auth::user();
        $user->customer->update($validatedData);
        return back();
    }
    public function order(Item $item)
    {
        $user = Auth::user();
        $customer = $user->customer;
    
        // Check if the user has a customer profile
        if ($customer == null) {
            return back()->with('customer', 'Create a Customer from Account Page First.');
        }
        
        $rand_shippingdep = ShippingDep::inRandomOrder()->first();
        //$totalCost = Item::whereIn('id', $item)->sum('price');
        // Create a new order associated with the customer
        $order = $customer->orders()->create([
            'deliver_date' => today()->addDay(),
            'total_cost' => $item->price,
            'status' => 'ordered', // You might want to calculate this based on the items in the cart
            'shipping_dep_id' => $rand_shippingdep->id, // Ensure you are saving the ID
        ]);
        if($item->on_stock_quantity <= 0){
            return back()->with('stock','This Item is Out of Stock');
        }
        $item->on_stock_quantity -= 1;
        $item->save();
        // Attach the item to the order
        $order->cart()->attach($item); // Ensure that the `cart` relationship is defined in the Order model
    
        return back()->with('success', 'Order created successfully.');
    }
}
