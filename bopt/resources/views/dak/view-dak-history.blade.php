@extends('dak.layouts.master')

@section('title')
Dak Module
@endsection

@section('sidebar')
  @include('dak.partials.sidebar')
@endsection

@section('header')
  @include('dak.partials.header')
@endsection
<style>
.row.form-group.lv-due-body.indent {
    background: #e2e2e2 !important;
    width: 600px !important;
    margin: 0 auto !important;
    padding: 15px !important;
}

.btn-danger {
    color: #fff !important;
    background-color: #278a05 !important;
    border-color: #278a05 !important;
    border-radius: 0 !important;
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
            {{-- <div class="card-header">
            	<strong class="card-title" style="font-size:21px; font-weight: 100;"><img src="{{asset('images/issue-register.png')}}" alt="" style="width: 35px;">Issue Item</strong>
            </div> --}}
            <div class="card-body card-block">
              <form action="{{ url('dak/dak-history') }}" method="post" enctype="multipart/form-data" style="padding:2% 5%;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="clearfix"></div>
                <div class="lv-due" style="border:none;">
                  <!--<div class="lv-due-hd">
											<h4>Leave Due as on</h4>
										</div>-->
                  <div class="row form-group lv-due-body indent">
                    <div class="col-md-4">
                      <label for="text-input" class=" form-control-label">Select DAK No.</label>
                  	</div>
                  	<div class="col-md-8">
                     <select class="form-control" name="indent_no" required>
					  	<option value="" selected disabled>Select</option>
						@foreach($dak_receipts as $dak_receipt)
						<option value="{{ $dak_receipt->id }}">{{ $dak_receipt->dairy_no }}</option>
						@endforeach
					  </select>
					  </div>
					 </div>

					 <div class="row form-group" id="new" style="margin-top: 20px;">

					  </div>
					  </div>

						<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up" aria-hidden="true" style="font-size:18px;"></i>  Submit</button>


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
<div class="clearfix"></div>
@endsection


@section('scripts')
    @include('procurement.inventory.partials.scripts')
@endsection
