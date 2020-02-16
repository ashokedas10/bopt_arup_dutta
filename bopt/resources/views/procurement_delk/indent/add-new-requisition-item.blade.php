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




@section('content')
  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"><strong class="card-title">Add New Requisition for Item</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('procurement/indent/add-new-requisition-item') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  
                  <div class="row form-group lv-due-body">
                    <div class="col-md-2">
					<?php $tr_id=1; ?>
                      <label for="text-input" class=" form-control-label">Item Name</label>
                      <select class="form-control" name="item_code[]" onchange="getdetails(this.value,<?php echo $tr_id; ?>);" required>
                        <option value="" selected disabled>Select</option>
                        @foreach($item_rs as $item)
                        <option value="{{ $item->item_code }}">{{ $item->item_name }}</option>
						@endforeach
                      </select>
					   @if ($errors->has('item_code'))
						<div class="error" style="color:red;">{{ $errors->first('item_code') }}</div>
						@endif
					  </div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Item Type</label>
                      <input type="text" class="form-control" name="item_type[]" id="item_type<?php echo $tr_id; ?>">
                    </div>
					<div class="col-md-2">
						<label>Unit</label>
						 <input type="text" class="form-control"  id="unit<?php echo $tr_id; ?>">
						  <input type="hidden" class="form-control" name="unit_id[]" id="unit_id<?php echo $tr_id; ?>">
					   @if ($errors->has('unit_id'))
						<div class="error" style="color:red;">{{ $errors->first('unit_id') }}</div>
						@endif
					</div>
					<div class="col-md-1">
						<label>Price</label>
						<input type="text" class="form-control" id="price<?php echo $tr_id; ?>" name="price[]">
					</div>
					<div class="col-md-1">
						<label>Qty</label>
						<input type="text" class="form-control" id="quantity<?php echo $tr_id; ?>" name="quantity[]" onblur="gettotal(<?php echo $tr_id; ?>);">
					</div>
					<div class="col-md-2">
						<label>Total</label>
						<input type="text" class="form-control" id="total<?php echo $tr_id; ?>" name="total[]">
					</div>
					  <div class="col-md-2 btn-up">
					  	<button type="button" class="btn btn-danger" id="add<?php echo $tr_id; ?>" onClick="addnewrow(<?php echo $tr_id; ?>)" data-id="<?php echo $tr_id; ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('<?php echo $tr_id; ?>')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>
					   <div class="addrow"></div>
					  </div>
					  <div class="row form-group">
                     <div class="col-md-4">
					 <label>Institute Name</label>
					 <input type="text" class="form-control" readonly="" value="Adamas University"  name="institute_name">
					 </div>
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" value="Department Name"  name="department_name">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" value="Amitava Banerjee" name="requisition_made_by">
					  </div>
					  </div>
					  <div class="row form-group">
					  <div class="col-md-4">
					  <label>Remarks</label>
					  <textarea rows="2" class="form-control" name="remarks"></textarea>
					  </div>
					  
                    
					<div class="col-md-4 btn-up">
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
					</div>
                  </div>
				  
              </form>
			  </div>
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
	@include('procurement.indent.partials.scripts')
	
<script>
	function addnewrow(rowid) 
	{
		if (rowid != ''){
				$('#add'+rowid).attr('disabled',true);
				
			}
		
		
		
		//alert(rowid);
		$.ajax({
				
				url:'{{url('procurement/indent/get-add-row-req-item')}}/'+rowid,
				type: "GET",
				
				success: function(jsonStr) {
					console.log(jsonStr);
					$(".addrow").append(jsonStr);  
				 
				}
			});
	}
	function del(rowid)
	{
		//alert(rowid);
		if (rowid != ''){
		$('#add'+rowid).attr('disabled',false);
		}
		$(".itemslot" + rowid).html('');
		var row = rowid - 1;
		$('#add'+row).attr('disabled',false);
	}
	
	function gettotal(rowid)
	{
		var price = $("#price"+rowid).val();
		var qty = $('#quantity'+rowid).val();
		//alert(price);
		var total = price * qty;
		$("#total"+rowid).val(total);
	}
	
	function getdetails(val,rowid)
	{
		//alert(val);
		$.ajax({
				
				url:'{{url('procurement/indent/get-item-details')}}/'+val+'/'+rowid,
				type: "GET",
				
				success: function(jsonStr) {
					
					//alert(jsonStr);
					var jqObj = jQuery.parseJSON(jsonStr);
					//alert(jqObj.rate);
					//$("#price"+rowid).val(jqObj.rate);  
					$("#item_type"+rowid).val(jqObj.item_type);  
					$("#unit"+rowid).val(jqObj.unit_name);  
					$("#unit_id"+rowid).val(jqObj.unit_id);  
				 
				}
			});
	}
	
</script>
	
@endsection
