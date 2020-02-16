@extends('dak.layouts.master')

@section('title')
Dak Receipt
@endsection

@section('sidebar')
	@include('dak.finalpartials.sidebar')
@endsection

@section('header')
	@include('dak.partials.header')
@endsection

@section('scripts')
	@include('dak.partials.scripts')
@endsection
<style type="text/css">
  .dash-mar h2 {background: linear-gradient(to right, #28ca8e 30% , #0aa3de);color: #fff;padding: 5px 10px;margin-top: 15px;font-size: 23px;}
  table tr th{
    vertical-align: top;
    color: #c75b0b;
   font-weight: normal;
   padding: 10px 20px;
}
table tr td{
padding: 10px 20px !important;
    font-size: 13px;
}
td{vertical-align:middle !important;}
.incre a {
    background: #099a29;
    color: #fff;
    padding: 7px 13px;
    font-size: 14px;
    border-radius: 4px;
  border:2px solid #099a29;transition:1s;
}
.incre:hover a{color:#099a29;background:transparent;}
table tr:nth-child(even) {background: #ecf6f9;}
table thead tr th{padding: 10px 20px !important;vertical-align:top !important;text-align: center;}
table tr:last-child{border-bottom:none;}
</style>
@section('content')


 <!-- Content -->
        <div class="content">

          <div class="animated fadeIn">
           <div class="dash-mar">
	  <div class="container">
	  <div class="row">
	  <div class="col-md-12">
        <h2>Incoming Forward Receipt</h2>
   
		<table class="table table-responsive" style="background: #fff;margin: 15px 0;box-shadow: 0 9px 12px -5px;">
			@if(Auth::user()->user_type == 'admin')
			<thead>
			<tr>
				<th>Sl No.</th>
				<th>Diary Year</th>
				<th>Dairy Number</th>
                <th>Diary Date</th>
                <th>Forward No.</th>
                <th>Forward Date</th>
                <th>Receipt Type</th>
                <th>Refernce No.</th>
				<th>Reference Date</th>
				<th>Sender's Name</th>
				<th>Status</th>
				<th>DAK Recieved Date</th>
				<!-- <th>Action</th> -->
			</tr>
			</thead>
			<tbody>

               @foreach($final_details as $value)
                  <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->diary_year}}</td>
                            <td>{{$value->dairy_no}}</td>
                          	<td>{{date('d-m-Y', strtotime($value->diary_date))}}</td>
                            <td>{{$value->dak_forward_no}}</td>
                             <td>{{date('d-m-Y', strtotime($value->forwarddate))}}</td>
                             <td>{{$value->receipt_type}}</td>
							<td>{{$value->reference_no}}</td>
                            <td>{{date('d-m-Y', strtotime($value->reference_date))}}</td>
                            <td>{{$value->sender_name}}</td>
                            <td>{{$value->dak_status}}</td>
                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
							
                        </tr>
				@endforeach                       
              </tbody>
              @else
              <thead>
			<tr>
				<th>Sl No.</th>
				<th>Diary Year</th>
				<th>Dairy Number</th>
                <th>Diary Date</th>
                <th>Forward No.</th>
                <th>Forward Date</th>
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

               @foreach($final_details as $value)
                  <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->diary_year}}</td>
                            <td>{{$value->dairy_no}}</td>
                          	<td>{{date('d-m-Y', strtotime($value->diary_date))}}</td>
                            <td>{{$value->dak_forward_no}}</td>
                             <td>{{date('d-m-Y', strtotime($value->forwarddate))}}</td>
                             <td>{{$value->receipt_type}}</td>
							<td>{{$value->reference_no}}</td>
                            <td>{{date('d-m-Y', strtotime($value->reference_date))}}</td>
                            <td>{{$value->sender_name}}</td>
                            <td>{{$value->dak_status}}</td>
                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
							<td class="appr" style="text-align: center;"><a href='{{url("dak/final/$value->id")}}'><i class="ti-pencil-alt"></i></a></td>
                        </tr>
				@endforeach                       
              </tbody>
              @endif
			
		</table>
		
	  </div>
       </div> 
      </div>
		</div>   
		</div>
  </div>
        <!-- /.content -->
        <div class="clearfix"></div>
       


@endsection
