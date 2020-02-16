@extends('dak.layouts.master')

@section('title')
Dak Module
@endsection

@section('sidebar')
	@include('dak.partials.sidebar')
@endsection

@section('header')
	@include('dak.partials.header')
@endsection



@section('content')
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="container">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">	
						<div class="card-header">
									<strong class="card-title">Forward</strong>
								</div>			
                           
							
							<div class="card-body">
					
				<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
					<a href="{{ url('dak/addforward') }}" class="btn btn-default">
						Inbox <i class="fa fa-plus"></i></a>
				</div>
								
				
       <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="overflow-x:scroll;">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
							<th>Diary Year</th>
							<th>Dairy Number</th>
                            <th>Diary Date</th>
                            <th>Forward No.</th>
                            <th>Forward Date</th>
                            <th>Forward To</th>
                            <th>Receipt Type</th>
                            <th>Refernce No.</th>
							<th>Reference Date</th>
							<th>Sender's Name</th>
							<th>Status</th>
							<th>DAK Recieved Date</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($forward_details as $value)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->diary_year}}</td>
                            <td>{{$value->dairy_no}}</td>
                          	<td>{{date('d-m-Y', strtotime($value->diary_date))}}</td>
                            <td>{{$value->dak_forward_no}}</td>
                             <td>{{date('d-m-Y', strtotime($value->forwarddate))}}</td>
                             <td>{{ $value->emp_fname }} {{ $value->emp_mname }}  {{ $value->emp_lname }}</td>
                             <td>{{$value->receipt_type}}</td>
							<td>{{$value->reference_no}}</td>
                            <td>{{date('d-m-Y', strtotime($value->reference_date))}}</td>
                            <td>{{$value->sender_name}}</td>
                            <td>{{$value->dak_status}}</td>
                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
							<td><a href='{{url("dak/forward/$value->forward_id")}}'><i class="ti-pencil-alt"></i></a></td>
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
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
