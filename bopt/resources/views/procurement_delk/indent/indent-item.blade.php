@extends('procurement.indent.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('procurement.indent.partials.sidebar')
@endsection

@section('header')
	@include('procurement.indent.partials.header')
@endsection



@section('scripts')
	@include('procurement.indent.partials.scripts')
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
                                <strong class="card-title">Indent for Item</strong>
                            </div>
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('procurement/indent/add-new-indent-item') }}" class="btn btn-default">Add <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Item Name</th>
											<th>Item Type</th>
											<th>No. of Pieces Required</th>
											<th>UOM</th>
											<th>Deprtment</th>
											<th>Indent Made by</th>
											<th>Indent Date</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									@foreach($indent_item_rs as $indent_item)
									<?php
									$indent_dt_arr=explode('-',$indent_item->indent_date);
									$d=$indent_dt_arr[2];
									$m=$indent_dt_arr[1];
									$y=$indent_dt_arr[0];
									$indent_dt=$d.'-'.$m.'-'.$y;
									?>
                                        <tr>
                                            <td>{{ $indent_item->item_name }}</td>
											<td>{{ $indent_item->item_type }}</td>
                                            <td>{{ $indent_item->required_qty }}</td>
											<td>{{ $indent_item->unit_name }}</td>
											<td>{{ $indent_item->department_name }}</td>
											<td>{{ $indent_item->indent_made_by }}</td>
											<td><?php echo $indent_dt; ?></td>
											<td>{{ $indent_item->status }}</td>
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
