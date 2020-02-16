@extends('layouts.master')

@section('title')
Payroll Information System-Deduction Head
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
									<strong class="card-title">Deduction Head</strong>
								</div>
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<div class="aply-lv">
									<a href="{{ url('pis/deduction-head') }}" class="btn btn-default">Add Deduction Head <i class="fa fa-plus"></i></a>
								</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Head Name</th>
											<th>Alias</th>
											<th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($deduction_head_rs as $deduction_head)
                                        <tr>
                                            <td>{{ $loop->iteration  }}</td>
                                            <td>{{ $deduction_head->head_name }}</td>
                                            <td>{{ $deduction_head->alias_name }}</td>
											<td>{{ $deduction_head->description }}</td>
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
