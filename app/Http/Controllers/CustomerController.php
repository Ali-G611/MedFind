<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'birth' => 'date|required',
            'phone' => 'string|required',
            'first_name' => 'string|max:10|required',
            'last_name' => 'string|max:15|required',
            'location' => 'string|required|max:100',
        ]);
        // Create a new Customer instance and fill it with validated data
        $user = Auth::user();
        $customer = new Customer();
        $customer->fill($validatedData);
    
        // Associate the customer with the user
        $user->customer()->save($customer);
        return back();
    }
    public function update(Request $request){
        $validatedData = $request->validate([
            'birth' => 'date|required',
            'phone' => 'string|required',
            'first_name' => 'string|max:10|required',
            'last_name' => 'string|max:15|required',
            'location' => 'string|required|max:100',
        ]);
        // Create a new Customer instance and fill it with validated data
        $user = Auth::user();
        $customer = $user->customer;
        $customer->fill($validatedData);
        // Associate the customer with the user
        $customer->save();
        return back();
    }
}
