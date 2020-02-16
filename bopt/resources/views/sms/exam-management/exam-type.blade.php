@extends('sms.exam-management.layouts.master')

@section('title')
Exam Management
@endsection

@section('sidebar')
	@include('sms.exam-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.exam-management.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Exam Type</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('sms/exam-management/exam-type') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Exam Type</label>
                      <input type="text" class="form-control" name="exam_type_name" value="{{ old('exam_type_name') }}">
					  	@if ($errors->has('exam_type_name'))
						<div class="error" style="color:red;">{{ $errors->first('exam_type_name') }}</div>
						@endif
                    </div>
                    
                    <div class="col-md-4">
					<label>Status</label>
                    <select class="form-control" name="exam_type_status">
							<option value=""  selected disabled>Select</option>
							<option value="active">Active</option>
							<option value="inactive">Inactive</option>
						</select>
						@if ($errors->has('exam_type_status'))
						<div class="error" style="color:red;">{{ $errors->first('exam_type_status') }}</div>
						@endif
					</div>
					
					<div class="col-md-4 btn-up">
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
					</div>
                  </div>
				  
				 
					 
				 
                </div>
				
              </form>
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
	@include('sms.exam-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
		}
		
	</script>
@endsection