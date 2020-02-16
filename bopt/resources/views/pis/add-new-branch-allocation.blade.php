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
                                <strong>Add New Branch Allocation</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/add-new-branch-allocation') }}" method="post" enctype="multipart/form-data" style="width:800px;margin:0 auto;">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									<div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Select Company <span>(*)</span></label>                                       
											<select class="form-control" name="company_id" id="company_id" >
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
											<label for="email-input" class=" form-control-label">Branch Name <span>(*)</span></label>
											<select class="form-control" name="branch_id" id="branch_id">
												<option value="" selected disabled>Select</option>
												@foreach($branch_rs as $branch)
												<option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
												@endforeach
											</select>
											@if ($errors->has('branch_id'))
											<div class="error" style="color:red;">{{ $errors->first('branch_id') }}</div>
											@endif
										</div>
										
										<div class="text-right col-md-4 btn-up">
											<button type="submit" class="btn btn-danger btn-sm">Submit</button>
											<button type="reset" class="btn btn-danger btn-sm"> Reset</button>
											<p>(*) Marked Fields are Mandatory</p>
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
