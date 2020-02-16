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
                                <strong>Edit Rate</strong>
                            </div>
                           

                            @if ($errors->any())
		                   <div class="alert alert-danger">
				           <ul>
				            @foreach ($errors->all() as $error)
				              <li>{{ $error }}</li>
				            @endforeach
				            </ul>
				           </div><br />
				           @endif     
                            <div class="card-body card-block">
                                <form action="{{ url('masters/rate-details') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" class="form-control" name="id" value="{{ $ratedtl[0]->id }}">
                                    <div class="row form-group">
									<div class="col-md-3">
                                        <label for="email-input" class=" form-control-label">Rate Type<span>(*)</span></label>
        							<input type="text" class="form-control" id="head_name" name="head_name" value="{{ $ratedtl[0]->head_name }}" readonly="1">
                                    </div>

                                    <div class="col-md-3">
                                    <label for="text-input" class=" form-control-label">In Percentage <span>(*)</span></label>                                       
										<input type="text" class="form-control" id="inpercentage" name="inpercentage" value="{{ $ratedtl[0]->inpercentage }}">
									</div>

									<div class="col-md-3">
	                                <label for="text-input" class=" form-control-label">In Rupees <span>(*)</span></label>                                       
										<input type="text" class="form-control" id="inrupees" name="inrupees" value="{{ $ratedtl[0]->inrupees }}">
									</div>

									<div class="col-md-3 btn-up">
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