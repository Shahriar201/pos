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
                            <h3>
                                @if(isset($editData))
                                    Edit Invoice
                                @else
                                    Add Invoice
                                @endif

                                <a class="btn btn-success float-right btn-sm" href="{{ route('invoices.view') }}">
                                    <i class="fa fa-list"></i>Invoice List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)? route('invoices.update', $editData->id): route('invoices.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ @$editData->name }}" id="name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>PCS</label>
                                    <input type="number" name="pcs" value="{{ @$editData->pcs }}" id="pcs" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Unit Price</label>
                                    <input type="number" name="unit_price" value="{{ @$editData->unit_price }}" id="unit_price" class="form-control">
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label>Total Price</label>
                                    <input type="number" name="total_price" value="{{ @$editData->total_price }}" id="total_price" class="form-control">
                                </div> --}}
                                
                                {{-- <div class="form-group col-md-6">
                                    <label>Quantity</label></label>
                                    <input type="text" name="quantity" value="{{ @$editData->quantity }}" id="name" class="form-control">
                                </div> --}}

                                <div class="form-group col-md-6" style="padding-top:30px">
                                    <input type="submit" value="{{ (@$editData)? 'Update': 'Submit' }}" class="btn btn-primary">
                                </div>
                            </div>    
                              
                              
                          </form>

                            
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

<!-- Page specific script validation -->
<script>
    $(function () {
      
      $('#myForm').validate({
        rules: {
          supplier_id: {
            required: true,
          },
          unit_id: {
            required: true,
          },
          category_id: {
            required: true,
          },
          name: {
            required: true,
          },
          quantity: {
            required: true,
          },

        },
        messages: {
          supplier_id: {
            required: "Select supplier"
          },
          unit_id: {
            required: "Select unit"
          },
          category_id: {
            required: "Select category"
          },
          name: {
            required: "Please enter product name"
          },

          //terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

@endsection