@extends('masters.layouts.master')

@section('title')
BOPT - Income & Expenditure Report
@endsection

@section('sidebar')
    @include('mis-reports.includes.sidebar')
@endsection

@section('header')
    @include('masters.partials.header')
@endsection

@section('scripts')
    @include('mis-reports.includes.scripts')
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
	            <div class="card-header"> <strong>Income & Expenditure Schedules</strong> </div>
	            <div class="card-body card-block">
                    @if(Session::has('message'))
					<div class="alert alert-danger" style="text-align:center;">
						<span class="glyphicon glyphicon-ok" ></span>
						<em> {{ Session::get('message') }}</em>
					</div>
					@endif
	            <form action="{{ url('schedule-code') }}" method="post" style="width: 70%;margin: 0 auto;" target="_blank">
	              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="row form-group">

						<div class="col-md-6">
							<label>Choose Schedules</label>
							<select name="party_name"  class="form-control" required id="party_name">
                                <option value="">Please Select Schedules </option>
                                @foreach($schedules as $schedule)
                                    <option value="{{ $schedule->schedule }}">Schedule-{{ $schedule->schedule }} </option>
                                @endforeach
							</select>
						</div>

	                </div>

	                <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="formsubmit">Show </button>
	                </div>

	            </form>
	            </div>
	          </div>


	        </div>
	      </div>
	      <!-- /Widgets -->
	    </div>
	    <!-- .animated -->
  	</div>
  	<!-- /.content -->

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

<script>
        $( "#formsubmit" ).click(function() {
            // console.log("hi");
            setTimeout(function() {
                $('#party_name').val('');
          },1000);

        });
</script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')


@endsection
