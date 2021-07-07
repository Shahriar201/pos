<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credit Customer PDF</title>
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
                                <u><strong><span style="font-size: 15px;">Credit Customer List</span></strong></u>
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
                        <tr>
                            <th>SL.</th>
                            <th>Customer Name</th>
                            <th>Invoice No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $total_due = '0';
                        @endphp

                        @foreach ($allData as $key => $payment)

                            <tr class="{{ $payment->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $payment['customer']['name'] }}
                                    ({{ $payment['customer']['mobile_no'] }} - {{ $payment['customer']['address'] }}
                                    )
                                </td>
                                <td>Invoice No #{{ $payment['invoice']['invoice_no'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($payment['invoice']['date'])) }}</td>
                                <td style="text-align: center">{{ $payment->due_amount }} TK</td>
                                @php
                                    $total_due += $payment->due_amount;
                                @endphp

                            </tr>

                        @endforeach

                        <tr>
                            <td colspan="4" style="text-align: right;"><strong>Grand Total</strong></td>
                            <td style="text-align: center">{{ $total_due }} TK</td>
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
                {{-- <hr style="margin-bottom: 0px;"> --}}
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">

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
