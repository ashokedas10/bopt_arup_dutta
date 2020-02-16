@extends('masters.layouts.master')

@section('title')
Configuration-Faculty
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
		<div class="card">
            <div class="card-header"><strong class="card-title">Add Institute wise Configuration</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/add-inst-wise-config-ais-next') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<div class="emp-descp-main">   
								<div class="col-md-4 emp-desc">Employee Id: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Employee Name: <span>Dibyendu Paul</span></div>
								<div class="col-md-4 emp-desc">Designation: <span>Manager</span></div>
								<div class="col-md-4 emp-desc">Grade: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Date of Application: <span>13.10.2018</span></div>
								</div>-->
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
						<input type="hidden" name="institute_code" value="{{ $ins_code }}">
                      <label for="text-input" class=" form-control-label">Class Name</label>
                        <select data-placeholder="Select..." multiple="" class="standardSelect" name="class_code[]" required>
                           
                            @foreach($class_rs as $class)
                            <option value="{{ $class->class_code }}">{{ $class->class_code }}</option>
							@endforeach
                        </select>
						@if ($errors->has('class_code'))
							<div class="error" style="color:red;">{{ $errors->first('class_code') }}</div>
						@endif
                    </div>
                    
					
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="status" required>
                        <option value=""  selected disabled>Select</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
					  @if ($errors->has('status'))
						<div class="error" style="color:red;">{{ $errors->first('status') }}</div>
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
@endsection

@section('scripts')
@include('masters.partials.scripts')


<!-- Scripts -->
<!--<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>-->
@endsection
