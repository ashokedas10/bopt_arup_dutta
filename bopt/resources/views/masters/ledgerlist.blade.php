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
							<strong class="card-title">General Ledger List</strong>
                             @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
						</div>			
                           
							<div class="card-body">
								<div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
								<a href="{{ url('masters/ledger') }}" class="btn btn-default">Add New Chart Of Account <i class="fa fa-plus"></i></a>
							</div>
								
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sl. No.</th>
											<th>Assets Group</th>
                                            <th>General Ledger Type</th>
                                            <th>General Ledger Code</th>
                                            <th>General Leadger Account Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 @foreach($ledgerlisting as $ledger)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
											<td>{{$ledger->asset_grp}}</td>
                                            <td>{{$ledger->gl_type}}</td>
                                            <td>{{$ledger->gl_code}}</td>
                                            <td>{{$ledger->gl_name}}</td>
                                            <td><a href='{{url("masters/ledger/$ledger->id")}}'><i class="ti-pencil-alt"></i></a></td>
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
