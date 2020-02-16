@extends('layouts.master')

@section('title')
Payroll Information System-Cast
@endsection

@section('sidebar')
	@include('partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection



@section('scripts')
	@include('partials.scripts')
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
	            <div class="card-header"> <strong>Payment Order</strong> </div>
	            <div class="card-body card-block">
	              <form action="{{url('pis/vw-bank-statement')}}" method="post" style="width: 70%;margin: 0 auto;">
	              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="row form-group">
					<div class="col-md-4">
					<label>Select Month</label>
						<select class="form-control" name="month_yr" required="required">
							<option value="">Select</option>
							@if(isset($month_details) && !empty($month_details))
							@foreach($month_details as $key=>$month)
								<option @if($monthyr == $month->month_yr ) selected="selected" @endif>{{$month->month_yr}}</option>
							@endforeach
							@endif
						</select>
					</div>
	                  <div class="col-md-4">
	                    <label class=" form-control-label">Select Bank</label>
	                    <select class="form-control" name="bank" required="required">
							<option value="">Select</option>
							
							<option value="14">State bank of India</option>
							<option value="">Others Bank</option>
						</select>
	                  </div>
	                  
	                  <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="showbankstatement">Show </button>
	                  </div>
	                </div>
	                
	                
	              </form>
	            </div>
	          </div>

	          <div class="card" >
	            <div class="card-header"> <strong class="card-title">View Payment Order</strong> </div>
				<div class="aply-lv" style="padding-right: 37px;">
					
					<form action="{{url('pis/view-bank-statement')}}" method="post" target="_blank" style="background: none;padding:0;">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<input type="hidden" name="bankname" value="{{ (isset($bankname))?$bankname:'' }}"/>
						<input type="hidden" name="monthyr" value="{{ (isset($monthyr) && !empty($monthyr))?$monthyr:'' }}"/>
						<!-- <a href="{{URL::to('pis/downloadExcel/'.$bankname.'/'.$monthyr)}}" class="btn btn-default">Excel</a> -->
						<button type="submit" class="btn btn-default">View</button>
					</form>
				</div>
				
	            <br/>
	            <div class="clear-fix">
				<div class="card-body card-block">
				<div class="table-responsive">
	              <table id="bootstrap-data-table" class="table table-striped table-bordered">
	                <thead style="text-align:center;vertical-align: middle;">
	                  <tr style="font-size:11px;text-align:center">
					  <th>Employee Code</th>
					  <th>Employee Name</th>
					  <th>Net Salary</th>
					  <th>Month</th>
	                  </tr>
					  
	                </thead>
	                <tbody>
						@php echo $result; @endphp
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
 

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','#showbankstatement',function(){
			$('#View_Bank_Statement').css('display','block');
		});
	})

</script>  -->
@endsection