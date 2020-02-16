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
            <div class="card-header"><strong class="card-title">Add New Indent for Item</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('procurement/indent/add-new-indent-item') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-3">
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
					   @if ($errors->has('item_type'))
						<div class="error" style="color:red;">{{ $errors->first('item_type') }}</div>
						@endif
                      </div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">UOM</label>
                      <!--<select class="form-control" name="unit_id[]" >
                        <option value="" selected disabled>Select</option>
                        @foreach($unit_rs as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
						@endforeach
                      </select>-->
					  <input type="text" class="form-control"  id="unit<?php echo $tr_id; ?>">
						  <input type="hidden" class="form-control" name="unit_id[]" id="unit_id<?php echo $tr_id; ?>">
					   @if ($errors->has('unit_id'))
						<div class="error" style="color:red;">{{ $errors->first('unit_id') }}</div>
						@endif
					  </div>
					  <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">No. of Pieces Required</label>
                      <input type="text" class="form-control" name="required_qty[]" >
					   @if ($errors->has('required_qty'))
						<div class="error" style="color:red;">{{ $errors->first('required_qty') }}</div>
						@endif
                    </div>
					  <div class="col-md-2 btn-up" style="text-align: right;">
					  	<button type="button" class="btn btn-danger" id="add<?php echo $tr_id; ?>" onClick="addnewrow(<?php echo $tr_id; ?>)" data-id="<?php echo $tr_id; ?>"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('<?php echo $tr_id; ?>')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>
					  <div class="addrow"></div>
					  </div>
					  <div class="row form-group">
					  <div class="col-md-3">
					  	<label>Institute Name</label>
						<input type="text" class="form-control" readonly="" value="Adamas University" name="institute_name">
					  </div>
                     <div class="col-md-3">
					 	<label>Indent Made By Department</label>
						<input type="text" class="form-control" readonly="" name="department_name" value="Department1">
					 </div>
					  <div class="col-md-3">
					  <label>Indent Made By</label>
					  <input type="text" class="form-control" readonly="" name="indent_made_by"  value="Amitava Banerjee">
					  </div>
					  <div class="col-md-3">
					  <label>Indent Date</label>
					  <input type="date" class="form-control" name="indent_date" value="{{ old('indent_date') }}">
					  @if ($errors->has('indent_date'))
						<div class="error" style="color:red;">{{ $errors->first('indent_date') }}</div>
						@endif
					  </div>
					  </div>
					  <div class="row form-group">
                   
					
                  </div>
				  
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                     <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
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
				
				url:'{{url('procurement/indent/get-add-row-item')}}/'+rowid,
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
