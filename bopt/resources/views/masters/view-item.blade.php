@extends('masters.layouts.master')

@section('title')
Configuration-Item
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
@endsection

<style>
	.btn-round{
            border-radius: 50%;
            width: 35px;
            height: 35px;
            padding: 6px 10px;
        }
</style>

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
                                <strong class="card-title">Item</strong>
                            </div>
							@if(Session::has('message'))										
									<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
							@endif
							<div class="aply-lv" style="padding-right: 36px;">
								<a href="{{ url('masters/item') }}" class="btn btn-default">Add New Item <i class="fa fa-plus"></i></a>
							</div>
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Sl no.</th>
											<th>Item Code</th>
                                            <th>Item Name</th>
											<th>Item Type</th>
											<th>Category</th>
											<th>Sub Category</th>
											<th>Unit</th>
											<th>Min. Stock Level</th>
											<th>Max. Stock Level</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									    @foreach($item_rs as $item)
                                        <tr>
											<td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->name }}</td>	
											<td>{{ $item->type }}</td>
											<td>{{ $item->cat_name }}</td>
											<td>{{ $item->sub_cat_name }}</td>
											<td>{{ $item->unit_name }}</td>	
											<td>{{ $item->min_stock }}</td>	
											<td>{{ $item->max_stock }}</td>												
											<td>{{ $item->status }}</td>
											<td><a href='{{url("masters/item/$item->id")}}' class="btn btn-round btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: white;"></i></a>
												
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
		<script>
		
	/*$(document).ready(function(){ 
		$(".delid").click(function(){*/
		function del(val)
		{
			
		if (confirm("Are you sure want to delete?")) {
			
		//var del_id = $(this).attr('id');
		alert(val);
		$.ajax({
		  type: 'GET',
		  url:'{{url('masters/del_item')}}/'+val,
		  success: function(jsonStr) 
		  { 
			//alert(jsonStr);
			/*var jqObj = $.parseJSON(jsonStr);
			var msg=jqObj.msg;
				alert(msg);
				location.reload();*/
				location.reload();
			
		  }		  
		});
		}
		return false;
		}
		/*
		});
	
	});*/
</script>
@endsection