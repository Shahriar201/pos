<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SupplierController extends Controller
{
    public function view(){
        $allData = Supplier::all();
        return view('backend.supplier.view-supplier', compact('allData'));
    }

    public function add(){
        return view('backend.supplier.add-supplier');
    }

    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->mobile = $request->mobile;
        $supplier->email = $request->email;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = Supplier::find($id);

        return view('backend.supplier.edit-supplier', compact('editData'));
    }

    public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->mobile = $request->mobile;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('suppliers.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $supplier = Supplier::find($request->id);
        $supplier->delete();

        return redirect()->route('suppliers.view')->with('success', 'Data deleted successfully');
    }
};

