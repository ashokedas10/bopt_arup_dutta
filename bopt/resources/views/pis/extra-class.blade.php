@extends('layouts.master')

@section('title')
Payroll Information System-Designation
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
                                <strong>Extra Class Allowance</strong>
                            </div>
                            <div class="aply-lv">
								<a href="{{ url('pis/add-new-extra-class') }}" class="btn btn-default">Add New Extra Class Allowance <i class="fa fa-plus"></i></a>
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
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($extra_class_allowance_rs as $extra_class)
                                        <tr>
                                            <td>{{ $extra_class->company_name }}</td>
                                            <td>{{ $extra_class->branch_name }}</td>
                                            <td>{{ $extra_class->grade_name }}</td>
                                            <td>{{ $extra_class->allowance_amount }}</td>
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
