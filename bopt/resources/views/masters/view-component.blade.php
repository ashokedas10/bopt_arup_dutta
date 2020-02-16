@extends('masters.layouts.master')

@section('title')
Configuration-Components
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
                                <strong class="card-title">COMPONENTS</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('masters/component') }}" class="btn btn-default">Add New Component <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl. No.</th>
											<th>Component Name</th>
											<th>Component Type</th>
											<th>Component Unit</th>
											<th>Rate (Per Unit)</th>
											<th>Min. Stock Level Quantity</th>
											<th>Details</th>
											<th>HSN Code</th>
											<th>SAC Code</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($component_rs as $component)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
											<td>{{ $component->component_name }}</td>
											<td>{{ $component->component_type }}</td>
                                            <td>{{ $component->unit_name }}</td>
											<td>{{ $component->rate }}</td>
											<td>{{ $component->min_stock_level }}</td>
											<td>{{ $component->details }}</td>
											<td>{{ $component->hsn_code }}</td>
											<td>{{ $component->sac_code }}</td>
											<td>{{ $component->component_status }}</td>
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