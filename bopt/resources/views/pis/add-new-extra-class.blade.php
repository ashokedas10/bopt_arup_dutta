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
                            <div class="card-header">Extra Class Allowance</strong>
                            </div>
                            
								<div class="card-body card-block">
                                <form action="{{ url('pis/add-new-extra-class') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                   
								   <input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="row form-group">
											<div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Company Name</label>
												<select class="form-control" name="company_id" onchange="getGrades(this.value);getBranches(this.value);">
													<option value="" selected disabled>Select</option>
													@foreach($company_rs as $company)
													<option value="{{ $company->id }}">{{ $company->company_name }}</option>
													@endforeach
												</select>
												@if ($errors->has('company_id'))
													<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
												@endif
											</div>
											
											<div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Grade</label>
												<select class="form-control" name="grade_id" id="grade_id">
													<option value="" selected disabled>Select</option>
							
												</select>
												@if ($errors->has('grade_id'))
													<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
												@endif
											</div>
											
											<div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Branch Name</label>
												<select class="form-control" name="branch_id" id="branch_id" >
													<option value="" selected disabled>Select</option>
													
												</select>
												@if ($errors->has('branch_id'))
													<div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
												@endif
											</div>
											
											<div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Allowance Amount</label>
												<input type="text" class="form-control" id="allowance_amount" name="allowance_amount" value="{{ old('allowance_amount') }}">
												@if ($errors->has('allowance_amount'))
													<div class="error" style="color:red;">{{ $errors->first('allowance_amount') }}</div>
												@endif
											</div>
										<div class="col-md-4 btn-up"><button type="submit" class="btn btn-danger btn-sm">Add</button></div>
									</div>
									
									   
                                </form>
                            </div>
								 <div class="clear-fix">
                                
                           
                         
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
	
	<script>
		function getBranches(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('pis/get-branches')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#branch_id").html(response);
				
				}
				
			});
		}
	</script>
@endsection