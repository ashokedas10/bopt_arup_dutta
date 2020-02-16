@extends('layouts.master')

@section('title')
Payroll Information System-Deduction Head
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
                                <strong>Add Deduction Head</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ url('pis/deduction-head') }}" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    
									<div class="col-md-6">
                                        <label class=" form-control-label">Deduction Name <span>(*)</span></label>
                                        <input type="text" id="head_name" name="head_name"  class="form-control" value="{{ old('head_name') }}">
										@if ($errors->has('head_name'))
											<div class="error" style="color:red;">{{ $errors->first('head_name') }}</div>
										@endif
                                    </div>
									<div class="col-md-6">
                                        <label class=" form-control-label">Alias <span>(*)</span></label>
                                        <input type="text" id="alias_name" name="alias_name"  class="form-control" value="{{ old('alias_name') }}">
										@if ($errors->has('alias_name'))
											<div class="error" style="color:red;">{{ $errors->first('alias_name') }}</div>
										@endif
                                    </div>
									
                                   </div> 
									<div class="row form-group">
									<div class="col-md-12">
                                        <label class=" form-control-label">Description <span>(*)</span></label>
                                        <textarea rows="5" class="form-control" name="description" >{{ old('description') }}</textarea>
										@if ($errors->has('description'))
											<div class="error" style="color:red;">{{ $errors->first('description') }}</div>
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
									 <button type="submit" class="btn btn-danger btn-sm">Save
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
