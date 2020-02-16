@extends('layouts.master')

@section('title')
Employee Information System-Employees
@endsection

@section('sidebar')
	@include('employee.sidebar')
@endsection

@section('header')
	@include('partials.header')
@endsection

@section('scripts')
	@include('partials.scripts')
@endsection

@section('content')

<?php 
   function my_simple_crypt( $string, $action = 'encrypt' ) {
    // you may change these values to your own
    $secret_key = 'bopt_saltlake_kolkata_secret_key';
    $secret_iv = 'bopt_saltlake_kolkata_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'encrypt' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
?>
    <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
                        <div class="card">
						
								<div class="card-header">
									<strong class="card-title">Pay Structure</strong>
								</div>
								
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								
								<div class="aply-lv">
								<a href="{{ url('paystructure') }}" class="btn btn-default">Add Pay Structure <i class="fa fa-plus"></i></a>
							</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Employee Code</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>Basic Pay</th>
                                            <th>Net Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     <tbody>
			             @foreach($pay_structures as $employee)
                                            <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $employee->emp_code}}</td>
                                            <td>{{ $employee->emp_name }}</td>
                                            <td>{{ $employee->emp_designation }}</td>
                                            <td>{{ $employee->emp_actual_basic_pay }}</td>
                                            <td>{{ $employee->emp_actual_gross_salary }}</td>
                                            <td>
                                                <a href='{{url("paystructure/paystructuredelete/$employee->id")}}' onclick="return confirm('Are you sure you want to delete this?');"><i class="ti-trash"></i></a>
                    
                                            </td>
                                            </tr>
                                     @endforeach                                         
                                    </tbody>
                                </table>
                           
                         
                        </div>
                        
                    </div>
                       
                    </div>

                    
                    
                </div>
                <!-- /Widgets -->
               
                
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->

@endsection