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
							<strong class="card-title">Rate Master</strong>
                             @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
						</div><br/>
    					<div class="clear-fix">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl no.</th>
    									<th>Head</th>
                                        <th>In Percent</th>
                                        <th>In Rupees</th>
                                        <th>Min. Value</th>
                                        <th>Max. Value</th>
    									<th>Effective from</th>
    									<th>Effective to</th>
    									<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($ratelist as $ratedtl)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ratedtl->head_name }}</td>
                                        <td>{{ $ratedtl->inpercentage }}</td>
                                        <td>{{ $ratedtl->inrupees }}</td>
    									<td>{{ $ratedtl->min_basic }}</td>
                                        <td>{{ $ratedtl->max_basic }}</td>
                                        <td>{{ date('d-m-Y', strtotime($ratedtl->from_date)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($ratedtl->to_date)) }}</td>
    									<td><a href='{{url("masters/rate-details/$ratedtl->id")}}'><i class="ti-pencil-alt"></i></a></td>
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