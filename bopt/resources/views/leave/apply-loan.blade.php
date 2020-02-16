@extends('leave.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('leave.partials.sidebar')
@endsection

@section('header')
	@include('leave.partials.header')
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
                            <div class="card-header"><strong class="card-title">Apply Loan</strong></div>
                            <div class="card-body card-block">
                                <form action="{{ url('leave/apply-loan') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!--<div class="emp-descp-main">   
								<div class="col-md-4 emp-desc">Employee Id: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Employee Name: <span>Dibyendu Paul</span></div>
								<div class="col-md-4 emp-desc">Designation: <span>Manager</span></div>
								<div class="col-md-4 emp-desc">Grade: <span>1234</span></div>
								<div class="col-md-4 emp-desc">Date of Application: <span>13.10.2018</span></div>
								</div>-->
											<div class="clearfix"></div>
									<div class="lv-due" style="border:none;">
										<!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
										<div class="row form-group lv-due-body">
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Loan Type</label>
										<select class="form-control" name="loan_type">
											<option value="" selected disabled>Select</option>
											@foreach($loan_rs as $loan)
											<option value="{{ $loan->loan_type }}" <?php if(old('loan_type') == $loan->loan_type) echo "selected"; ?>>{{ $loan->loan_type }}</option>
											@endforeach
										</select>
										@if ($errors->has('loan_type'))
											<div class="error" style="color:red;">{{ $errors->first('loan_type') }}</div>
										@endif
										</div>
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Loan Amount</label>
										<input type="text" class="form-control" id="loan_amount" name="loan_amount" value="{{ old('loan_amount') }}">
										@if ($errors->has('loan_amount'))
											<div class="error" style="color:red;">{{ $errors->first('loan_amount') }}</div>
										@endif
										</div>
										
										<div class="col-md-4">
										<label for="text-input" class=" form-control-label">Apply Date</label>
										<input type="date" class="form-control" id="apply_date" name="apply_date" value="{{ old('apply_date') }}">
										@if ($errors->has('apply_date'))
											<div class="error" style="color:red;">{{ $errors->first('apply_date') }}</div>
										@endif
										</div>
										
										</div>
									</div>	
									
                                        <button type="submit" class="btn btn-danger btn-sm">Apply</button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
									<!--<div class="lv-due">
										<div class="lv-due-hd">
											<h4>Unapproved Due as on</h4>
										</div>
										<div class="row form-group lv-due-body">
										<div class="col-md-3">
										<label for="text-input" class=" form-control-label">Casual Leave</label>
										<input type="number" class="form-control" placeholder="Casual Leave">
										</div>
										<div class="col-md-3">
										<label for="text-input" class=" form-control-label">Privilege Leave</label>
										<input type="number" class="form-control" placeholder="Privilege Leave">
										</div>
										<div class="col-md-3">
										<label for="text-input" class=" form-control-label">Half Pay Leave</label>
										<input type="number" class="form-control" placeholder="Half Pay Leave">
										</div>
										<div class="col-md-3">
										<label for="text-input" class=" form-control-label">Sick Leave</label>
										<input type="number" class="form-control" placeholder="Sick Leave">
										</div>
										</div>
									</div>-->	
											
								
                                   
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

@section('scripts')
@include('leave.partials.scripts')

@endsection