@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--------------------------multi delete---------------->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Customers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    All Customers</span>
            </div>
        </div>


    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <!-----------------------------multi delete------------------------------------------------------------------------->

        @if (Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check"></i>
                        {{ $msg }}
                    </div>
                @endforeach
            @else
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                </div>
            @endif
        @endif




        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <img src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40" alt="logo">

                    <div class="d-flex justify-content-between">

                        <h2>Welcome to <font color="green">Pelcro </font> System</h2>

                        <!----The btn of model of add categery with ajax---->
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-primary btn-block" href="Customers.AddCustomers">
                                Add New Customers</a>

                        </div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>


                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">

                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">All Customers Table</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <a class="btn btn-danger delete_all" data-url="{{ url('customerDeleteAll') }}">Delete All
                                Selected</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table key-buttons text-md-nowrap">
                                    <thead>
                                        <tr class="table-success" style="text-align: center">
                                            <th scope="col"><input type="checkbox" id="master"></th>
                                            <th class="border-bottom-0">ID</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Salary</th>
                                            <th class="border-bottom-0">Status</th>

                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($C as $tt )
                                        <tr style="text-align: center" id="tr_{{ $tt->id }}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $tt->id }}">
                                            </td>
                                            <td>{{ $tt->id  }}</td>
                                            <td>{{ $tt->user_name }}</td>
                                            <td>{{ $tt->email }}</td>
                                            <td>{{ $tt->Salary }}</td>
                                            <td>{{ $tt->status }}</td>
                                                <td><a href="customer-show/{{ $tt->id }}" class="btn btn-success">View</a>
                                                    <a href="customeredit/{{ $tt->id }}" class="btn btn-warning">Edit</a>
                                                    <a href="Deletecustomer/{{ $tt->id }}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>












            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <!-------------------------------------------multi delete------------------------------------------------------------------>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js">
    </script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/Jquery-Table-Check-All/dist/TableCheckAll.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            $('.delete_all').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    var check = confirm("Are you sure you want to delete this row?");
                    if (check == true) {
                        var join_selected_values = allVals.join(",");
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + join_selected_values,
                            success: function(data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                        $.each(allVals, function(index, value) {
                            $('table tr').filter("[data-row-id='" + value + "']").remove();
                        });
                    }
                }
            });
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function(event, element) {
                    element.trigger('confirm');
                }
            });
            $(document).on('confirm', function(e) {
                var ele = e.target;
                e.preventDefault();
                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
