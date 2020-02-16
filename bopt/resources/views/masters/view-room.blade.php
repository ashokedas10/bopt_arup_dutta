@extends('masters.layouts.master')

@section('title')
Configuration-Room
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
                                <strong class="card-title">Room</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('masters/room') }}" class="btn btn-default">Add New Room <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                       <tr>									   
											<th>Room Id</th>
											<th>Location</th>
                                            <th>Building No.</th>
											<th>Floor No.</th>
											<th>Room No.</th>
											<th>Room Capacity</th>
											<th>Room Type</th>
											<th>Accessories</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									    @foreach($room_rs as $room)
                                        <tr>
											<td>{{ $room->room_code }}</td>
											<td>{{ $room->location }}</td>
                                            <td>{{ $room->building_no }}</td>
                                            <td>{{ $room->floor_no }}</td>											
											<td>{{ $room->room_number }}</td>
											<td>{{ $room->room_capacity }}</td>
                                            <td>{{ $room->room_type_name }}</td>											
											<td>{{ $room->accessories_name }}</td>
											<td>{{ $room->room_status }}</td>
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
@include('masters.partials.scripts')

@endsection