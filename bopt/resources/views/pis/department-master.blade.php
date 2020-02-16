@extends('layouts.master')

@section('title')
Payroll Information System-Designation
@endsection

@section('sidebar')
	@include('partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection



@section('scripts')
	@include('partials.scripts')
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
									<strong class="card-title">Department Master</strong>
								</div>
    
@if(Session::has('delete'))										
<div class="alert alert-danger" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > <i class="fa fa-trash"></i> {{ Session::get('delete') }} </em></div>
@endif	
@if(Session::has('message'))										
<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-check"></i> {{ Session::get('message') }}</em></div>
@endif	

								<div class="aply-lv">
								<a href="{{ url('pis/add-new-department') }}" class="btn btn-default">Add New Department <i class="fa fa-plus"></i></a>
							</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Department Code</th>
                                            <th>Department Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($department_rs as $department)
                                        <tr>
                                            <td>{{ $department->department_code }}</td>
                                            <td>{{ $department->department_name }}</td>
                                            <td><a href="{{url('pis/add-new-department/')}}?id={{$department->id}}"><i class="ti-pencil-alt"></i></a>
						<a href="{{url('pis/vw-department/')}}?del={{$department->id}}" onclick="return confirm('Are you sure you want to delete this department?');"><i class="ti-trash"></i></a>
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
      @endsection
