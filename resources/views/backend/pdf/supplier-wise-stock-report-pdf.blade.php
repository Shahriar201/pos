<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier Wise Stock Report PDF</title>
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
                <strong>Supplier Name: </strong>{{ $allData['0']['supplier']['name'] }}
                <table>
                    <tbody>
                        <tr>
                            <td width="60%"></td>
                            <td>
                                <u><strong><span style="font-size: 15px; background:burlywood">Supplier Wise Stock
                                            Report</span></strong></u>
                            </td>
                            <td width="20%"></td>
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
                            {{-- <th>Supplier Name</th> --}}
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>In Quantity</th>
                            <th>Out Quantity</th>
                            <th>Stock</th>
                            <th>Unit</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($allData as $key => $product)
                            @php
                                $buying_total = App\Model\Purchase::where('category_id', $product->category_id)
                                    ->where('product_id', $product->id)
                                    ->where('status', '1')
                                    ->sum('buying_qty');
                                $selling_total = App\Model\InvoiceDetail::where('category_id', $product->category_id)
                                    ->where('product_id', $product->id)
                                    ->where('status', '1')
                                    ->sum('selling_qty');
                            @endphp

                            <tr style="text-align: center">
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $product['supplier']['name'] }}</td> --}}
                                <td>{{ $product['category']['name'] }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $buying_total }}</td>
                                <td>{{ $selling_total }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product['unit']['name'] }}</td>
                            </tr>

                        @endforeach

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
