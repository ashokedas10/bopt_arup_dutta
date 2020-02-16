@extends('layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
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
									<strong class="card-title">Branch Master</strong>
								</div>
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<div class="aply-lv">
								<a href="{{ url('pis/branch') }}" class="btn btn-default">Add New Branch <i class="fa fa-plus"></i></a>
							</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Branch Code</th>
                                            <th>Branch Name</th>
                                            <th>Address</th>
                                            <th>Ph No.</th>
                                            <th>Location</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 @foreach($branch_rs as $branch)
                                        <tr>
                                            <td>{{ $branch->branch_code }}</td>
                                            <td>{{ $branch->branch_name }}</td>
                                            <td>{{ $branch->address }}</td>
                                            <td>{{ $branch->phone }}</td>
											<td>{{ $branch->location }}</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a>
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


@section('scripts')
	@include('partials.scripts')
@endsection