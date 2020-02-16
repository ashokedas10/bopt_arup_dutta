@extends('layouts.master')

@section('title')
Payroll Information System-Grade
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
									<strong class="card-title">Grade Master</strong>
								</div>
								
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								<div class="aply-lv">
									<a href="{{ url('pis/grade') }}" class="btn btn-default">Add Grade Master <i class="fa fa-plus"></i></a>
								</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Grade</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($grade_rs as $grade)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                           
                                            <td>{{ $grade->grade_name}}</td>
                                               <td><a href="{{url('pis/grade')}}?id={{$grade->id }}"><i class="ti-pencil-alt"></i></a>
						<a href="{{url('pis/vw-grade')}}?del={{$grade->id }}" onclick="return confirm('Are you sure you want to delete this department?');"><i class="ti-trash"></i></a>
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