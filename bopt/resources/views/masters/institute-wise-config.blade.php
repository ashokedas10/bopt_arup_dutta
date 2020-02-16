@extends('masters.layouts.master')

@section('title')
Configuration-Course Configuration
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
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
                                <strong class="card-title">View Course Configuration</strong>
                            </div>
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('masters/add-inst-wise-config-au') }}" class="btn btn-default">Add Course Configuration <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Institute Name</th>
                                            <th>School</th>
											 <th>Branch</th>
											<th>Course</th>
											<th>Class</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($ins_config_rs as $ins_config)
                                        <tr>
                                            <td>{{ $ins_config->institute_name }}</td>
                                            <td>{{ $ins_config->faculty_name }}</td>
											 <td>{{ $ins_config->branch_name }}</td>
											<td>{{ $ins_config->course_name }}</td>
											<td>{{ $ins_config->class_name }}</td>
											<td>{{ $ins_config->status }}</td>
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
		
		
        @endsection

@section('scripts')
@include('masters.partials.scripts')

@endsection