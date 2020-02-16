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
									<strong class="card-title">Company GPF Master</strong>
								</div>
								
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								
								<div class="aply-lv">
									<a href="{{ url('masters/gpfbank') }}" class="btn btn-default">Add GPF Bank Master <i class="fa fa-plus"></i></a>
								</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Bank Name</th>
											<th>Branch Name</th>
											<th>IFSC Code</th>
											<th>MICR Code</th>
                                            <th>Opening Balance</th>
                                            <th>Bank Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($company_bank_listing as $companybank)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $companybank->bank_name }}</td>
                                            <td>{{ $companybank->branch_name }}</td>
                                            <td>{{ $companybank->ifsc_code }}</td>
                                            <td>{{ $companybank->micr_code }}</td>
                                            <td>{{ $companybank->opening_balance }}</td>
                                            <td>{{ $companybank->bank_status }}</td>
											<td>
												<a href='{{url("masters/gpfbank/$companybank->id")}}'><i class="ti-pencil-alt"></i></a>
												
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
