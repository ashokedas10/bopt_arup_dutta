@extends('sms.routine-management.layouts.master')

@section('title')
Routine Management-Semester
@endsection

@section('sidebar')
	@include('sms.routine-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.routine-management.partials.header')
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
                                <strong class="card-title">Semester </strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('sms/routine-management/semester') }}" class="btn btn-default">Add New Semester <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Semester Name</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($semester_rs as $semester)
                                        <tr>
                                            <td>{{ $semester->semester_name }}</td>
											<td>{{ $semester->semester_status }}</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                    
                    
                </div>
                <!-- /Widgets -->
               
                
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
		
		
        <div class="clearfix"></div>

@endsection

@section('scripts')
	@include('sms.routine-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
		}
		
	</script>
@endsection