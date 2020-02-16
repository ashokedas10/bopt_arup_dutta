@extends('layouts.master')

@section('title')
Payroll Information System-Designation
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
                                <strong>Add New Branch</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/branch') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									<div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Branch Code <span>(*)</span></label>                                       
											<input type="text" class="form-control" name="branch_code" id="branch_code" value="{{ old('branch_code') }}">
											@if ($errors->has('branch_code'))
												<div class="error" style="color:red;">{{ $errors->first('branch_code') }}</div>
											@endif
									</div>
                                    
									<div class="col-md-4">
                                        <label for="email-input" class=" form-control-label">Branch Name <span>(*)</span></label>
                                        <input type="text" id="branch_name" name="branch_name" class="form-control" value="{{ old('branch_name') }}">
											@if ($errors->has('branch_name'))
												<div class="error" style="color:red;">{{ $errors->first('branch_name') }}</div>
											@endif
                                    </div>
									<div class="col-md-4">
                                        <label for="email-input" class=" form-control-label">Phone No. <span>(*)</span></label>
                                        <input type="text" id="phone" name="phone"  class="form-control" value="{{ old('phone') }}" >
											@if ($errors->has('phone'))
												<div class="error" style="color:red;">{{ $errors->first('phone') }}</div>
											@endif
                                    </div>
                                   </div> 
								   
								   <div class="row form-group">
									<div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Address <span>(*)</span></label>                                       
											<textarea rows="3" class="form-control" name="address" id="address">{{ old('address') }}</textarea>
											@if ($errors->has('address'))
												<div class="error" style="color:red;">{{ $errors->first('address') }}</div>
											@endif
										</div>
                                    
									<div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Location <span>(*)</span></label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location') }}">
											@if ($errors->has('location'))
												<div class="error" style="color:red;">{{ $errors->first('location') }}</div>
											@endif
                                    </div>
									<div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Status <span>(*)</span></label>
                                        <select class="form-control" name="branch_status" >
										<option value="" selected disabled>Select</option>
											<option value="active" <?php if( old('branch_status') == "active"){ echo "selected"; } ?>>Active</option>
											<option value="inactive" <?php if( old('branch_status') == "inactive"){ echo "selected"; } ?> >Inative</option>
										</select>
											@if ($errors->has('branch_status'))
												<div class="error" style="color:red;">{{ $errors->first('branch_status') }}</div>
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
								<p>(*) Marked Fields are Mandatory</p>
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
