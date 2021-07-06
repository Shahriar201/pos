<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Purchase Report PDF</title>
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
                                <u><strong><span style="font-size: 15px;">Daily Purchase Report ({{ date('d-m-Y', strtotime($start_date)) }} - {{ date('d-m-Y', strtotime($start_date)) }})</span></strong></u>
                            </td>
                            <td width="30%"></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%">
                    <thead>
                        <tr style="text-align: center">
                            <th>SL.</th>
                            <th>Purchase No</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total_sum = '0';
                        @endphp
                        @foreach ($allData as $key => $purchase)
                        
                        <tr class="{{ $purchase->id }}" style="text-align: center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $purchase->purchase_no }}</td>
                            <td>{{ date('d-m-Y', strtotime($purchase->date)) }}</td>
                            <td>{{ $purchase['product']['name'] }}</td>
                            <td>
                                {{ $purchase->buying_qty }}
                                {{ $purchase['product']['unit']['name'] }}
                            </td>
                            <td>{{ $purchase->unit_price }} TK</td>
                            <td>{{ $purchase->buying_price }} TK</td>
                            
                            @php
                                $total_sum += $purchase->buying_price;
                            @endphp

                        </tr>
                            
                        @endforeach

                        <tr>
                            <td colspan="6" style="text-align:right"><strong>Grand Total</strong></td>
                            <td style="text-align: center"><strong>{{ $total_sum }}</strong> TK</td>
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
