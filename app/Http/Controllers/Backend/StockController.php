<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use PDF;

class StockController extends Controller
{
    public function stockReport(){
        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->get();
        return view('backend.stock.stock-report', compact('allData'));
    }

    public function stockReportPdf(){
        $data['allData'] = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->get();         
        $pdf = PDF::loadView('backend.pdf.stock-report-pdf', $data);
    
        return $pdf->stream('stock-report.pdf');
    }

    public function SupplierProductWise(){
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        return view('backend.stock.supplier-product-wise-report', $data);
    }
    
    public function SupplierWisePdf(Request $request){
        $data['allData'] = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->where('supplier_id', $request->supplier_id)->get();         
        $pdf = PDF::loadView('backend.pdf.supplier-wise-stock-report-pdf', $data);
    
        return $pdf->stream('supplier-wise-stock-report.pdf');
    }

    public function ProductWisePdf(Request $request){
        $data['product'] = Product::where('category_id', $request->category_id)->where('id', $request->product_id)->first();         
        $pdf = PDF::loadView('backend.pdf.product-wise-stock-report-pdf', $data);
    
        return $pdf->stream('supplier-wise-stock-report.pdf');
    }
}
