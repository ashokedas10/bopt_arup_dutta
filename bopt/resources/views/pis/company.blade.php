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

  <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">
                            <div class="card-header">
                                <strong>Create New Company Information</strong>
								
                            </div>
                            <div class="card-body card-block">
							
                                <form action="{{ url('pis/company') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
									
									
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Company Code <span class="error" >(*)</span></label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="company_code" name="company_code"  class="form-control" value="{{ old('company_code') }}">
										@if ($errors->has('company_code'))
											<div class="error" style="color:red;">{{ $errors->first('company_code') }}</div>
										@endif
										</div>
										
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Company Name <span class="error" >(*)</span></label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="company_name" name="company_name"  class="form-control" value="{{ old('company_name') }}">
										@if ($errors->has('company_name'))
											<div class="error" style="color:red;">{{ $errors->first('company_name') }}</div>
										@endif
										</div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Company Address <span class="error" >(*)</span></label></div>
                                       <div class="col-12 col-md-9"><textarea id="comapny_address" name="comapny_address" rows=5 class="form-control" > {{ old('company_address') }} </textarea>
									   @if ($errors->has('comapny_address'))
											<div class="error" style="color:red;">{{ $errors->first('comapny_address') }}</div>
										@endif
										</div>
                                    </div>
									 <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Company Pan </label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="company_pan" name="company_pan"  class="form-control" value="{{ old('company_pan') }}"></div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Company Tax No.</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="company_tax" name="company_tax"  class="form-control" value="{{ old('company_tax') }}"></div>
                                    </div>
                                   
								   <div class="row form-group">
                                        <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Order Address</label></div>
                                       <div class="col-12 col-md-9"><textarea id="order_address" name="order_address" rows=5 class="form-control" style="height:100px;">{{ old('order_address') }} </textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Accountant Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="accountant_name" name="accountant_name"  class="form-control" value="{{ old('accountant_name') }}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Accountant Father Name</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="accountant_father_name" name="accountant_father_name"  class="form-control" value="{{ old('accountant_father_name') }}"></div>
                                    </div>
									 <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Accountant Designation</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="accountant_designation" name="accountant_designation"  class="form-control" value="{{ old('accountant_designation') }}"></div>
                                    </div>
									 <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter Name</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_name" name="etos_deducter_name"  class="form-control" value="{{ old('etos_deducter_name') }}" ></div>
                                    </div>
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter Address</label></div>
                                       <div class="col-12 col-md-9"><textarea id="etos_deducter_address" name="etos_deducter_address" rows=5 class="form-control"> {{ old('etos_deducter_address') }} </textarea></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter State</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_state" name="etos_deducter_state"  class="form-control" value="{{ old('etos_deducter_state') }}"></div>
                                    </div>
									
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter Pin</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_pin" name="etos_deducter_pin"  class="form-control" value="{{ old('etos_deducter_pin') }}"></div>
                                    </div>
									
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter Email</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_email" name="etos_deducter_email"  class="form-control" value="{{ old('etos_deducter_email') }}"></div>
                                    </div>
									
									
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter STD Code</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_std" name="etos_deducter_std"  class="form-control" value="{{ old('etos_deducter_std') }}"></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Deducter Telephone No.</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_deducter_tel" name="etos_deducter_tel"  class="form-control" value="{{ old('etos_deducter_tel') }}"></div>
                                    </div>
						
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Name</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_name" name="etos_person_name"  class="form-control" value="{{ old('etos_person_name') }}"></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Designation</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_designation" name="etos_person_designation"  class="form-control" value="{{ old('etos_person_designation') }}" ></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Address</label></div>
										<div class="col-12 col-md-9"><textarea id="etos_person_address" name="etos_person_address" rows=5 class="form-control">{{ old('etos_person_address') }} </textarea></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person State</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_state" name="etos_person_state"  class="form-control" {{ old('etos_person_state') }} ></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Pin</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_pin" name="etos_person_pin"  class="form-control" value="{{ old('etos_person_pin') }}"></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Email</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_email" name="etos_person_email"  class="form-control" value="{{ old('etos_person_email') }}"></div>
                                    </div>
									
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Mobile No.</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_mobile" name="etos_person_mobile"  class="form-control" value="{{ old('etos_person_mobile') }}"></div>
                                    </div>
									
									
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person STD Code</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_std" name="etos_person_std"  class="form-control" value="{{ old('etos_person_std') }}"></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">ETOS Person Telephone No.</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="etos_person_tel" name="etos_person_tel"  class="form-control" value="{{ old('etos_person_tel') }}"></div>
                                    </div>
									
									<div class="row form-group">
                                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">PF Accountant Prefix</label></div>
                                       <div class="col-12 col-md-9"><input type="text" id="pf_accountant_prefix" name="pf_accountant_prefix"  class="form-control" value="{{ old('pf_accountant_prefix') }}"></div>
                                    </div>
									
									
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Company Logo</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="company_logo" name="company_logo" multiple="" class="form-control-file" value="{{ old('company_logo') }}"></div>
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
									
									<div class="card-body">
										<button type="submit" class="btn btn-danger btn-sm">Submit
										</button>
										<button type="reset" class="btn btn-danger btn-sm"> Reset
										</button>
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
