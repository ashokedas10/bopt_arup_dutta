@extends('layouts.master')

@section('title')
Payroll Information System-View Cast
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
									<strong class="card-title">Cast Master</strong>
								</div>
								
								@if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
								@endif	
								
								<div class="aply-lv">
								<a href="{{ url('pis/add-new-cast') }}" class="btn btn-default">Add Cast Master <i class="fa fa-plus"></i></a>
							</div>
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Cast Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						@foreach($getCast as $cast)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cast->cast_name}}</td>
                                                    <td><a href="{{url('pis/add-new-cast/')}}?id={{$cast->id}}"><i class="ti-pencil-alt"></i></a>
						<a href="{{url('pis/vw-cast/')}}?del={{$cast->id}}" onclick="return confirm('Are you sure you want to delete this department?');"><i class="ti-trash"></i></a>
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


