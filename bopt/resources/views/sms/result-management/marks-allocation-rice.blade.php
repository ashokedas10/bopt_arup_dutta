@extends('sms.result-management.layouts.master')

@section('title')
Result Management
@endsection

@section('sidebar')
	@include('sms.result-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.result-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add Marks Allocation</strong></div>
            <div class="card-body card-block">
              <form action="add-marks-allocation-view.php" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<?php if(old('institute_code')==''){ $institute=$institute_code; }else{ $institute=old('institute_code');} ?>
					<input type="hidden" name="institute_code" id="institute_code" value="{{ $institute }}" >
                  <div class="row form-group lv-due-body">
                    
					<div class="col-md-3">
                      <label>Select Branch</label>
						<select class="form-control" name="branch_code" onchange="getCourse(this.value);">
						<option value="" selected disabled>Select</option>
						@foreach($branch_rs as $branch)
							<option value="{{ $branch->branch_code }}" >{{ $branch->branch_name }}</option>
						@endforeach
						</select>
                    </div>
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Course Name</label>
                      <select class="form-control">
                            <option value="" label="Select">Select</option>
                            <option value="Bank PO/Clerk">Bank PO/Clerk</option>
                            <option value="WBCS">WBCS</option>
							<option value="Rail">Rail</option>
							<option value="SSC">SSC</option>
                        </select>
                    </div>
					<div class="col-md-3">
					<label>Batch</label>
						<select class="form-control">
                            <option value="" label="Select">Select</option>
                            <option value="BT(2018-19)">BT(2018-19)</option>
                            <option value="BT(2019-20)">BT(2019-20)</option>
                        </select>
					</div>
					<div class="col-md-3 btn-up">
						<button type="submit" class="btn btn-danger btn-sm">Go</button>
					</div>
					</div>
					
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
		
		
        <div class="clearfix"></div>
@endsection

@section('scripts')
	@include('sms.result-management.partials.scripts')
	
	<script>
		
		function getCourse(branch_code)
		{
			var institute_code=$("#institute_code").val();
			$.ajax({
				type:'GET',
				url:'{{url('sms/admission/get-branch-course')}}/'+institute_code+'/'+branch_code,				
				success: function(response){
					console.log(response); 
				
					$("#course_code").html(response);
				
				}
				
			});
		}
		
	</script>
@endsection