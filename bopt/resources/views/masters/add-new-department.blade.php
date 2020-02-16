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
                                <strong>Add New Department</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row form-group">
									
                     <input type="hidden" id="department_code" name="department_code" value="">
									
                      <div class="col-md-4">
                      <label style="float: right;" for="text-input" class=" form-control-label">
                       Department Name <span>(*)</span></label> 
                       </div>

            <div class="col-md-4">  
          <input type="text" class="form-control" id="department_name" name="department_name" value="<?php if(isset($_GET['id'])){  echo $departments[0]->department_name;  }?>{{ old('department_name') }}">
                                                                            
											
	       @if ($errors->has('department_name'))
			<div class="error" style="color:red;">{{ $errors->first('department_name') }}</div>
			@endif
			</div>
			<div class="col-md-4">
                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
        		
				<p>(*) Marked Fields are Mandatory</p>
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