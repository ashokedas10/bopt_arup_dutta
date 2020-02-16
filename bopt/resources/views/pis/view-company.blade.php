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
									<strong class="card-title">Company Master
									</strong>																	
								</div>
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<div class="aply-lv">
									<a href="{{ url('pis/company') }}" class="btn btn-default">Add New Company Master <i class="fa fa-plus"></i></a>
								</div>
								<br/>
								<div class="clear-fix">
									<table id="bootstrap-data-table" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Sl. No.</th>
												<th>Company Name</th>
												<th>Company Address</th>
												<th>Company PAN No.</th>
												<th>Company Tax No.</th>
											</tr>
										</thead>
										<tbody>
										@foreach($companies_rs as $company)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $company->company_name }}</td>
												<td>{{ $company->comapny_address }}</td>
												<td>{{ $company->company_pan }}</td>
												<td>{{ $company->company_tax }}</td>
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


@section('scripts')
	@include('partials.scripts')
@endsection