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



@section('content')
  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>Diary Register</strong> </div>
            <div class="card-body card-block">
              <form action="{{ url('dak/dairy-report') }}" method="post" enctype="multipart/form-data" target="_blank">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="email-input" class="form-control-label">From Date</label>
                   <input type="text" class="form-control default-date-picker" readonly="" name="to_date" id="exampleInputEmail1" value='' placeholder="">
                  </div>
				  
                  <div class="col-md-6">
                    <label class="control-label">To Date</label>
                <input type="text" class="form-control default-date-picker" readonly="" name="from_date" id="exampleInputEmail1" value='' placeholder="">
                  </div>
				  </div>
				  
				  <div class="row form-group">
				  
				  <div class="col-md-12">
				  	 <button type="submit" class="btn btn-danger btn-sm">Show</button>
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

</div>
<!-- /#right-panel -->
<!-- Scripts -->

<script>
    $('.default-date-picker').datepicker({
        format: 'dd/mm/yyyy',
                
    });
</script>
@endsection

@section('scripts')
@include('attendance.partials.scripts')

