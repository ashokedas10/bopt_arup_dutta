@extends('procurement.purchase.layouts.master')

@section('title')
Purchase Order For Item
@endsection

@section('sidebar')
	@include('procurement.purchase.partials.sidebar')
@endsection

@section('header')
	@include('procurement.purchase.partials.header')
@endsection



@section('scripts')
	@include('procurement.purchase.partials.scripts')
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
                                <strong class="card-title">Purchase Order for Item</strong>
                            </div>
							@if(Session::has('message'))										
								<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('procurement/purchase/add-po-item') }}" class="btn btn-default">Add Purchase Order <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>PO No.</th>
											<th>Requisition Number</th>
											<th>Total</th>
											<th>Shiping Name</th>
											<th>Shipping Company</th>
											<th>Shipping State</th>
											<th>Shipping City</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($po_item_rs as $po_item)
                                        <tr>
                                            <td>{{ $po_item->purchase_order_no }}</td>
											<td>{{ $po_item->requisition_no }}</td>
											<td>{{ $po_item->total }}</td>
											<td>{{ $po_item->shipping_name }}</td>
											<td>{{ $po_item->shipping_company }}</td>
											<td>{{ $po_item->shipping_state }}</td>
											<td>{{ $po_item->shipping_city }}</td>
											<td><a href="#"><i class="ti-pencil-alt"></i></a>
												<a href="#"><i class="ti-trash"></i></a></td>
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
