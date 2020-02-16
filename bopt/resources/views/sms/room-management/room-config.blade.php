@extends('sms.room-management.layouts.master')

@section('title')
Room Management
@endsection

@section('sidebar')
	@include('sms.room-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.room-management.partials.header')
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
					<div class="card-header">
                                <strong class="card-title">Add Room Configuration</strong>
                            </div>
							<div class="card-body">
								<form action="{{ url('sms/room-management/room-config') }}" method="post" enctype="multipart/form-data" style="width:800px;margin:0 auto;padding: 30px 0 10px;">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row form-group">
										<div class="col-md-3">
											<label style="float:right;">Select Institute</label>
										</div>
										<div class="col-md-6">
											<select class="form-control" id="institute_code" name="institute_code" onchange="getInstituteName(this.value);">
												<option value='' selected disabled>Select</option>
												@foreach($institute_rs as $institute)
													<option value="{{ $institute->institute_code }}">{{ $institute->institute_name }}</option>
												@endforeach
											</select>
											@if ($errors->has('institute_code'))
												<div class="error" style="color:red;">{{ $errors->first('institute_code') }}</div>
											@endif
											<input type="hidden" name="institute_name" id="institute_name" >
										</div>
										<div class="col-md-3">
											<button type="submit" class="btn btn-danger btn-sm">Go</button>
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
	@include('sms.room-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
		}
		
	</script>
@endsection