@extends('masters.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
@endsection



@section('scripts')
	@include('masters.partials.scripts')
@endsection

@section('content')

 <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">

                    <div class="main-card">
                        <div class="card">

								<div class="card-header">
									<strong class="card-title">Stipend Bank </strong>
								</div>

								@if(Session::has('message'))
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif

								<div class="aply-lv">
									<a href="{{ url('masters/stipendbank') }}" class="btn btn-default">Add Stipend Bank Master <i class="fa fa-plus"></i></a>
								</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Bank Name</th>
											<th>Branch Name</th>
											<th>IFSC Code</th>
											<th>MICR Code</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($bank_rs as $bank)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bank->master_bank_name }}</td>
											<td>{{ $bank->branch_name }}</td>
                                            <td>{{ $bank->ifsc_code }}</td>
											<td>{{ $bank->swift_code }}</td>
											<td>
												<a href="{{url('masters/stipendbank?id='.$bank->id)}}"><i class="ti-pencil-alt"></i></a>
												<!--<a href="{{url('masters/delete-bank/'.$bank->id)}}" onclick="return confirm('Are you sure you want to delete this department?');"><i class="ti-trash"></i></a>-->
					      					</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                        </div>

                    </div>

                    </div>



                </div>
                <!-- /Widgets -->



            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->



@endsection
