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
                                <strong>Add Grade Master</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
			
									<div class="col-md-6">
                                        <label for="email-input" class=" form-control-label">Enter Grade <span>(*)</span></label>
                                        <input type="text" id="grade_name" name="grade_name"  class="form-control" value="<?php  if(app('request')->input('id')){  echo $getGrade[0]->grade_name; } ?>{{ old('grade_name') }}" >
										@if ($errors->has('grade_name'))
											<div class="error" style="color:red;">{{ $errors->first('grade_name') }}</div>
										@endif
                                    </div>
                                          <?php if(app('request')->input('id')){  ?>
                                        
                                        <div class="col-md-6">
                                        <label for="text-input" class=" form-control-label">Status<span>(*)</span></label>
                                                    <select class="form-control" name="status">	
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    </select>
											
					</div>
                                        
                                        <?php  } ?>  
                                        
                                   </div> 
					
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
