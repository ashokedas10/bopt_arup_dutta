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
                                <strong>Add New Loan</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/add-new-loan') }}" method="post" enctype="multipart/form-data">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-6">
                                        <label class=" form-control-label">Loan Id <span>(*)</span></label>
                                        <input type="text" id="loan_id" name="loan_id" class="form-control" readonly="" value="{{ $loan_code }}">
										@if ($errors->has('loan_id'))
											<div class="error" style="color:red;">{{ $errors->first('loan_id') }}</div>
										@endif
                                    </div>
									<div class="col-md-6">
                                        <label class=" form-control-label">Loan Type <span>(*)</span></label>
                                        <input type="text" id="loan_type" name="loan_type" class="form-control" value="{{ old('loan_type') }}">
										@if ($errors->has('loan_type'))
											<div class="error" style="color:red;">{{ $errors->first('loan_type') }}</div>
										@endif
                                    </div>
									
                                   </div> 
									<div class="row form-group">
									<div class="col-md-6">
                                        <label class=" form-control-label">Remarks <span>(*)</span></label>
                                        <input type="text" id="remarks" name="remarks"  class="form-control" value="{{ old('remarks') }}">
										
                                    </div>
									<div class="col-md-6">
                                        <label class=" form-control-label">Status <span>(*)</span></label>
                                        <select class="form-control" name="loan_status">
											<option value="" selected disabled>Select</option>
											<option value="active" <?php if(old('loan_status') == 'active'){ echo "selected"; } ?>>Active</option>
											<option value="inactive" <?php if(old('loan_status') == 'inactive'){ echo "selected"; } ?>>Inactive</option>
										</select>
										@if ($errors->has('loan_status'))
											<div class="error" style="color:red;">{{ $errors->first('loan_status') }}</div>
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