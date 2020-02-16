@extends('masters.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('masters.partials.sidebar')
@endsection

@section('header')
	@include('masters.partials.header')
@endsection



@section('scripts')
	@include('masters.partials.scripts')
@endsection

@section('content')
<style>
		#bootstrap-data-table th{vertical-align:middle;}tr.spl td {font-weight: 600;}table#bootstrap-data-table tr td {font-size: 12px;padding: 8px 10px;}
	</style>
 <!-- Content -->

  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header">
              <strong>Opening Balance  Generation for Account </strong>
            </div>

                	 @if ($errors->has('month_yr.*'))
			<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em ><i class="fa fa-warning"></i> {{ $errors->first('month_yr.*') }}</em></div>
			@endif
            <div class="card-body card-block">
              <form action="{{url('masters/opening-bal-generation')}}" method="post" enctype="multipart/form-data" style="width:50%;margin:0 auto;padding: 18px 20px 1px;background: #ecebeb;">
              	{{ csrf_field() }}
                <div class="row form-group">
									<div class="col-md-3">
                    <label for="text-input" class=" form-control-label" style="text-align:right;">Select Year</label>
                </div>

				<div class="col-md-9">
					<select class="form-control" name="month_yr" id="month_yr">
						<option value="">Please Select Your Year </option>
								<?php  $cur_year = date('Y');
									for ($i=0; $i<=5; $i++) {
										$years= $cur_year--;
										$previous_year = $years+1;
										?>
										<option value="<?php echo $years.'-'.$previous_year ?>"><?php echo $years.'-'.$previous_year ?> </option>

								<?php } ?>
						<!--
						-->
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="text-input" class=" form-control-label" style="text-align:right;">Select  Group Code </label>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="acc_code" id="acc_code">
						<option value="">Please Select Group Code  </option>

                        @foreach ($employee as $val)
                        <option value="{{$val['account_code']}}">{{$val['account_name']}}({{$val['account_code']}})</option>
                        @endforeach
						<!--
						-->
					</select>
				</div>

				<div class="col-md-3">
					<button type="submit" class="btn btn-success" style="color: #fff;background-color: #0884af;border-color: #0884af;padding: 0px 8px;
					height: 32px;">Go</button>
				</div>
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



