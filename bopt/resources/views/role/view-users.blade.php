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
                        <!--<div class="card">
                            <div class="card-header">
                                <strong><i class="fa fa-eye" aria-hidden="true"></i> View Tour Status for the Month: October, 2018</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
                                    
                                    
                                    <div class="row form-group">
									<div class="col-md-6">
                                        <label for="from-date" class=" form-control-label">From Date (*)</label>
                                        <input type="date" id="from-date" name="from-date" placeholder="dd/mm/yyyy" class="form-control">
										<p>(*) marked fields are mandatory</p>
                                   </div>
								   <div class="col-md-6">
                                        <label for="to-date" class=" form-control-label">To Date (*)</label>
                                        <input type="date" id="from-date" name="to-date" placeholder="dd/mm/yyyy" class="form-control">
										</div>
                                    </div>
							<div class="card-body" style="text-align:center;">
                                <button type="button" class="btn btn-danger btn-sm">Search</button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                            </div>		
                                   
                           
							
                            
							
							</form>
							
							
                        </div>
                        
                    </div>-->
                       
                    <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Users</strong>
                            </div>
							@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('role/vw-user-config') }}" class="btn btn-default">Add New User <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Sl. No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
				                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                              <td>{{ $user->email }}</td>
                                            <td><a href='{{url("role/vw-user-config/$user->id")}}'><i class="ti-pencil-alt"></i></a>
                                            <!--<a href="#"><i class="ti-trash"></i></a>--></td>
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
