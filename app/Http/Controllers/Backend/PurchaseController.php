<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use App\Model\Purchase;

class PurchaseController extends Controller
{
    public function view(){
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.view-purchase', compact('allData'));
    }

    public function add(){
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.purchase.add-purchase', $data);
    }

    public function store(Request $request){

        if ($request->category_id == NULL) {
            return redirect()->back()->with('error', 'Sorry! you do not select any item');
        }else {
            $count_category = count($request->category_id);
            for ($i=0; $i <$count_category ; $i++) { 
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }
        }

        return redirect()->route('purchases.view')->with('success', 'Data inserted successfully');
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
