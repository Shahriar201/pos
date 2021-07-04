@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pending Invoice List</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pending Invoice</li>
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
                            <h3>Pending Invoice List
                                {{-- <a class="btn btn-success float-right btn-sm" href="">
                                    <i class="fa fa-plus-circle"></i>Add Invoice</a> --}}
                                
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
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
                                            <td>
                                                @if ($invoice->status == '0')
                                                    <span style="background: #FC4236; padding: 5px;">Pending</span>
                                                @elseif ($invoice->status == '1')
                                                    <span style="background: #5EAB00; padding: 5px;">Approaved</span>   
                                                @endif
                                            </td>
                                            
                                            <td>
                                                {{-- <a title="Edit" id="edit" class="btn btn-sm btn-primary" href="{{ route('purchases.edit', $purchase->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a> --}}

                                                @if ($invoice->status == '0')
                                                    <a title="Approve" class="btn btn-sm btn-success" href="{{ route('invoice.approve', $invoice->id) }}">
                                                        <i class="fa fa-check-circle"></i>
                                                    </a>
                                                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('invoice.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $invoice->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                                
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

@endsection