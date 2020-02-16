@extends('layouts.master')

@section('title')
Payroll Information System-Religion
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
                                <strong>Add New Religion</strong>
                            </div>
                            <div class="card-body card-block">
                                <p>(*) Marked Fields are Mandatory</p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-4">
                                        <label for="email-input" class=" form-control-label">Religion ID <span>(*)</span></label>
        <input type="text" class="form-control" id="rel_id" name="rel_id" value="<?php if(app('request')->input('id')){  echo $getRel[0]->religion_id;   }  ?>{{ old('rel_id') }}">
										@if ($errors->has('rel_id'))
											<div class="error" style="color:red;">{{ $errors->first('rel_id') }}</div>
										@endif
                                    </div>
                                        <div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Religion Name <span>(*)</span></label>                                       
											<input type="text" class="form-control" id="reli_name" name="rel_name" value="<?php if(app('request')->input('id')){  echo $getRel[0]->religion_name;   }  ?>{{ old('reli_name') }}">
											@if ($errors->has('rel_name'))
											<div class="error" style="color:red;">{{ $errors->first('rel_name') }}</div>
											@endif
										</div>
                                          <?php if(app('request')->input('id')){  ?>
                                        
                                        <div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Status<span>(*)</span></label>
                                                    <select class="form-control" name="status">	
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    </select>
											
					</div>
                                        
                                        <?php  } ?>
                                        
									<div class="col-md-4 btn-up">
                                        <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                		<button type="reset" class="btn btn-danger btn-sm"> Reset</button>
										
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