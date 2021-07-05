<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice PDF</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <td><strong>Invoice No: #</strong>{{ $invoice->invoice_no }}</td>
                        <td>
                            <span style="font-size: 20px; background: #ddd">Shikder Electronics
                            </span>
                            <br>
                                Pachilokki Bazar, Kalampur, Chandhara
                        </td>
                        <td>
                            <span>Showroom: 01899776555</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <table>
                    <tbody>
                        <tr>
                            <td width="45%"></td>
                            <td>
                                <u><strong><span style="font-size: 15px;">Customer Invoice</span></strong></u>
                            </td>
                            <td width="30%"></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                @php
                    $payment = App\Model\Payment::where('invoice_id', $invoice->id)->first();
                @endphp

                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>Name: </strong>{{ $payment['customer']['name'] }}</td>
                            <td width="30%"><strong>Mobile: </strong>{{ $payment['customer']['mobile_no'] }}</td>
                            <td width="40%"><strong>Address: </strong>{{ $payment['customer']['address'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%" style="margin-bottom: 10px">
                    <thead>
                        <tr class="text-center">
                            <th>SL.</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach ($invoice['invoice_details'] as $key => $details)
                            <tr class="text-center">
                                
                                <td>{{ $key+1 }}</td>
                                <td>{{ $details['category']['name'] }}</td>
                                <td>{{ $details['product']['name'] }}</td>
                                <td>{{ $details->selling_qty }}</td>
                                <td>{{ $details->unit_price }}</td>
                                <td>{{ $details->selling_price }}</td>
                            </tr>
                            @php
                                $total_sum += $details->selling_price;
                            @endphp
                        @endforeach

                        <tr>
                            <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                            <td class="text-center"><strong>{{ $total_sum }} TK</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Discount</td>
                            <td class="text-center"><strong>{{ $payment->discount_amount }} TK</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Paid Amount</td>
                            <td class="text-center"><strong>{{ $payment->paid_amount }} TK</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Due Amount</td>
                            <td class="text-center"><strong>{{ $payment->due_amount }} TK</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
                            <td class="text-center"><strong>{{ $payment->total_amount }} TK</strong></td>
                        </tr>
                        
                    </tbody>
                </table>
                @php
                    $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp
                <i>Printing Time: {{ $date->format('F j, Y, g:i a') }}</i>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">
                                <p style="text-align: center; margin-left: : 10px;">Customer Signature</p>
                            </td>
                            <td style="width: 60%"></td>
                            <td style="width: 20%; text-align:center;">
                                <p style="text-aign:center;">Seller Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
