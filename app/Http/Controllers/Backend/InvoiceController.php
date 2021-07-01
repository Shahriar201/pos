<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Invoice;

class InvoiceController extends Controller
{
    public function view(){
        $allData = Invoice::all();
        return view('backend.invoice.view-invoice', compact('allData'));
    }

    public function add(){
        // $data['suppliers'] = Supplier::all();
        // $data['units'] = Unit::all();
        // $data['categories'] = Category::all();
        return view('backend.invoice.add-invoice');
    }

    public function store(Request $request){
        $invoice = new invoice();
        // $total = $pcs * $unit_price;
        $invoice->name = $request->name;
        $invoice->pcs = $request->pcs;
        $invoice->unit_price = $request->unit_price;
        $invoice->total_price = $request->mul;
        $invoice->save();

        return redirect()->route('invoices.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();

        return view('backend.product.add-product', $data);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        // $product->quantity = $request->quantity;
        $product->updated_by = Auth::user()->id;
        $product->save();

        return redirect()->route('products.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $product->delete();

        return redirect()->route('products.view')->with('success', 'Data deleted successfully');
    }
}
