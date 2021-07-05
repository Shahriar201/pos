<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Invoice Report PDF</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <td></td>
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
                                <u><strong><span style="font-size: 15px;">Daily Invoice Report ({{ date('d-m-Y', strtotime($start_date)) }} - {{ date('d-m-Y', strtotime($start_date)) }})</span></strong></u>
                            </td>
                            <td width="30%"></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <table border="1px" width="100%">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Total Amount</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total_sum = '0';
                        @endphp
                        @foreach ($allData as $key => $invoice)

                            <tr class="{{ $invoice->id }}">
                                <td>{{ $key+1 }}</td>
                                <td>
                                    {{ $invoice['payment']['customer']['name'] }} <br>
                                    {{ $invoice['payment']['customer']['address'] }},
                                    {{ $invoice['payment']['customer']['mobile_no'] }}
                                </td>
                                <td>#{{ $invoice->invoice_no }}</td>
                                <td>{{ date('d-m-Y', strtotime($invoice->date)) }}</td>
                                <td>{{ $invoice->description }}</td>
                                <td>{{ $invoice['payment']['total_amount'] }} TK</td>
                                @php
                                    $total_sum += $invoice['payment']['total_amount'];
                                @endphp
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right;">Grand Total</td>
                                <td>{{ $total_sum }} TK</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">
                                
                            </td>
                            <td style="width: 60%"></td>
                            <td style="width: 20%; text-align:center;">
                                <p style="text-aign:center; border-bottom: 1px solid #000">Owner Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>
