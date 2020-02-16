@extends('layouts.master')

@section('title')
GPF System-Company
@endsection

@section('sidebar')
    @include('gpf.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('scripts')
    @include('gpf.scripts')
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
	            <div class="card-header"> <strong>Employee Wise GPF Report</strong> </div>
	            <div class="card-body card-block">
                    @if(Session::has('message'))
					<div class="alert alert-danger" style="text-align:center;">
						<span class="glyphicon glyphicon-ok" ></span>
						<em> {{ Session::get('message') }}</em>
					</div>
					@endif
	            <form action="" method="post" style="width: 70%;margin: 0 auto;" target="_blank">
	              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="row form-group">



		                <div class="col-md-6">
                            <label>Employee List <span>(*)</span></label>
                            <select class="form-control" name="employee_id" id="employee_id" required>
                            	<option value="">Select Employee</option>
                            	@foreach($employeelist as $employee)
                            	<option value="{{ $employee->emp_code}}">{{ $employee->emp_fname .' '. $employee->emp_mname .' '.$employee->emp_lname }} ({{ $employee->emp_code}})</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                                <label>Choose Year</label>
                                <select name="financial_year"  class="form-control" required>
                                    <option value="">Please Select Your Year </option>
                                    <?php  $cur_year = date('Y');
                                        for ($i=0; $i<=5; $i++) {
                                            $years= $cur_year--;
                                            $previous_year = $years+1;
                                            ?>
                                            <option value="<?php echo $years.'-'.$previous_year ?>"><?php echo $years.'-'.$previous_year ?> </option>

                                    <?php } ?>
                                </select>
                            </div>


	                </div>



	                <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="showbankstatement">Show </button>
	                </div>

	              </form>
	            </div>
	          </div>


	        </div>
	      </div>
	      <!-- /Widgets -->
	    </div>
	    <!-- .animated -->
  	</div>
  	<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script>


	function populateBranch(){

        var bank_name = $("#bank_id option:selected" ).val();

        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank')}}/'+bank_name,
            success: function(response){

                obj=JSON.parse(response)
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }

                $('#bank_branch_id').html(option);
            }
        });
    }

</script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
