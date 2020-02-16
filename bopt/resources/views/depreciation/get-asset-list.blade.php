@extends('masters.layouts.master')

@section('title')
BOPT - View Depreciation
@endsection

@section('sidebar')
	@include('depreciation.includes.sidebar')
@endsection

@section('header')
    @include('masters.partials.header')
@endsection

@section('scripts')
	@include('depreciation.includes.scripts')
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
	            <div class="card-header"> <strong>Asset Depreciation List</strong> </div>
	            <div class="card-body card-block">
                    @if(Session::has('message'))
					<div class="alert alert-danger" style="text-align:center;">
						<span class="glyphicon glyphicon-ok" ></span>
						<em> {{ Session::get('message') }}</em>
					</div>
					@endif
	            <form action="{{ url('depreciation/show-table-data') }}" method="post" style="width: 70%;margin: 0 auto;">
	              	  {!! csrf_field() !!}
	                <div class="row form-group">
						<div class="col-md-6">
							<label>Choose Year</label>
							<select name="financial_year"  class="form-control" required>
								<option value="">Please Select Your Year </option>
								<?php  $cur_year = date('Y');
									for ($i=0; $i<=5; $i++) {
										$years= $cur_year--;
										$previous_year = $years+1;
										?>
										<option value="<?php echo $years.'-'.$previous_year ?>"><?php echo $years.'-'.$previous_year ?> </option>

								<?php } ?>
							</select>
						</div>

	                </div>

	                <div class="col-md-4 btn-up">
	                    <button type="submit" class="btn btn-danger btn-sm" id="showbankstatement">Show </button>
	                </div>

                </form>
                @if(!empty($result))
                <form action="{{ url('depreciation/save-data') }}" method="post" >
                  {{ csrf_field() }}
                <div class="content">
                    <!-- Animated -->
                    <div class="animated fadeIn">
                        <!-- Widgets  -->
                        <div class="row">

                            <div class="main-card">
                                <div class="card">

                                        <div class="card-header">
                                            <strong class="card-title">FundWise Fixed Asset Report</strong>
                                        </div>
                                        
                                        <br/>
                                         <div class="clear-fix">
                                        <table id="bootstrap-data-table" class="table table-striped table-responsive table-bordered" style="width: 1042px;overflow-x: scroll;">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" style="text-align:center;">GROSS BLOCK (COST)</th>
                                                    <th colspan="4" style="text-align:center;">DEPRECIATION</th>
                                                    <th colspan="2" style="text-align:center;">NET BLOCK</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl. No.</th>
                                                    <th>Description of Asset</th>
                                                    <th>Opening Balance<br>01/04/2019</th>
                                                    <th>Addition During <br>The Year</th>
                                                    <th>Deduction/<br>Adjustment</th>
                                                    <th>Closing Balance<br>31/03/2020</th>
                                                    <th>Opening Balance<br>01/04/2019</th>
                                                    <th>Depreciation For <br>The Year</th>
                                                    <th>Deduction/<br>Adjustment</th>
                                                    <th>Closing Balance<br>31/03/2020</th>
                                                    <th>Net Closing Balance<br>31/03/2020</th>
                                                    <th>Net Closing Balance<br>31/03/2019</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($result as $key=>$value)   
                                                <tr id="{{ $key }}">
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $value['asset_name']}}<input type="hidden" name="asset_code[]" id="asset_code{{ $key }}" value="{{ $value['asset_code'] }}"></td>
                                                    <td>{{ $value['gross_opening_balance']}}<input type="hidden" name="gross_openingbalance[]" id="gross_openingbalance{{ $key }}" value="{{ $value['gross_opening_balance']}}"></td>
                                                    <td>{{ $value['gross_addition']}}<input type="hidden" name="gross_addition[]" id="gross_addition{{ $key }}" value="{{ $value['gross_addition']}}"></td>
                                                    <td><input type="text" name="gross_deduction[]" id="gross_deduction{{ $key }}" value=""></td>
                                                    <td><input type="text" name="gross_closingbalance[]" id="gross_closingbalance{{ $key }}" value="" readonly /></td>
                                                    <td>{{ $value['depreciation_opening_balance']}}<input type="hidden" name="depreciation_opening_balance[]" id="depreciation_opening_balance{{ $key }}" value="{{ $value['depreciation_opening_balance']}}"></td>
                                                    <td><input type="text" name="depreciation[]" id="depreciation{{ $key }}" value="0"></td>
                                                    <td><input type="text" name="depreciation_deduction[]" id="depreciation_deduction{{ $key }}" value="0"></td>
                                                    <td><input type="text" name="depreciation_closing_balance[]" id="depreciation_closing_balance{{ $key }}" value="0" readonly></td>
                                                    <td><input type="text" name="netclosing_balance[]" id="netclosing_balance{{ $key }}" value="" readonly></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <div class="col-md-4 btn-up">
                                            <button type="submit" class="btn btn-danger btn-sm" name="savedata">Save </button>
                                        </div>

                                </div>

                            </div>

                            </div>



                        </div>
                        <!-- /Widgets -->



                    </div>
                    <!-- .animated -->
                </div>
                
                </form>
                @else
                <div class="content">
                    <!-- Animated -->
                    <div class="animated fadeIn">
                        <!-- Widgets  -->
                        <div class="row">

                            <div class="main-card">
                                <div class="card">

                                        <div class="card-header">
                                            <strong class="card-title">FundWise Fixed Asset Report</strong>
                                        </div>
                                        <!-- <div class="aply-lv">
                                        <a href="add-employee-type.php" class="btn btn-default">Add Employee Type <i class="fa fa-plus"></i></a>
                                    </div> -->
                                        <br/>
                                         <div class="clear-fix">
                                        <table id="bootstrap-data-table" class="table table-striped table-responsive table-bordered" style="width: 1042px;overflow-x: scroll;">
                                            <thead>
                                                <tr>
                                                    <th colspan="6" style="text-align:center;">GROSS BLOCK (COST)</th>
                                                    <th colspan="4" style="text-align:center;">DEPRECIATION</th>
                                                    <th colspan="2" style="text-align:center;">NET BLOCK</th>
                                                </tr>
                                                <tr>
                                                    <th>Sl. No.</th>
                                                    <th>Description of Asset</th>
                                                    <th>Opening Balance<br>01/04/2019</th>
                                                    <th>Addition During <br>The Year</th>
                                                    <th>Deduction/<br>Adjustment</th>
                                                    <th>Closing Balance<br>31/03/2020</th>
                                                    <th>Opening Balance<br>01/04/2019</th>
                                                    <th>Depreciation For <br>The Year</th>
                                                    <th>Deduction/<br>Adjustment</th>
                                                    <th>Closing Balance<br>31/03/2020</th>
                                                    <th>Net Closing Balance<br>31/03/2020</th>
                                                    <th>Net Closing Balance<br>31/03/2019</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                        </table>


                                </div>

                            </div>

                            </div>



                        </div>
                        <!-- /Widgets -->



                    </div>
                    <!-- .animated -->
                </div>
                <!-- /.content -->
                @endif
               <?php //include("footer.php"); ?>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script>


	$('input[type=text]' ).on('blur',function() {

        var bid = this.id; // button ID
        var trid = $(this).closest('tr').attr('id');

        var gross_openingbalance=$('#gross_openingbalance'+trid).val();
        var gross_addition=$('#gross_addition'+trid).val();
        var gross_deduction=$('#gross_deduction'+trid).val();
        
        var gross_closingbalance=(parseInt(gross_openingbalance)+parseInt(gross_addition) - parseInt(gross_deduction));
        $('#gross_closingbalance'+trid).val(gross_closingbalance);

        var depreciation_opening_balance=$('#depreciation_opening_balance'+trid).val();
        var depreciation= $('#depreciation'+trid).val();
        var depreciation_deduction= $('#depreciation_deduction'+trid).val();

        var depreciation_closing_balance=(parseInt(depreciation_opening_balance)-parseInt(depreciation) - parseInt(depreciation_deduction));
        $('#depreciation_closing_balance'+trid).val(depreciation_closing_balance);

        var netclosing_balance=(parseInt(gross_closingbalance)+parseInt(depreciation_closing_balance));

        $('#netclosing_balance'+trid).val(netclosing_balance);
    });    

</script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
