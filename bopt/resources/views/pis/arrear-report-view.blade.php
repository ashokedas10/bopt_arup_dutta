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


@section('content')
<style>
.bzm-date-picker label, .bzm-date-picker input{border:none;}.ui-notification.success{display:none;}
</style>


  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>Arrear Bill</strong> </div>
            <div class="card-body card-block">

               @if(Session::has('message')) 
                  <div class="alert alert-danger" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
               @endif  
              <form action="" method="post" enctype="multipart/form-data" style="width: 700px;margin: 0 auto;">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row form-group">

                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Select Head</label>
                    <select  name="head_id" id="head_id" class="form-control" onchange="selectDate()" required>
                      <option>Select</option>
                      
                        <?php foreach($arears as $arrear){?>
                        <option value="<?php  echo $arrear->id; ?>"><?php echo $arrear->head_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-6">
                    <label for="text-input" class="form-control-label">Select Start Date</label>
					           <select class="form-control" name="start_date" id="start_date">
                     </select>
                  </div>

                  
                </div>
                <div class="row form-group">

                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Select End Date</label>
                    <select  name="to_date" id="to_date" class="form-control" required>
                      
                      </select>
                  </div>
                  <div class="col-md-6">                    
              				<label>Select Employee</label>
              				<select  name="emp_code" class="form-control" required>
              					<option value="">Select</option>
              					<option value="0"> All </option>
                        <?php foreach($employeeslist as $employee){?>
                        <option value="<?php echo $employee->emp_code; ?>" ><?php echo $employee->emp_fname." ".$employee->emp_mname." ".$employee->emp_lname." (".$employee->emp_code.") "; ?></option>
                        <?php } ?>
                        
              				</select>	
              			   </div>
                       
                 
                  <div class="col-md-4 btn-up" style=" margin-top: 20px;">
                    <button type="submit" class="btn btn-danger btn-sm">Submit </button>
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
@endsection

@section('scripts')
 
  @include('employee.scripts')

<script>

  $( document ).ready(function() {
    //selectEmployee();
});
  

    // var select_emp = "<?php  if(!empty($forward_detail->forwardemp)){ echo $forward_detail->forwardemp;}?>";
  
    // setTimeout(function(){
    //   if(select_emp!=""){
    //     $("#empployee_id option[value='"+select_emp+"']").prop('selected', 'selected'); 
    //   }
    // },1000);
    

    function selectDate(){
      var head_id = $("#head_id option:selected").val();
      $.ajax({
        type:'GET',
        url:'{{url('pis/getdate/')}}/'+head_id,        
        success: function(response){
          
            console.log(response);
            var obj = jQuery.parseJSON(response);
            var option = '';
            option += '<option value="">Select Date</option>';
            option += '<option value="'+ obj.from_date+ '">' + obj.from_date + '</option>';
            $('#start_date').html(option);

            var option_end_date = '';
            option_end_date += '<option value="">Select Date</option>';
            option_end_date += '<option value="'+ obj.to_date+ '">' + obj.to_date + '</option>';
            $('#to_date').html(option_end_date);
                     
        }
      });
    }
  </script>




@endsection