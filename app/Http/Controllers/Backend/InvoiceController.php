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
use DB;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\Payment;
use App\Model\PaymentDetail;

class InvoiceController extends Controller
{
    public function view(){
        $allData = Invoice::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.invoice.view-invoice', compact('allData'));
    }

    public function add(){
        $data['categories'] = Category::all();
        $invoice_data = Invoice::orderBy('id', 'desc')->first();
        if ($invoice_data == NULL) {
            $firstReg = '0';
            $data['invoice_no'] = $firstReg+1;
        }else {
            $invoice_data = Invoice::orderBy('id', 'desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }

        return view('backend.invoice.add-invoice', $data);
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

    public function delete(Request $request){
        $purchase = Purchase::find($request->id);
        $purchase->delete();

        return redirect()->route('purchases.view')->with('success', 'Data deleted successfully');
    }

    public function pendingList(){
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.view-pending-list', compact('allData'));
    }

    public function approve($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if ($product->save()) {
            DB::table('purchases')->where('id',$id)->update(['status' => 1]);
        }
        return redirect()->route('purchases.pending.list')->with('success', 'Order Approved Successfully');
    }
}
