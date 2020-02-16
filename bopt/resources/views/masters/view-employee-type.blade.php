@extends('masters.layouts.master')

@section('title')
Payroll Information System-Employee Type
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
									<strong class="card-title">Employee Type</strong>
								</div>
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<div class="aply-lv">
								<a href="{{ url('masters/employee-type') }}" class="btn btn-default">Add Employee Type <i class="fa fa-plus"></i></a>
							</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Employee Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					@foreach($employee_type_rs as $employee_type)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                          
                                            <td>{{ $employee_type->employee_type_name  }}</td>
                                               <td><a href='{{ url("masters/employee-type/$employee_type->id") }}'><i class="ti-pencil-alt"></i></a>

						
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
