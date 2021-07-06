<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Report PDF</title>
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
                            <td width="60%"></td>
                            <td>
                                <u><strong><span style="font-size: 15px; background:burlywood">Stock Report</span></strong></u>
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
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Unit</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($allData as $key => $product)

                        <tr style="text-align: center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product['supplier']['name'] }}</td>
                            <td>{{ $product['category']['name'] }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product['unit']['name'] }}</td>
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
