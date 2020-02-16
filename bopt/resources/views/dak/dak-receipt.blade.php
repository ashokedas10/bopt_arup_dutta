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
                <!-- Widgets  -->
                <div class="container">
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">	
						<div class="card-header">
									<strong class="card-title">Receipt</strong>
								</div>			
                           @if(Session::has('message'))										
<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-check"></i> {{ Session::get('message') }}</em></div>
@endif	
							
							<div class="card-body">
					
				<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
		<a href="{{ url('dak/addreceipt') }}" class="btn btn-default">
			Create Receipt
		 <i class="fa fa-plus"></i></a>
							</div>
								
							
       <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="overflow-x:scroll;">
                    <thead>


                        <tr>
							<th>Diary Year</th>
							<th>Dairy Number</th>
                            <th>Diary Date</th>
                            <th>Receipt Type</th>
                            <th>Receipt Category</th>
                            <th>Refernce No.</th>
							<th>Reference Date</th>
							<th>Receipt Language</th>
							
							<th>Sender's Name</th>
							<th>Address</th>
							<th>State</th>
							<th>Subject</th>
							<th>Remarks</th>
							<th>Enclosure Details</th>
                            <th>Status</th>
							<th>DAK Recieved Date</th>
							
							<th>Action</th>
							
                        </tr>
                    </thead>
                    <tbody>
                    

                     @foreach($recept_details as $value)
                     
                        <tr>
                            <td>{{$value->diary_year}}</td>
                             <td>{{$value->dairy_no}}</td>
                          <td>{{date('d-m-Y', strtotime($value->diary_date))}}</td>
                            <td>{{$value->receipt_type}}</td>
                            <td>{{$value->receipt_category}}</td>
							<td>{{$value->reference_no}}</td>
                           <td>{{date('d-m-Y', strtotime($value->reference_date))}}</td>
						   <td>{{$value->rec_lan}}</td>
						 
                            <td>{{$value->sender_name}}</td>
                            <td>{{$value->address}}</td>
							<td>{{$value->state}}</td>
                            <td>{{$value->subject}}</td>
                            <td>{{$value->remarks}}</td>                        
							<td>{{$value->enclosure_details}}</td>
                            <td>{{ $value->doc_status }}</td>
                             <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                            
							<td><a href="receipt/{{ $value->id }}"><i class="ti-pencil-alt"></i></a>

	<a href="{{url('dak/receiptdel')}}?pid=<?php echo urlencode(base64_encode($value->id)); ?>" onclick="return confirm('Are You Sure, Want to Delete');"><i class="ti-trash"></i></a>

							</td>
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
