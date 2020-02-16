@extends('layouts.master')

@section('title')
Payroll Information System-PTAX
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
	            <div class="card-header"> <strong>Salary Statement</strong> </div>
	            <div class="card-body card-block">
                        @if(Session::has('message'))										
			<div class="alert alert-danger" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
	              <form action="" method="post" target="_blank" style="width: 70%;margin: 0 auto;">
	              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="row form-group">
                            
					<div class="col-md-4">
					<label>Select Month</label>
						<select data-placeholder="Choose Month..." name="month_yr" id="month" class="form-control">
                             <?php 
                            for($yy=2018;$yy<=2030;$yy++)
                            {
                                    for($mm=1; $mm <= 12; $mm++)
                                    { 												
                                            if($mm<10)
                                            {
                                                    $month_yr='0'.$mm."/".$yy;
                                            }												
                                            else
                                            {
                                                    $month_yr=$mm."/".$yy;														
                                            }
                            ?>
                                    <option value="<?php  echo $month_yr; ?>"><?php echo $month_yr; ?></option>
                            <?php 

                                    }
                            }
                            ?>
                        </select>
					</div>
	                
	                  
	                  <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="showbankstatement">Show </button>
	                  </div>
	                </div>
	                
	                
	              </form>
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