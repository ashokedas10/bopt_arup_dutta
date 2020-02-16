@extends('layouts.master')

@section('title')
Payroll Information System-Cast
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
                                <strong>Add New Cast</strong>
                            </div>
                            <div class="card-body card-block">
                                <p>(*) Marked Fields are Mandatory</p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-4">
                                        <label for="email-input" class=" form-control-label">Cast ID <span>(*)</span></label>
        <input type="text" class="form-control" id="cast_id" name="cast_id" value="<?php if(app('request')->input('id')){  echo $getCast[0]->cast_id;   }  ?>{{ old('cast_id') }}">
										@if ($errors->has('cast_id'))
											<div class="error" style="color:red;">{{ $errors->first('cast_id') }}</div>
										@endif
                                    </div>
                                        <div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Cast Name <span>(*)</span></label>                                       
											<input type="text" class="form-control" id="cast_name" name="cast_name" value="<?php if(app('request')->input('id')){  echo $getCast[0]->cast_name;   }  ?>{{ old('cast_name') }}">
											@if ($errors->has('cast_name'))
											<div class="error" style="color:red;">{{ $errors->first('cast_name') }}</div>
											@endif
										</div>
                                          <?php if(app('request')->input('id')){  ?>
                                        
                                        <div class="col-md-4">
                                        <label for="text-input" class=" form-control-label">Status<span>(*)</span></label>
                                                    <select class="form-control" name="cast_status">	
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