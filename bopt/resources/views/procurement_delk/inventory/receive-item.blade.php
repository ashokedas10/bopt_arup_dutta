@extends('procurement.inventory.layouts.master')

@section('title')
Inventory
@endsection

@section('sidebar')
	@include('procurement.inventory.partials.sidebar')
@endsection

@section('header')
	@include('procurement.inventory.partials.header')
@endsection



@section('scripts')
	@include('procurement.inventory.partials.scripts')
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
                                <strong class="card-title">Recieve Item</strong>
                            </div>
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('procurement/inventory/add-receive-item') }}" class="btn btn-default">Add <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Item Name</th>
											<th>Item Type</th>
											<th>UOM</th>
											<th>Opening Stock</th>
											<th>Receive Stock</th>
											<th>Issue Stock</th>
											<th>Closing Stock</th>
											<th>Received Date</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($rcv_item_rs as $rcv_item)
                                        <tr>
                                            <td>{{ $rcv_item->item_name }}</td>
											<td>{{ $rcv_item->item_type }}</td>
											<td>{{ $rcv_item->unit_name }}</td>
											<td>{{ $rcv_item->opening_balance }}</td>
											<td>{{ $rcv_item->receive_balance }}</td>
											<td>{{ $rcv_item->issue_balance }}</td>
											<td>{{ $rcv_item->closing_balance }}</td>
											<td>{{ $rcv_item->rcv_date }}</td>
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
