@extends('masters.layouts.master')

@section('title')
Configuration-Subject
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
					<div class="card-header">
                                <strong class="card-title">Subject Configuration</strong>
                            </div>
							<div class="card-body">
								<form action="#" method="post" enctype="multipart/form-data" style="width:800px;margin:0 auto;padding: 30px 0 10px;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row form-group">
										<div class="col-md-3">
											<label style="float:right;">Select Institute</label>
										</div>
										<div class="col-md-6">
											<select class="form-control" name="institute_code" id="institute_code" onchange="getinscode(this.value);">
												<option value="" selected disabled>Select</option>
												@foreach($institute_rs as $ins)
												<option value="{{ $ins->institute_code }}">{{ $ins->institute_name }}</option>
												@endforeach
											</select>
											<input type="hidden" name="institute_name" id="institute_name">
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
<script src="{{ asset('js/lib/chosen/chosen.jquery.min.js') }}"></script>-->

<script>
    /*jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });*/
	
	/*function getinscode(val)
	{
		//alert(val);
		var ins_name = val;
		$.ajax({
				type:'GET',
				url:'{{url('masters/get-ins-code')}}/'+ins_name,			
				success: function(response){
				console.log(response); 
				
				$("#ins_code").val(response);
				
				}
				
			});
	}*/
	
	
		function getinscode()
		{
			//alert(val);
			var institute_name=$("#institute_code :selected").text();
			$("#institute_name").val(institute_name);
		}
		
	</script>
</script>
@endsection