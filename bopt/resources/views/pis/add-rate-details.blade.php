@extends('layouts.master')

@section('title')
Payroll Information System-Rate Details
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
                                <strong>Add Designation Master</strong>
                            </div>
                            	
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									<div class="col-md-6">
                                        <label for="text-input" class=" form-control-label">Select Head Name <span>(*)</span></label>
										
											<select class="form-control" name="head_id">
												<option value='' selected disabled>Select</option>
												@foreach($Rate as $rt)
                                                                                                        <option value='{{ $rt->id }}' >{{ $rt->head_name }}</option>
												@endforeach
											</select>
											@if ($errors->has('head_id'))
												<div class="error" style="color:red;">{{ $errors->first('head_id') }}</div>
											@endif
										</div>
                                    				<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">Enter Minimum Basic <span>(*)</span></label>
                                        <input type="text" id="min_basic" name="min_basic"  class="form-control" value="{{ old('min_basic') }}">
										@if ($errors->has('min_basic'))
											<div class="error" style="color:red;">{{ $errors->first('min_basic') }}</div>
										@endif
                                    </div>
									<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">Enter Maximum Basic <span>(*)</span></label>
                                        <input type="text" id="max_basic" name="max_basic"  class="form-control" value="{{ old('max_basic') }}">
										@if ($errors->has('max_basic'))
											<div class="error" style="color:red;">{{ $errors->first('max_basic') }}</div>
										@endif
                                    </div>
                                        				<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">From Date <span>(*)</span></label>
                                        <input type="datetime"  value="<?php echo date('Y-m-d'); ?>" id="from_date" name="from_date"  class="form-control" >
										@if ($errors->has('sub_cast_name'))
											<div class="error" style="color:red;">{{ $errors->first('sub_cast_name') }}</div>
										@endif
                                    </div>
                                       
                                          				<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">To Date <span>(*)</span></label>
                                        <input type="datetime" value="<?php echo date('Y-m-d');?>" id="to_date" name="to_date"  class="form-control">
										@if ($errors->has('sub_cast_name'))
											<div class="error" style="color:red;">{{ $errors->first('sub_cast_name') }}</div>
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
