@extends('procurement.purchase.layouts.master')

@section('title')
GRN For Item
@endsection

@section('sidebar')
	@include('procurement.purchase.partials.sidebar')
@endsection

@section('header')
	@include('procurement.purchase.partials.header')
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
                                <strong class="card-title">GRN for Item</strong>
                            </div>
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('procurement/purchase/add-GRN-item') }}" class="btn btn-default">Add GRN <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>GRN Number</th>
											<th>Total Recieved Quantity</th>
											<th>Total Price (Inc Tax)</th>
											<th>Recieved Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($grn_item_rs as $grn_item)
									<?php
									$dt_arr = explode('-',$grn_item->receive_date);
									$d = $dt_arr[2];
									$m = $dt_arr[1];
									$y = $dt_arr[0];
									$rcv_dt = $d.'-'.$m.'-'.$y;
									?>
                                        <tr>
                                            <td>{{ $grn_item->grn_no }}</td>
											<td>{{ $grn_item->rcv_qty }}</td>
											<td>{{ $grn_item->total }}</td>
											<td><?php echo $rcv_dt; ?></td>
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
	@include('procurement.purchase.partials.scripts')
@endsection
