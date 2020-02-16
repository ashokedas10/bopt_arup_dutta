@extends('dak.layouts.master')

@section('title')
Dak Module
@endsection

@section('sidebar')
	@include('dak.finalpartials.sidebar')
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
									<strong class="card-title">Final</strong>
					    </div>			
                           
							
							<div class="card-body">
					
				<!-- <div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
					<a href="{{ url('dak/addfinal') }}" class="btn btn-default">
						Create Final <i class="fa fa-plus"></i></a>
				</div> -->
								
							
       <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="overflow-x:scroll;">
        
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Diary Year</th>
                            <th>Dairy Number</th>
                            <th>Diary Date</th>
                            <th>Receipt Type</th>
                            <th>Refernce No.</th>
                            <th>Reference Date</th>
                            <th>Sender's Name</th>
                            <th>Status</th>
                            <th>DAK Recieved Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="final">
                     @foreach($final_details as $key => $value)
                        <tr class="finaldata">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->diary_year}}</td>
                            <td>{{$value->dairy_no}}</td>
                            <td>{{date('d-m-Y', strtotime($value->diary_date))}}</td>
                            <td class="receipt_type">{{$value->receipt_type}}</td>
                            <td>{{$value->reference_no}}</td>
                            <td>{{date('d-m-Y', strtotime($value->reference_date))}}</td>
                            <td>{{$value->sender_name}}</td>
                            <td>{{ucfirst($value->doc_status)}}</td>
                            <td>{{date('d-m-Y', strtotime($value->finaldate))}}</td>
                            <td><a href='{{url("dak/editfinal/$value->final_id")}}'><i class="ti-pencil-alt"></i></a></td>
                        </tr>
                    @endforeach                       
                    </tbody>
                  
                </table>


				</div>
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        $(".final").on('change', function() {
            var receipt_type_val = $(this).closest("td").find(".receipt_type").val();
            console.log(receipt_type_val);
        });
    });
    
    </script> -->
        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection