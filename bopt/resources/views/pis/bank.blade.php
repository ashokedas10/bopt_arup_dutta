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
                                <strong>Add Bank Master</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/bank') }}" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">                                    
									<div class="col-md-6">
                                        <label class=" form-control-label">Enter Bank Name <span>(*)</span></label>
                                        <input type="text" id="bank_name" name="bank_name"  class="form-control" value="{{ old('bank_name') }}">
										@if ($errors->has('bank_name'))
											<div class="error" style="color:red;">{{ $errors->first('bank_name') }}</div>
										@endif
                                    </div>
									<div class="col-md-6">
                                        <label class=" form-control-label">Enter Branch Name <span>(*)</span></label>
                                        <input type="text" id="branch_name" name="branch_name"  class="form-control" value="{{ old('branch_name') }}">
										@if ($errors->has('branch_name'))
											<div class="error" style="color:red;">{{ $errors->first('branch_name') }}</div>
										@endif
                                    </div>
                                   </div> 
								   
									<div class="row form-group">
									<div class="col-md-6">
                                        <label class=" form-control-label">IFSC Code <span>(*)</span></label>
                                        <input type="text" id="ifsc_code" name="ifsc_code"  class="form-control" value="{{ old('ifsc_code') }}" >
										@if ($errors->has('ifsc_code'))
											<div class="error" style="color:red;">{{ $errors->first('ifsc_code') }}</div>
										@endif
                                    </div>
									<div class="col-md-6">
                                        <label class=" form-control-label">Enter Swift Code <span>(*)</span></label>
                                        <input type="text" id="swift_code" name="swift_code"  class="form-control" value="{{ old('swift_code') }}" >
										@if ($errors->has('swift_code'))
											<div class="error" style="color:red;">{{ $errors->first('swift_code') }}</div>
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
        <div class="clearfix"></div>
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->





@endsection
