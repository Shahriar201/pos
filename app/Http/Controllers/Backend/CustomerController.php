<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;
use Auth;
use App\Model\Payment;
use App\Model\PaymentDetail;
use PDF;

class CustomerController extends Controller
{
    public function view(){
        $allData = Customer::all();
        return view('backend.customer.view-customer', compact('allData'));
    }

    public function add(){
        return view('backend.customer.add-customer');
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->created_by = Auth::user()->id;
        $customer->save();

        return redirect()->route('customers.view')->with('success', 'Data inserted successfully');
    }

    public function edit($id){
        $editData = Customer::find($id);

        return view('backend.customer.add-customer', compact('editData'));
    }

    public function update(Request $request, $id){
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->updated_by = Auth::user()->id;
        $customer->save();

        return redirect()->route('customers.view')->with('success', 'Data updated successfully');

    }

    public function delete(Request $request){
        $customer = Customer::find($request->id);
        $customer->delete();

        return redirect()->route('customers.view')->with('success', 'Data deleted successfully');
    }

    public function creditCustomer(){
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();

        return view('backend.customer.customer-credit', compact('allData'));
    }

    public function creditCustomerPdf(){
        $data['allData'] = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
          
        $pdf = PDF::loadView('backend.pdf.credit-customer-pdf', $data);
    
        return $pdf->stream('credit-customer.pdf');
    }

    public function editInvoice($invoice_id){
        $payment = Payment::where('invoice_id', $invoice_id)->first();
        // dd($payment->toArray());
        return view('backend.customer.edit-invoice', compact('payment'));
    }

    public function updateInvoice(Request $request, $invoice_id){
        if ($request->new_paid_amount < $request->paid_amount) {
            return redirect()->back()->with('error', 'Sorry! you have paid maximum value');
        }else {
            $payment = Payment::where('invoice_id', $invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;

            if ($request->paid_status == 'full_paid') {
                $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount'] + $request->new_paid_amount;
                $payment->due_amount = '0';                
                $payment_details->current_paid_amount = $request->new_paid_amount;                          
            }elseif ($request->paid_status == 'partial_paid') {
                $payment->paid_amount = Payment::where('invoice_id', $invoice_id)->first()['paid_amount'] + $request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id', $invoice_id)->first()['due_amount'] - $request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;                
            }
            $payment->save();
            $payment_details->invoice_id = $invoice_id;
            $payment_details->date = date('Y-m-d', strtotime($request->date));
            $payment_details->updated_by = Auth::user()->id;
            $payment_details->save();

            return redirect()->route('customer.credit')->with('success', 'Invoice Successfully Updated');
        }
    }
}
