@extends('masters.layouts.master')

@section('title')
BOPT - Masters Module
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
@endsection



@section('scripts')
	@include('masters.partials.scripts')
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
                                <strong>Add New Caste</strong>
                            </div>
                            <div class="card-body card-block">
                                <p>(*) Marked Fields are Mandatory</p>
                                <form action="" method="post" enctype="multipart/form-data">
                                    
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                                    

                    <div class="col-md-6">
              <label for="text-input"  class=" form-control-label">Caste Name <span>(*)</span></label> 
              
              <input type="text" class="form-control" id="cast_name" name="cast_name" value="<?php if(app('request')->input('id')){  echo $getCast[0]->cast_name;   }  ?>{{ old('cast_name') }}">

				@if ($errors->has('cast_name'))
				<div class="error" style="color:red;">{{ $errors->first('cast_name') }}</div>
				@endif
                  
			</div>
              <?php if(app('request')->input('id')){  ?>
                                        
                <div class="col-md-6">
                <label for="text-input" class=" form-control-label">Status<span>(*)</span></label>
                            <select class="form-control" name="cast_status">	
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            </select>
											
					</div>
                                        
                    <?php  } ?>
                                        
				<div class="col-md-4">
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
            		
                </div>
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
         @endsection