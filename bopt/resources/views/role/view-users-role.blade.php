@extends('role.layouts.master')
@section('title')
BOPT - Module
@endsection
@section('sidebar')
	@include('role.partials.sidebar')
@endsection

@section('header')
	@include('role.partials.header')
@endsection
@section('scripts')
	@include('role.partials.scripts')
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
                                <strong class="card-title">Users</strong>
                            </div>
							@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('role/user-role') }}" class="btn btn-default">Add New User Role <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Sl. No.</th>
                                        <th>User ID</th>
                                        <th>Module Name</th>
                                        <th>Sub Module Name</th>
                                        <th>Menu</th>
                                        <th>Rights</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
				                    @foreach($roles as $role)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->member_id }}</td>
                                    <td>{{ $role->module_name }}</td>
                                    <td>{{ $role->sub_module_name }}</td>
                                    <td>{{ $role->menu_name }}</td>
                                    <td>{{ $role->rights }}</td>
                                    <td><!--<a href='{{url("role/user-role/$role->id")}}'><i class="ti-pencil-alt"></i></a>-->
                                    <a href='{{url("role/view-users-role/$role->id")}}' onclick="return confirm('Are you sure you want to delete this Access?');">
                                    <i class="ti-trash"></i></a></td>
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
