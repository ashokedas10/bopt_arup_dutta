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

<style>
div.dataTables_wrapper div.dataTables_filter label{text-align:right;}div.dataTables_wrapper div.dataTables_paginate ul.pagination{float:right;}.card{margin:15px 0;}
</style>

@section('content')
<body style="background:#e3e4e5;">

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">

                    <div class="main-card">

					<div class="card" style="padding-bottom: 25px;">
						<div class="card-header">
							<strong class="card-title">Arear Calculation</strong>
						</div>
						<form style="width: 500px;margin: 25px auto 0;padding: 29px 0 0 15px;" action="{{url('pis/arear-calculation-dashboard')}}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row form-group">
                <div class="col-md-5">
								<label style="text-align: right;font-weight: 600;">Select Arear Head</label>

									<select class="form-control" name="head_name" id="head_name">
                                        <option>Select Head</option>
										@foreach($arears as $arear)
                                        <option value="{{ $arear->id }}">{{ $arear->head_name }}
                                        @endforeach
									</select>
								</div>


            <div class="col-md-5">
                      <label>Select Employee</label>
                      <select  name="emp_code" class="form-control">
                        <option value="">Select</option>
                        <option value="0"> All </option>
                        <?php foreach($employeeslist as $employee){?>
                        <option value="<?php echo $employee->emp_code; ?>" ><?php echo $employee->emp_fname." ".$employee->emp_mname." ".$employee->emp_lname." (".$employee->emp_code.") "; ?></option>
                        <?php } ?>

                      </select>
                       </div>
            <div class="col-md-4 btn-up" style=" margin-top: 20px;">
                <button type="submit" class="btn btn-danger btn-sm">Go </button>
                  </div>
            </div>
						</form>
					</div>
                        <div class="card">

								<div class="card-header">
									<strong class="card-title">View Arear Calculation</strong>


								</div>

                                <form action="{{url('pis/arear-calculation-save')}}" method="post" style="background: none;padding:0;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<!--<div class="aply-lv">
								<a href="add-new-receipt.php" class="btn btn-default">Create Receipt <i class="fa fa-plus"></i></a>
							</div>-->
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											                      <th>Sl. No.</th>
                                            <th>Employee Code</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>Old Rate</th>
                                            <th>New Rate</th>
                                            <th>DA Arear</th>
                                            <th>Old DA_on_TA Rate</th>
                                            <th>New DA_on_TA Rate</th>
                                            <th>DA_on_TA Arear</th>
                                            <th>Total Arear</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
											<!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <input type="hidden" name="head_id" value="<?php if(!empty($head_id)){ echo $head_id;} ?>" />
                                        @php echo $result; @endphp


                                    </tbody>

                                    <tfoot>
                                <tr>
                                  <td colspan="32" style="border:none;">
                                    <!-- <button type="button" class="btn btn-danger btn-sm checkall" style="margin-right:2%;">Check All</button> -->
                            <button type="submit" class="btn btn-danger btn-sm">Save</button>
                                    <!-- <button type="reset" class="btn btn-danger btn-sm"> Reset</button> -->
                                  </td>
                                </tr>
                         </tfoot>
                                </table>


                        </div>

                    </form>

                    </div>

                    </div>



                </div>
                <!-- /Widgets -->



            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
       <?php //include("footer.php"); ?>
    </div>
<!-- /#right-panel -->
@endsection

    <!-- Scripts -->
@section('scripts')
  @include('partials.scripts')

  <!-- <script>
      var clicked = false;
        $(".checkall").on("click", function() {
          $(".checkhour").prop("checked", !clicked);
          clicked = !clicked;
        });
  </script> -->
@endsection

