@extends('masters.layouts.master')

@section('title')
BOPT - Payment Booking
@endsection

@section('sidebar')
    @include('accountpayable.sidebar')
@endsection

@section('header')
    @include('masters.partials.header')
@endsection
<style>
    .bordr {
    border: 1px solid #bdbcbc;
    padding: 15px 25px;
    margin-bottom: 15px;
}
</style>
@section('scripts')
    @include('accountpayable.scripts')
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
                            <div class="card-header">
                            <strong>Add Voucher</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('accoutpayable/save') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="" id="payment_booking_id">

                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Voucher Type <span>(*)</span></label>
                                          <select name="voucher_type" id="voucher_type" class="form-control" onchange="getVoucherType()" required>
                                            <option value="">Select Voucher Type</option>
                                            <option value="payment_employee">Payment Employee</option>
                                            <option value="payment_vendor_with_po">Payment Vendor With PO</option>
                                            <option value="payment_vendor_without_po">Payment Vendor Without PO</option>
                                          </select>
                                        @if ($errors->has('voucher_type'))
                                            <div class="error" style="color:red;">{{ $errors->first('voucher_type') }}</div>
                                        @endif
                                    </div>





                                    <div class="col-md-3">
                                        <label class=" form-control-label">Employee List <span>(*)</span></label>
                                          <select name="employee_id" id="employee_id" class="form-control" disabled>
                                            <option value="">Select Employee</option>
                                            @foreach($employeelist as $employee)
                                            <option value="<?php echo $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname; ?>" >
                                                <?php echo $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname.'('.$employee->emp_code.')'; ?></option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('employee_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('employee_id') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Purchase Order </label>
                                          <select name="purchase_code" id="purchase_code" class="form-control" disabled onchange="getPurchaseOrderDtl()">
                                          <option value="">Select Purchase Order</option>

                                          @foreach($purchaselist as $purchase)
                                            <option value="<?php echo $purchase->purchase_order_no; ?>"
                                            ><?php echo $purchase->purchase_order_no; ?></option>
                                            @endforeach
                                          </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Vendor List </label>
                                        <select name="vendor_id" id="vendor_id" class="form-control" disabled onchange="vendorDtl()">
                                        <option value="">Select Vendor</option>
                                        @foreach($supplierlist as $supplier)
                                            <option value="<?php echo $supplier->id; ?>">
                                                <?php echo $supplier->supplier_business_name; ?>
                                            </option>
                                        @endforeach
                                        </select>
                                        <!--<input type="text" name="vendor_id" id="vendor_id" class="form-control" value="" readonly />-->
                                        <input type="hidden" name="vendor_name" id="vendor_name" class="form-control" value="" />
                                    </div>

                                </div>
                                <div class="row form-group">
                                <div class="col-md-3">
                                    <label class="form-control-label">Bill No.<span>(*)</span></label>
                                    <input type="text" name="billno" id="billno" class="form-control" value="" readonly />
                                    @if ($errors->has('billno'))
                                        <div class="error" style="color:red;">{{ $errors->first('billno') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class=" form-control-label">Bill Date<span>(*)</span></label>
                                     <input type="date" name="billdate" id="billdate" class="form-control" value="" readonly />
                                    @if ($errors->has('billdate'))
                                        <div class="error" style="color:red;">{{ $errors->first('billdate') }}</div>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <label class=" form-control-label">Bill booking Date<span>(*)</span></label>
                                    <input type="date" name="bill_booking_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly />
                                    @if ($errors->has('bill_booking_date'))
                                        <div class="error" style="color:red;">{{ $errors->first('bill_booking_date') }}</div>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class=" form-control-label">Voucher No</label>
                                    <input type="text" name="voucher_no" class="form-control" value="" id="voucher_no" readonly required />
                                </div>

                            </div>
                            <div id="dynamic_row">
                            <?php $tr_id=0; ?>

                            <div class="bordr itemslot" 	id="<?php echo $tr_id; ?>">
                                <div class='row form-group'>
									<div class='col-md-3'>
                                        <label class='form-control-label'>Account Head<span>(*)</span></label>
                                        <select name='account_head_id[]' class='form-control' id='account_head_id<?php echo $tr_id; ?>' onchange='getSubhead(<?php echo $tr_id; ?>)' required>
                                            <option value=''>Select Account</option>
                                            @foreach($accounthead as $acchead)
                                            <option value='<?php echo $acchead->account_code; ?>'><?php echo $acchead->account_name; ?></option>
                                            @endforeach
                                          </select>
										@if ($errors->has('account_head_id'))
											<div class='error' style='color:red;'>{{ $errors->first('account_head_id') }}</div>
										@endif
                                    </div>

                                    <div class='col-md-3'>
                                        <label class='form-control-label'>Sub Account <span>(*)</span></label>
                                        <select name='sub_account_id<?php echo $tr_id; ?>' id='sub_account_id<?php echo $tr_id; ?>' class='form-control'
                                         onchange='getSubaccountDtl(<?php echo $tr_id; ?>)' required>
                                        </select>
                                        @if ($errors->has('sub_account_id'))
                                            <div class='error' style='color:red;'>{{ $errors->first('sub_account_id') }}</div>
                                        @endif
                                    </div>

                                    <div class='col-md-3'>
                                        <label class=' form-control-label'>Transaction Code <span>(*)</span></label>
                                        <input type='text' name='transaction_code<?php echo $tr_id; ?>' id='transaction_code<?php echo $tr_id; ?>' class='form-control' value='<?php if(!empty($payment_details->id)){ echo $payment_details->transaction_code; } ?>' required readonly />
                                        @if ($errors->has('transaction_code'))
                                            <div class='error' style='color:red;'>{{ $errors->first('transaction_code') }}</div>
                                        @endif
                                    </div>




                                    <div class='col-md-3'>
                                        <label class='form-control-label'>Type<span>(*)</span></label>
                                        <select name='account_tool<?php echo $tr_id; ?>' id='account_tool<?php echo $tr_id; ?>' class='form-control'
                                      required>

                                        <option value='credit'>Credit</option>
                                        <option value='debit'>Debit</option>



                                    </select>
                                        @if ($errors->has('account_tool'))
                                            <div class='error' style='color:red;'>{{ $errors->first('account_tool') }}</div>
                                        @endif
                                    </div>


                                </div>


                                <div class='row form-group'>



                                    <div class='col-md-3'>
                                    <label class='form-control-label'>Bill Amount<span>(*)</span></label>
                                        <input type='text' name='bill_amt<?php echo $tr_id; ?>' class='form-control' value='0' id='bill_amt<?php echo $tr_id; ?>' onblur='calculateFinalBill(<?php echo $tr_id; ?>);' >
                                        @if ($errors->has('amount'))
                                            <div class='error' style='color:red;'>{{ $errors->first('amount') }}</div>
                                        @endif
                                    </div>
                                    <div class='col-md-2'>
                                        <label class='form-control-label'>TDS Calculate</span></label><br>

                                        <label class='radio-inline'>
                                          <input type='radio' value='no' name='optradio<?php echo $tr_id; ?>' checked id="optradio<?php echo $tr_id; ?>" onchange="return radiocahange(<?php echo $tr_id; ?>)" >No
                                        </label>
                                        <label class='radio-inline'>
                                          <input type='radio' value='yes' name='optradio<?php echo $tr_id; ?>' onchange="return radiocahange(<?php echo $tr_id; ?>)">Yes
                                        </label>
                                    </div>


                                    <div class='col-md-3'>
                                        <label class=' form-control-label'>TDS List</label>
                                          <select name='tds_id<?php echo $tr_id; ?>' id='tds_id<?php echo $tr_id; ?>' class='form-control' onchange='getRate(<?php echo $tr_id; ?>)' disabled>
                                            <option value=''>Select TDS Rate</option>
                                            @foreach($tdslist as $tds)
                                            <option value='<?php echo $tds->id; ?>' data-rate='<?php echo $tds->tds_percentage; ?>'
                                            ><?php echo $tds->tds_section; ?>(<?php echo $tds->tds_percentage ?>)</option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('tds_id'))
                                            <div class='error' style='color:red;'>{{ $errors->first('tds_id') }}</div>
                                        @endif
                                    </div>
                                    <div class='col-md-1'>
                                        <label class=' form-control-label'>Percentage</label>
                                        <input type='text' class='form-control' name='tds_percentage<?php echo $tr_id; ?>' id='tds_percentage<?php echo $tr_id; ?>' value='' readonly />
                                    </div>
                                    <div class='col-md-3'>
                                        <label class=' form-control-label'>Deduction Amount<span>(*)</span></label>
                                         <input type='text' name='deduction_amt<?php echo $tr_id; ?>' class='form-control' value='0' id='deduction_amt<?php echo $tr_id; ?>' readonly />
                                        @if ($errors->has('deduction_amt'))
                                            <div class='error' style='color:red;'>{{ $errors->first('deduction_amt') }}</div>
                                        @endif
                                    </div>

                                </div>


                                <div class='row form-group'>


                                    <div class='col-md-3'>
                                        <label class='form-control-label'>Bill GST Amount<span>(*)</span></label>
                                        <input type='text' name='bill_gst_amt<?php echo $tr_id; ?>' class='form-control' value='0' id='bill_gst_amt<?php echo $tr_id; ?>' onblur='calculateFinalAmount(<?php echo $tr_id; ?>);'>
                                        @if ($errors->has('bill_gst_amt'))
                                            <div class='error' style='color:red;'>{{ $errors->first('bill_gst_amt') }}</div>
                                        @endif
                                    </div>
                                    <div class='col-md-3'>
                                        <label class=' form-control-label'>Final Bill Amount<span>(*)</span></label>
                                         <input type='text' name='final_bill_amt<?php echo $tr_id; ?>' class='form-control' value='0' id='final_bill_amt<?php echo $tr_id; ?>' required readonly />
                                        @if ($errors->has('final_bill_amt'))
                                            <div class='error' style='color:red;'>{{ $errors->first('final_bill_amt') }}</div>
                                        @endif
                                    </div>

                                     <div class='col-md-3'>
                                        <label class='form-control-label'>Payable Amount<span>(*)</span></label>
                                        <input type='text' name='payable_amt<?php echo $tr_id; ?>'
                                         class='form-control' value='0' readonly id='payable_amt<?php echo $tr_id; ?>'
                                          required   />
                                        @if ($errors->has('payable_amt'))
                                            <div class='error' style='color:red;'>{{ $errors->first('payable_amt') }}</div>
                                        @endif
                                    </div>


                                    <div class='col-md-3'>
                                        <label class='form-control-label'>Narration</label>
                                         <textarea rows='5' name='entry_remark<?php echo $tr_id; ?>' class='form-control' id='entry_remark<?php echo $tr_id; ?>'><?php if(!empty($payment_details->entry_remark)){ echo $payment_details->entry_remark; }  ?></textarea>
                                        @if ($errors->has('entry_remark'))
                                            <div class='error' style='color:red;'>{{ $errors->first('entry_remark') }}</div>
                                        @endif
                                    </div>
                                </div>

                                    <div class="row form-group">
                                <div class="col-md-2 btn-up" style="padding-right:0;">
                                    <button type="button" style="" class="btn btn-danger btn-add" id="add<?php echo $tr_id; ?>" onClick="addnewrow(<?php echo $tr_id; ?>)" data-id="<?php echo $tr_id; ?>"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>
                                  </div>
                                  <div class="col-md-2 btn-up" style="padding-left:0;">
                                    <button type="button" class="btn btn-danger deleteButton" id="del" style="background: #d00404; border-color: #d00404; " onClick="delRow(<?php echo $tr_id; ?>)" disabled> <i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>
                                  </div>
                                    </div>



                            </div>
                        </div>

                        <div class='row form-group'>

                            <div class='col-md-3'>
                                <label class='form-control-label'>Total Credit</label>
                                <input type='text' name='totcredit'
                                         class='form-control' value='0' readonly id='totcredit'
                                          required readonly />



                            </div>
                            <div class='col-md-3'>
                                <label class='form-control-label'>Total Debit</label>
                                <input type='text' name='totdebit'
                                         class='form-control' value='0' readonly id='totdebit'
                                          required readonly />



                            </div>
                        </div>
					               <button type="button" class="btn btn-danger btn-sm" id="getvoucher">Submit</button>

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
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>


<script>

    $("#getvoucher").click(function () {

        if((   $('#voucher_type').val() == '')  ){



            alert("Please Fill up The form Properly");
            return false;

        }
        var totcredit = $('#totcredit').val();

        var totdebit = $('#totdebit').val();

        if(parseInt(totcredit)!=parseInt(totdebit)){

            alert("Debit and Credit amount are not same");
            return false;
        }

        var payment_booking_id= $('#payment_booking_id').val();
        if(payment_booking_id == '' ) {
            $.ajax({
                type:'GET',
                url:'{{url('accountpayable/get-lastvoucherno')}}',
                success: function(response){
                    //console.log(response);
                    $("#voucher_no").val(response);
                    var x=confirm( "Are you sure you want to save?!");

                    if(x==true){


                         $("#payablebooking").submit();
                    }else{

                        location.reload();
                    }
                }
            });
        }else{

            window.location='{{ url('accountpayable/list') }}';

        }

    });

	function addnewrow(rowid)
	{



		if (rowid != ''){
				$('#add'+rowid).attr('disabled',true);

		}



		//alert(rowid);
		$.ajax({

				url:'{{url('accountpayable/get-add-row-item')}}/'+rowid,
				type: "GET",

				success: function(response) {

					$("#dynamic_row").append(response);

				}
			});
	}

	function delRow(rowid)
	{
		var lastrow = $(".itemslot:last").attr("id");
        //alert(lastrow);
        var active_div = (lastrow-1);
        $('#add'+active_div).attr('disabled',false);
        $(document).on('click','.deleteButton',function() {
            $(this).closest("div.itemslot").remove();
        });


	    /*$(document).on('click','.deleteButton',function(rowid) {
            if (rowid > 1){
                $('#add'+rowid).removeAttr("disabled");

            }
  		    $(this).closest("div.itemslot").remove();
		});*/
	}
    function getSubhead(val){

        var account_head_id = $('#account_head_id'+val).find(":selected").text();


        $.ajax({
            type:'GET',
            url:'{{url('accountpayable/assetslist')}}/'+account_head_id,
            success: function(response){
                //console.log(response);
                if(response){
                    var option = '<option value="">Select Sub Account</option>';
                    for (var i=0;i<response.length;i++){
                        option += '<option value="'+ response[i].id + '">' + response[i].head_name + '</option>';
                    }
                    $('#sub_account_id'+val).html(option);
                }
            }
        });
    }


    function getSubaccountDtl(val){
        var selectedsub_account_head = $('#sub_account_id'+val).find(":selected").val();

        $.ajax({
            type:'GET',
            url:'{{url('accountpayable/subaccount_dtl')}}/'+selectedsub_account_head,
            success: function(response){
                console.log(response);
                var obj = JSON.parse(response);
                $('#account_tool'+val).val(obj.account_tool);
                $('#transaction_code'+val).val(obj.coa_code);
            }
        });
    }


    function getVoucherType(){

        var voucher_type = $("#voucher_type option:selected").val();

        if(voucher_type =='payment_employee'){

            $('#employee_id').attr('disabled',false);


            $('#purchase_code').attr('disabled',true);
            $('#purchase_code').val('');
            $('#billno').attr('readonly',true);
            $('#billno').val('');
            $('#billdate').attr('readonly',true);
            $('#billdate').val('');
            $('#vendor_id').attr('readonly',true);
            $('#vendor_id').val('');

        }else if(voucher_type =='payment_vendor_with_po'){

            $('#purchase_code').attr('disabled',false);


            $('#employee_id').attr('disabled',true);
            $('#employee_id').val('');
            $('#billno').attr('readonly',false);
            $('#billdate').attr('readonly',false);
            $('#vendor_id').attr('disabled',true);
            $('#vendor_id').val('');

        }else{
            $('#vendor_id').val('');
            $('#vendor_id').attr('disabled',false);
            $('#vendor_name').val('');

            $('#purchase_code').attr('disabled',true);
            $('#purchase_code').val('');
            $('#employee_id').attr('disabled',true);
            $('#employee_id').val('');
            $('#billno').attr('readonly',false);
            $('#billdate').attr('readonly',false);

        }
    }

    function getPurchaseOrderDtl(){

        var purchase_order_no = $("#purchase_code option:selected").val();

        $.ajax({
            type:'GET',
            url:'{{url('purchase/purchase_order_dtl')}}/'+purchase_order_no,
            success: function(response){
                obj=JSON.parse(response);
               // console.log(obj);

               var account_head_id = obj.cat_name;

$.ajax({
    type:'GET',
    url:'{{url('accountpayable/assetslist')}}/'+account_head_id,
    success: function(response){
        console.log(response);
        if(response){
            var option = '<option value="">Select Sub Account</option>';
            for (var i=0;i<response.length;i++){
                option += '<option value="'+ response[i].id + '">' + response[i].head_name + '</option>';
            }
            $('#sub_account_id0').html(option);
        }
    }
});


                $("#bill_amt0").val(obj.offer_price);
                var bill_gst_amt= obj.purchase_order_dtl.sgst+ obj.purchase_order_dtl.cgst+obj.purchase_order_dtl.igst;
                $("#bill_gst_amt0").val(bill_gst_amt);
                $("#final_bill_amt0").val(obj.offer_price);
                $("#payable_amt0").val(obj.purchase_order_dtl.total_with_tax);
                $("#account_head_id0").val(obj.coa_code);
                $('#vendor_id').val(obj.purchase_order_dtl.supplier_name);
                $('#vendor_name').val(obj.supplier_dtl.supplier_business_name);
                $('#totdebit').val(obj.purchase_order_dtl.total_with_tax);






            }
        });
    }


    function vendorDtl(){

        var vendor_name = $("#vendor_id option:selected").text();
        $('#vendor_name').val(vendor_name);
    }


  function radiocahange(val){

        var getvalue = $("#optradio"+val).val();
var check= document.getElementById("optradio"+val);


        if(getvalue =='no' && check.checked==true){

            $('#tds_id'+val).attr('disabled',true);
            $('#deduction_amt'+val).val(0);
            $('#tds_percentage'+val).val(0);
            $('#tds_id'+val).val('');
            //$('#final_bill_amt').val(amount);
            calculateFinalBill(val);

        }else{

            $('#tds_id'+val).attr('disabled',false);
        }
    }

    function getRate(val){
        var tds_id= $('#tds_id'+val).val();

        var rate = $('select#tds_id'+val).find(':selected').data('rate');
        $('#tds_percentage'+val).val(rate);
        var amount= $('#bill_amt'+val).val();
        var deduction= Math.round(amount*rate/100);
        $('#deduction_amt'+val).val(deduction);
        var payable_amt=(parseInt(amount) - parseInt(deduction));
        $('#payable_amt'+val).val(payable_amt);
        $('#final_bill_amt'+val).val(payable_amt);
    }

    function calculateFinalBill(val)
    {
        var amount= $('#bill_amt'+val).val();
        var deduction= $('#deduction_amt'+val).val();
        var amt =(parseInt(amount) - parseInt(deduction));
        $('#final_bill_amt'+val).val(amt);
        $('#payable_amt'+val).val(amt);
    }


    function calculateFinalAmount(val)
    {



        var bill_gst_amt =$('#bill_gst_amt'+val).val();
        var final_bill_amt= $('#final_bill_amt'+val).val();
        var payable_amt=(parseInt(final_bill_amt) + parseInt(bill_gst_amt));
        $('#payable_amt'+val).val(payable_amt);


        var account_tool = $('#account_tool'+val).find(":selected").val();

        var totcredit = $('#totcredit').val();
        var totdebit = $('#totdebit').val();

        if (account_tool == 'debit'){
var total=parseInt(totdebit)+parseInt(payable_amt);
            $('#totdebit').val(total);

        }else{
            var total=parseInt(totcredit)+parseInt(payable_amt);
            $('#totcredit').val(total);

        }
    }


    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
