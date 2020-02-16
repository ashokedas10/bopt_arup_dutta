@extends('masters.layouts.master')

@section('title')
Configuration-Supplier Configuration
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
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
            <div class="card-header"><strong class="card-title">Add New Supplier Configuration</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/supplier-config') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label>Select Supplier  </label>
                      <select class="form-control" name="supplier_code">
                        <option value='' selected disabled>Select Supplier</option>
							@foreach($supplier_rs as $supplier)
							<option value="{{ $supplier->supplier_code }}" <?php if(old('supplier_code') ==  $supplier->supplier_code){ echo "selected"; } ?> >{{ $supplier->supplier_name }}</option>
							@endforeach
						  </select>
						   @if ($errors->has('supplier_code'))
							<div class="error" style="color:red;">{{ $errors->first('supplier_code') }}</div>
						   @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Location</label>
                       <select multiple="" class="standardSelect" name="cost_centre_code[]" >
								@foreach($cost_centre_rs as $cost_centre)
									<option value="{{ $cost_centre->cost_centre_code }}"  >{{ $cost_centre->cost_centre_name }}</option>
								@endforeach
						</Select>
					   @if ($errors->has('cost_centre_code'))
							<div class="error" style="color:red;">{{ $errors->first('cost_centre_code') }}</div>
						   @endif
                    </div>
                    
                  </div>
				  <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                  <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                </div>
              </form>
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

@endsection