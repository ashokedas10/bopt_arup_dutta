@extends('masters.layouts.master')

@section('title')
Configuration-Accessories
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
            <div class="card-header"><strong class="card-title">Add New Accessories</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/accessories') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Accessories Id</label>
                      <input type="text" class="form-control" name="accessories_code" value="{{ old('accessories_code') }}">
					  @if ($errors->has('accessories_code'))
						<div class="error" style="color:red;">{{ $errors->first('accessories_code') }}</div>
					@endif
                    </div>
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Accessories Name</label>
                      <input type="text" class="form-control" id="cname" name="accessories_name" value="{{ old('accessories_name') }}">
					  @if ($errors->has('accessories_name'))
							<div class="error" style="color:red;">{{ $errors->first('accessories_name') }}</div>
						@endif
                    </div>
                    <div class="col-md-4">
                      <label>Status</label>
                      <select class="form-control" name="accessories_status">
                        <option value='' selected disabled>Select</option>
							<option value="active" <?php if(old('accessories_status') ==  "active"){ echo "selected"; } ?> >Active</option>
							<option value="inactive" <?php if(old('accessories_status') ==  "inactive"){ echo "selected"; } ?> >Inactive</option>
						  </select>
						   @if ($errors->has('accessories_status'))
							<div class="error" style="color:red;">{{ $errors->first('accessories_status') }}</div>
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