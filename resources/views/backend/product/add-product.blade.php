@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Product</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                                    Edit Product
                                @else
                                    Add Product
                                @endif

                                <a class="btn btn-success float-right btn-sm" href="{{ route('products.view') }}">
                                    <i class="fa fa-list"></i>Product List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)? route('products.update', $editData->id): route('products.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                               
                                <div class="form-group col-md-4">
                                    <label for="">Supplier Name</label>
                                    <select name="supplier_id" id="supplier_id" class="form-control select2">
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ (@$editData->supplier_id == $supplier->id)? "selected" : "" }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Unit</label></label>
                                    <select name="unit_id" class="form-control select2">
                                        <option value="">Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}" {{ (@$editData->unit_id == $unit->id) ? 'selected' : '' }}>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Category</label></label>
                                    <select name="category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ (@$editData->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Name</label></label>
                                    <input type="text" name="name" value="{{ @$editData->name }}" id="name" class="form-control">
                                </div>
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