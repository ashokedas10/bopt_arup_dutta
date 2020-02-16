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
                                <strong>Add New Department</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-4">
                                        <label for="email-input" class=" form-control-label">Department Code <span>(*)</span></label>
        <input type="text" class="form-control" id="department_code" name="department_code" value="<?php if(isset($_GET['id'])){  echo $departments[0]->department_code;  }?>{{ old('department_code') }}">
										@if ($errors->has('department_code'))
											<div class="error" style="color:red;">{{ $errors->first('department_code') }}</div>
										@endif
                                    </div>
                                        <div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Department Name <span>(*)</span></label>                                       
											<input type="text" class="form-control" id="department_name" name="department_name" value="<?php if(isset($_GET['id'])){  echo $departments[0]->department_name;  }?>{{ old('department_name') }}">
											@if ($errors->has('department_name'))
											<div class="error" style="color:red;">{{ $errors->first('department_name') }}</div>
											@endif
										</div>
									<div class="col-md-4 btn-up">
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