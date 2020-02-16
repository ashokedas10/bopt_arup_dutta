@extends('layouts.master')

@section('title')
Payroll Information System
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
            <div class="card-header"> <strong>View PF Statement</strong> </div>
            <div class="card-body card-block">
              <form action="{{ url('pis/pf-statement') }}" target="_blank" method="post">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row form-group">
                 <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select Company <span>(*)</span></label>                                       
							<select class="form-control" name="company_id" onchange="getGrades(this.value);">
								<option value="" selected disabled>Select</option>
								@foreach($company_rs as $company)
								<option value="{{ $company->id }}">{{ $company->company_name }}</option>
								@endforeach
							</select>
							@if ($errors->has('company_id'))
								<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
							@endif
				</div>
				<div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select Grade <span>(*)</span></label>                                       
							<select class="form-control" name="grade_id" id="grade_id">
							<option value="" selected disabled>Select</option>
							</select>
							@if ($errors->has('grade_id'))
								<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
							@endif
				</div>
                   <div class="col-md-4">
						<label class=" form-control-label">Month</label>
						<select data-placeholder="Choose Month..." name="month" id="month" class="form-control">
							 <?php 
							for($yy=2018;$yy<=2030;$yy++)
							{
								for($mm=1; $mm <= 12; $mm++)
								{ 												
									if($mm<10)
									{
										$month_yr='0'.$mm."/".$yy;
									}												
									else
									{
										$month_yr=$mm."/".$yy;														
									}
							?>
								<option value="<?php  echo $month_yr; ?>"><?php echo $month_yr; ?></option>
							<?php 
								
								}
							}
							?>
						</select>
						@if ($errors->has('month'))
							<div class="error" style="color:red;">{{ $errors->first('month') }}</div>
						@endif
				</div>
                    
                </div>
                <button type="submit" class="btn btn-danger btn-sm">View </button>
                <button type="reset" class="btn btn-danger btn-sm"> Download as Excel</button>
                
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
    @endsection
	
@section('scripts')
	@include('partials.scripts')
	<script>
		function getGrades(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('pis/get-grades')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#grade_id").html(response);
				
				}
				
			});
		}
	</script>
@endsection