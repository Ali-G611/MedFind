<?php

namespace App\Http\Controllers;

use App\Models\DeliverEmployee;
use Illuminate\Http\Request;

class DeliverEmployeeController extends Controller
{
    public function create(){
        return view('deliverEmployee.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'string|max:12',
            'phone' => 'string|max:20',
            'wage' => 'decimal:2,2',
            'address'=>'string'
        ]);
        DeliverEmployee::create($request->all());
        return back();
    }
    public function edit(DeliverEmployee $deliverEmployee){
        return view('deliverEmployee.edit',compact('deliverEmployee'));
    }

    public function update(Request $request,DeliverEmployee $deliverEmployee){
        $request->validate([
            'name'=>'string',
        ]);
        $deliverEmployee->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'wage' => $request->get('wage'),
            'address'=>$request->get('address')
        ]);
        return back();
    }
    public function destroy(DeliverEmployee $deliverEmployee){
        $deliverEmployee->delete();
        return back();
    }
}
