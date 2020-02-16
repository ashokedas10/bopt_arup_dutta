@extends('layouts.master')

@section('title')
Payroll Information System-Company
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
                            <div class="card-header">
                                <strong>Add New Loan Configuration</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/add-new-loan-conf') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-4">
                                        <label class=" form-control-label">Loan Id <span>(*)</span></label>
                                        <input type="text" id="loan_config_id" name="loan_config_id" value="{{ $loan_config_code }}" class="form-control" readonly="">
                                    </div>
									<div class="col-md-4">
                                        <label class=" form-control-label">Loan Type <span>(*)</span></label>
                                        <select class="form-control" name="loan_type">
											<option value="" selected disabled>Select</option>
											@foreach($loan_rs as $loan)
											<option value="{{ $loan->loan_type }}" <?php if(old('loan_type') == $loan->loan_type){ echo "selected"; } ?>>{{ $loan->loan_type }}</option>
											@endforeach
										</select>
										@if ($errors->has('loan_type'))
											<div class="error" style="color:red;">{{ $errors->first('loan_type') }}</div>
										@endif
                                    </div>
									<div class="col-md-4">
                                        <label class=" form-control-label">Max. Sanction Amount <span>(*)</span></label>
                                        <input type="text" id="max_sanction_amt" name="max_sanction_amt"  class="form-control" value="{{ old('max_sanction_amt') }}">
										@if ($errors->has('max_sanction_amt'))
											<div class="error" style="color:red;">{{ $errors->first('max_sanction_amt') }}</div>
										@endif
                                    </div>
                                   </div> 
									<div class="row form-group">
									<div class="col-md-4">
                                        <label class=" form-control-label">Max. Time (in months) <span>(*)</span></label>
                                        <input type="text" id="max_time" name="max_time"  class="form-control" value="{{ old('max_time') }}">
										@if ($errors->has('max_time'))
											<div class="error" style="color:red;">{{ $errors->first('max_time') }}</div>
										@endif
                                    </div>
									<div class="col-md-4">
                                        <label class=" form-control-label">Rate of Interest <span>(*)</span></label>
                                        <input type="text" id="rate_of_interest" name="rate_of_interest"  class="form-control" value="{{ old('rate_of_interest') }}">
										@if ($errors->has('rate_of_interest'))
											<div class="error" style="color:red;">{{ $errors->first('rate_of_interest') }}</div>
										@endif
                                    </div>
									<div class="col-md-4">
                                        <label class=" form-control-label">Status <span>(*)</span></label>
                                        <select class="form-control" name="loan_config_status">
											<option value="" selected disabled>Select</option>
											<option value="active" <?php if(old('loan_status') == 'active'){ echo "selected"; } ?>>Active</option>
											<option value="inactive" <?php if(old('loan_status') == 'inactive'){ echo "selected"; } ?>>Inactive</option>
										</select>
										@if ($errors->has('loan_config_status'))
											<div class="error" style="color:red;">{{ $errors->first('loan_config_status') }}</div>
										@endif
                                    </div>
									</div> 
									
									<!--
									<div class="card">
											<div class="card-header">
												<strong class="card-title">Multi Select1</strong>
											</div>
											<div class="card-body">

											  <select data-placeholder="Choose a country..." multiple class="standardSelect">
												<option value="" label="default"></option>
												<option value="United States">United States</option>
												<option value="United Kingdom">United Kingdom</option>
												<option value="Afghanistan">Afghanistan</option>
												<option value="Aland Islands">Aland Islands</option>
												<option value="Albania">Albania</option>
												<option value="Algeria">Algeria</option>
												<option value="American Samoa">American Samoa</option>
												<option value="Andorra">Andorra</option>
												<option value="Angola">Angola</option>
												<option value="Anguilla">Anguilla</option>
												<option value="Antarctica">Antarctica</option>
											</select>

										</div>
									</div>
									-->
									 <button type="submit" class="btn btn-danger btn-sm">Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm"> Reset
                                </button>
								<p>(*) marked fields are mandatory</p>
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
