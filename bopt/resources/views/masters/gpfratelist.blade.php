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
							<strong class="card-title">GPF Rate List</strong>
                             @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
						</div>			
                           
						<div class="card-body">
							<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
							<a href="{{ url('masters/gpf-rate-detail') }}" class="btn btn-default">Add New GPF Rate<i class="fa fa-plus"></i></a>
						</div>
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sl. No.</th>
                                            <th>Rate of Interest</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 @foreach($gpfratelisting as $gpflisting)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
                                            <td>{{$gpflisting->rate_of_interest}}</td>
                                            <td>{{$gpflisting->from_date}}</td>
                                            <td>{{$gpflisting->to_date}}</td>
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
        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
