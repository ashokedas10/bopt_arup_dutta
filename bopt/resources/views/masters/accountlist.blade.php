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
							<strong class="card-title">Account List</strong>
                             @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
						</div>			
                           
							<div class="card-body">
								<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
								<a href="{{ url('masters/accountmaster') }}" class="btn btn-default">Add New Account <i class="fa fa-plus"></i></a>
							</div>
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sl. No.</th>
											<th>Account Code</th>
                                            <th>Account Type</th>
                                            <th>Account Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									 @foreach($accountlisting as $accountlist)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
											<td>{{$accountlist->account_code}}</td>
                                            <td>{{ucfirst($accountlist->account_type)}}</td>
                                            <td>{{$accountlist->account_name}}</td>
                                           
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
