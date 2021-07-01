@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Invoice</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>Invoice List
                                <a class="btn btn-success float-right btn-sm" href="{{ route('invoices.add') }}">
                                    <i class="fa fa-plus-circle"></i>Add Invoice</a>
                                
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Product Name</th>
                                        <th>PCS</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
                                        {{-- <th>Quantity</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
                                $total = 0;
                                @endphp

                                <tbody>
                                    @foreach ($allData as $key => $invoice)

                                    <tr class="{{ $invoice->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $invoice->name }}</td>
                                        <td>{{ $invoice->pcs }}</td>
                                        <td>{{ $invoice->unit_price }}</td>
                                        <td id="total_price">{{ $invoice->total_price}}</td>
                                        {{-- <td>{{ $invoice->quantity }}</td> --}}
                                        
                                        <td>
                                            <a title="Edit" id="edit" class="btn btn-sm btn-primary" href="{{ route('invoices.edit', $invoice->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('invoices.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $invoice->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>

                </section>

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- <script>
    $(document).ready(function(){
    // Get value on keyup funtion
    $("#price, #qty").keyup(function(){

    var total=0;    	
    var x = Number($("#price").val());
    var y = Number($("#qty").val());
    var total=x * y;  

    $('#total').val(total);

});
});
</script> --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#total_price', function() {
            var pcs = $(this).val();
            var unit_price = $(this).val();
            $.ajax({
                url: "{{ route('view') }}",
                type: "GET",
                data: {
                    pcs: pcs,
                    unit_price:unit_price
                },
                success: function(data) {
                    
                }
            });
        });
    });
</script>
@endsection