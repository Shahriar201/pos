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
                                    Select Criteria

                                    {{-- <a class="btn btn-success float-right btn-sm" href="{{ route('invoice.view') }}">
                                        <i class="fa fa-list"></i>Invoice List</a> --}}
                                </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                {{-- User add form --}}
                                <form method="GET" action="{{ route('daily.invoice.report.pdf') }}" target="_blank" id="myForm" enctype="multipart/form-data">

                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label>Start Date</label>
                                            <input type="text" name="start_date" id="start_date"
                                                class="form-control datepicker form-control-sm" placeholder="YYYY-MM-DD"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>End Date</label>
                                            <input type="text" name="end_date" id="end_date"
                                                class="form-control datepicker1 form-control-sm" placeholder="YYYY-MM-DD"
                                                readonly>
                                        </div>

                                        <div class="form-group col-md-1" style="padding-top:30px;">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </div>


                                </form>


                            </div>

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

    <!--Datepicker-->
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
        $('.datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

    <!-- Page specific script validation -->
    <script>
        $(function() {

            $('#myForm').validate({
                rules: {
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                },
                messages: {
                    start_date: {
                        required: "Please enter start date"
                    },
                    end_date: {
                        required: "Please enter end date"
                    },
                    
                    //terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


@endsection
