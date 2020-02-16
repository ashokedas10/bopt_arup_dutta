@extends('layouts.master')

@section('title')
Payroll Information System-Rate Details
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection

@section('header')
  @include('partials.header')
@endsection


<style>
div.dataTables_wrapper div.dataTables_filter label{text-align:right;}div.dataTables_wrapper div.dataTables_paginate ul.pagination{float:right;}
</style>

@section('content')
<body style="background:#e3e4e5;">
   
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card">
					
					
					 
                        <div class="card">
						
								<div class="card-header">
									<strong class="card-title">Arear Dashboard</strong>
								</div>
								
                                @if(Session::has('message'))                                        
<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-check"></i> {{ Session::get('message') }}</em></div>
@endif  
                            
                            <div class="card-body">
                    
                <div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
        <a href="{{ url('pis/vw-arrear-bill') }}" class="btn btn-default">
            Add Arrear 
         <i class="fa fa-plus"></i></a>
                            </div>

								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl. No.</th>
                                            <th>Head Name</th>
                                            <th>Old Rate</th>
                                            <th>New Rate</th>
                                            <th>Applied from</th>
											<th>Applied to</th>
											<th>No. of Days</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($arears as $arear)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $arear->head_name }}</td>
                                            <td>{{$arear->old_rate}}</td>
											<td>{{$arear->new_rate}}</td>
                                            <td>{{$arear-> from_date}} </td>
                                            <td>{{$arear->to_date}}</td>
                                            <td>{{$arear->day_diff}}</td>
											<td class="text-center">
                                                <a href='{{url("pis/vw-arrear-bill/$arear->id")}}'><i class="ti-pencil-alt"></i></a>
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

@endsection
   
@section('scripts')
  @include('partials.scripts')
@endsection
