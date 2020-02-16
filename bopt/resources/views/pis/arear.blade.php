@extends('layouts.master')

@section('title')
Payroll Information System-Rate Details
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection

@section('header')
  @include('partials.header')
@endsection



@section('scripts')
  @include('partials.scripts')
@endsection



<style>
.bzm-date-picker label, .bzm-date-picker input{border:none;}.ui-notification.success{display:none;}.form-control{height:30px !important;}.content {float:none;padding: 5% 0;width: 600px;margin: 0 auto;background:none;}.main-card form label{font-weight:600;}.card {margin: 2.875em 0 0;}.card form {padding: 30px 30px 4px;margin-bottom:0;}.btn-up {
    margin-top: 20px;
}
</style>

@section('content')
<body style="background:#f1f2f7;">

<!-- Right Panel -->

  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>Arear</strong> </div>
            <div class="card-body card-block">
              <form action="{{ url('pis/vw-arrear-bill') }}" method="post" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <input type="hidden" name="id" value="<?php if(!empty($arear_details->id)){ echo $arear_details->id;} ?>">
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Select Heads</label>
                    <select class="form-control" id="head_name" name="head_name" onchange="getPrevRate()">
                      <option>Select Head</option>
                        <option VALUE="0">BASIC</option>
                     	@foreach($rate_rs as $rate_data)
                      <option value=" {{ $rate_data->id }}" <?php if(!empty($arear_details->head_id)){ if($arear_details->head_id==$rate_data->id){ echo 'selected';}}  ?>><?php echo $rate_data->head_name; ?> </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label class="control-label">Previous Rate</label>
                    <input class="form-control" type="text" readonly="" id="prev_rate" name="prev_rate" value="<?php if(!empty($arear_details->id)){ echo $arear_details->old_rate ; } ?>">
                  </div>
				          </div>
				  <div class="row form-group">
				   <div class="col-md-6">
                    <label class=" form-control-label">New Rate</label>
                   <input type="text" class="form-control" id="new_rate" onchange="getRateDiff()" name="new_rate" value="<?php if(!empty($arear_details->id)){ echo $arear_details->new_rate ; } ?>" >
				    </div>

                  <div class="col-md-6">
                    <label for="email-input" class="form-control-label">Difference</label>
                   <input type="text" class="form-control" readonly="" id="rate_diff" name="rate_diff" value="<?php if(!empty($arear_details->id)){ echo $arear_details->rate_diff ; } ?>">
                  </div>
				  </div>
				  <div class="row form-group">
				  <div class="col-md-6">
                    <label for="email-input" class="form-control-label">Effective from Date</label>
                   <input type="date" class="form-control" name="from_date" id="from_date" value="<?php if(!empty($arear_details->id)){ echo $arear_details->from_date ; } ?>" placeholder="" >
                  </div>

                  <div class="col-md-6">
                    <label for="email-input" class="form-control-label">Effective Upto</label>
                   <input type="date" class="form-control" name="to_date" id="to_date" value="<?php if(!empty($arear_details->id)){ echo $arear_details->to_date ; } ?>" placeholder="" onchange="getDays()">
                  </div>

                  <div class="col-md-4">
                  <label for="email-input" class=" form-control-label">No. of Days</label>
                      <input type="text" readonly="" name="days" class="form-control" id="days" value="<?php if(!empty($arear_details->id)){ echo $arear_details->day_diff  ; } ?>">
                  </div>

                  <!-- <input type="text" name="days" id="days" value=""> -->
				  <div class="col-md-6 btn-up">
				  	 <button type="submit" class="btn btn-danger btn-sm">Apply</button>
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

<script>

  $('.default-date-picker').datepicker({
        format: 'dd/mm/yyyy',

    });


  function getPrevRate()
  {
    var head_name = $('#head_name').val();
    // alert(head_name);

    if(head_name == '0')
    {
        $('#prev_rate').attr('disabled','disabled');
        $('#new_rate').attr('disabled','disabled');
        $('#rate_diff').attr('disabled','disabled');
        $('#days').attr('disabled','disabled');
    }

    $.ajax({
    type:'GET',
    url:'{{url('pis/get-prev-rate')}}/'+head_name,
    cache: false,
    success: function(response){
      var obj = jQuery.parseJSON( response );
      // console.log();
      var prev_rate = $('#prev_rate').val(obj.inpercentage);

    }

    });


  }

  function getRateDiff()
  {
    var old_rate = $('#prev_rate').val();
    var new_rate = $('#new_rate').val();

    if (new_rate < old_rate) {
      $("#prev_rate").val("");
      $("#new_rate").val("");
      $('#rate_diff').val("");
      alert('Please provide valid rate!');
    }

    var rate_dif = new_rate - old_rate;

    $('#rate_diff').val(rate_dif);
  }

  function getDays()
  {
    // alert('hi');
    // var diffDays = 0;

    var eff_from_dt = $('#from_date').val();
    var eff_to_date = $('#to_date').val();

    var fromdate = new Date(eff_from_dt);
    var todate = new Date(eff_to_date);

    if (todate < fromdate) {
      $("#from_date").val("");
      $("#to_date").val("");
      $('#days').val("");
      alert('Please provide valid date!');
    }
    else {
      var fromday = fromdate.getDate();
      var inpfromMonth = fromdate.getMonth() + 1;
      var inpfromYear = fromdate.getFullYear();

      var today = todate.getDate();
      var inptoMonth = todate.getMonth() + 1;
      var inptoYear = todate.getFullYear();

      var final_date_from = new Date(inpfromYear, inpfromMonth, fromday);
      var final_date_to = new Date(inptoYear, inptoMonth, today);

      var days = final_date_to - final_date_from;
      var diffDays = (days / 1000 / 60 / 60 / 24) + 1;
   // alert(diffDays);
      $('#days').val(diffDays);
    }

  }


</script>

@endsection





@section('scripts')
  @include('partials.scripts')
@endsection





