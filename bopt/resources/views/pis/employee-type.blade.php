@extends('layouts.master')

@section('title')
Payroll Information System-Employee Type
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
                                <strong>Add Employee Type</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/employee-type') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
						
                                    
									<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">Enter Employee Type (*)</label>
                                        <input type="text" id="employee_type_name" name="employee_type_name"  class="form-control" value="{{ old('employee_type_name') }}">
										@if ($errors->has('employee_type_name'))
											<div class="error" style="color:red;">{{ $errors->first('employee_type_name') }}</div>
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
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->





@endsection
