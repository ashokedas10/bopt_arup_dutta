@extends('masters.layouts.master')

@section('title')
Configuration-Category
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
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
                                <strong class="card-title">Category</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif	
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('masters/category') }}" class="btn btn-default">Add New Category <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl no.</th>
											<th>Category Name</th>
                                            <th>Category Code</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
										@foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->cat_name }}</td>
                                            <td>{{ $category->cat_code }}</td>
											<td><a href='{{url("masters/category/$category->id")}}'><i class="ti-pencil-alt"></i></a>
												</td>
                                        </tr>
                                        @endforeach                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                    
                    
                </div>
                <!-- /Widgets -->
               
                
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
		
		
        <div class="clearfix"></div>
		
        @endsection

@section('scripts')
@include('masters.partials.scripts')

@endsection