@extends('masters.layouts.master')

@section('title')
Configuration-Sub-Category
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
            <div class="card-header"><strong class="card-title"><img src="{{asset('images/product.png')}}" alt="">Add New Sub-Category</strong></div>
            <div class="card-body card-block">
              <form action="{{ url('masters/sub-category') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="sub_category_id" name="id" value="<?php if(!empty($subcategory->id)){ echo $subcategory->id; } ?>" />


                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body">
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Sub Category Code</label>
                      <input type="text" class="form-control" name="sub_cat_code" value="<?php if(!empty($subcategory->sub_cat_code)){ echo $subcategory->sub_cat_code; } ?>" >
                       @if ($errors->has('sub_cat_code'))
                        <div class="error" style="color:red;">{{ $errors->first('sub_cat_code') }}</div>
                       @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Category Name</label>
                       <select class="form-control" name="cat_name">
                        <option value="">Select</option>
                         @foreach($categories as $category)
                         <option value="{{ $category->cat_code }}" <?php if(!empty($subcategory->cat_name)){ if($category->cat_code == $subcategory->cat_name) { echo "selected"; } } ?>>{{ $category->cat_name }}</option>
                         @endforeach
                       </select>


        					   @if ($errors->has('cat_name'))
        							<div class="error" style="color:red;">{{ $errors->first('cat_name') }}</div>
        						 @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Sub-Category Name</label>
                      <input type="text" class="form-control" name="sub_cat_name" value="<?php if(!empty($subcategory->sub_cat_name)){ echo $subcategory->sub_cat_name; } ?>" >
                       @if ($errors->has('sub_cat_name'))
                        <div class="error" style="color:red;">{{ $errors->first('sub_cat_name') }}</div>
                       @endif
                    </div>
                    <div class="col-md-4">
                       <label for="text-input" class=" form-control-label">Account Code</label>
                       <select class="form-control" name="coa_code">
                         <option value="">Select</option>
                           @foreach($accounts as $account)
                               <option value="{{ $account->account_code }}" <?php if(!empty($subcategory->coa_code)){ if($account->account_code == $subcategory->coa_code) { echo "selected"; } } ?>>{{ $account->account_code }}</option>
                           @endforeach
                       </select>

                       @if ($errors->has('coa_code'))
                        <div class="error" style="color:red;">{{ $errors->first('coa_code') }}</div>
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
