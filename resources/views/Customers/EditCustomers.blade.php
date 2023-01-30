@extends('layouts.master')
@section('css')
 <!-- Internal Data table css -->
 <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
 <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
 <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
 <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
 <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
 <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">cu
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Customers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ edit Customer</span>
						</div>
					</div>


				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">



                    @if (session()->has('Edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('Edit') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif








                <div class="card">



                    <div class="col-lg-12 col-md-12">







                        <div class="modal-body">
                            <form action="/updatecustomer/{{ $cust->id }}" method="post" autocomplete="off"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row row-sm">

                                    <input type="hidden" value="{{ $cust->id }}" name="id" readonly>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">user_name</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{$cust->user_name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">first_name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{$cust->first_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last_name</label>
                                        <input type="text" class="form-control" id="Last_name" name="Last_name" value="{{$cust->Last_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$cust->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Salary</label>
                                        <input type="number" class="form-control" id="Salary" name="Salary" value="{{$cust->Salary}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">status</label>
                                        <input type="number" class="form-control" id="status" name="status" value="{{$cust->status}}">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Confirm

                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                                href="Customers.AllCustomers">Close</a>
                                        </button>
                                    </div>
                                </div>

                            </form>




                        </div>

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
@endsection
