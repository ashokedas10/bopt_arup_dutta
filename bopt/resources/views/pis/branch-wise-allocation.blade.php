@extends('layouts.master')

@section('title')
Payroll Information System
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
                                <strong>Branch Wise Allowance</strong>
                            </div>
                            <div class="aply-lv">
								<a href="{{ url('pis/add-new-branch-allowance') }}" class="btn btn-default">Add New Branch Allowance <i class="fa fa-plus"></i></a>
							</div>
								
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Company </th>
											<th>Branch </th>
                                            <th>Grade</th>
                                            <th>Allowance Amount</th>
											<th>Valid To</th>
											<th>Valid From</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($branch_allowance_rs as $branch_allow)
									<?php 
									$validtoarr = explode('-',$branch_allow->valid_to);
									$d = $validtoarr[2];
									$m = $validtoarr[1];
									$y = $validtoarr[0];
									$valid_to = $d.'-'.$m.'-'.$y;
									$validfromarr = explode('-',$branch_allow->valid_from);
									$d1 = $validfromarr[2];
									$m1 = $validfromarr[1];
									$y1 = $validfromarr[0];
									$valid_from = $d1.'-'.$m1.'-'.$y1;
									?>
                                        <tr>
                                            <td>{{ $branch_allow->company_name }}</td>
                                            <td>{{ $branch_allow->branch_name }}</td>
                                            <td>{{ $branch_allow->grade_name }}</td>
                                            <td>{{ $branch_allow->allowance_amount }}</td>
											<td>{{ $valid_to }}</td>
											<td>{{ $valid_from }}</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a>
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
    @endsection
