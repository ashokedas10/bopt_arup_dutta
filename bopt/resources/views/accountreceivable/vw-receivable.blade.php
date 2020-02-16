@extends('masters.layouts.master')

@section('title')
    BOPT - Payment Receive
@endsection

@section('sidebar')
    @include('accountreceivable.partials.sidebar')
@endsection

@section('header')
    @include('accountreceivable.partials.header')
@endsection
<style>
    .bordr {
    border: 1px solid #bdbcbc;
    padding: 15px 25px;
    margin-bottom: 15px;
}
</style>
@section('scripts')
    @include('accountreceivable.partials.scripts')
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
                            <strong>Add Payment Received</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ url('accountreceivable/save') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="" id="payment_booking_id">
                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Voucher Type <span>(*)</span></label>
                                        <select name="voucher_type" id="voucher_type" class="form-control" required>
                                            <option value="">Select Voucher Type</option>
                                            <option value="received">Received Voucher</option>
                                        </select>
                                        @if ($errors->has('voucher_type'))
                                            <div class="error" style="color:red;">{{ $errors->first('voucher_type') }}</div>
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
                                <div class="row form-group " >
                                    <div class="col-md-3">
                                        <label class="form-control-label">Account Head<span>(*)</span></label>
                                        <select name="account_head_id[]" class="form-control" id="account_head_id<?php echo $tr_id; ?>" onchange="getSubhead(<?php echo $tr_id; ?>)" required>
                                            <option value="">Select Account</option>
                                            @foreach($accounthead as $acchead)
                                                <option value="<?php echo $acchead->account_code; ?>"><?php echo $acchead->account_name; ?></option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('account_head_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_head_id') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">Sub Account <span>(*)</span></label>
                                        <select name="sub_account_id<?php echo $tr_id; ?>" id="sub_account_id<?php echo $tr_id; ?>" class="form-control" onchange="getSubaccountDtl(<?php echo $tr_id; ?>)" required>
                                        </select>
                                        @if ($errors->has('sub_account_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('sub_account_id') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Transaction Code <span>(*)</span></label>
                                        <input type="text" name="transaction_code<?php echo $tr_id; ?>"
                                        id="transaction_code<?php echo $tr_id; ?>" class="form-control"
                                        value="<?php if(!empty($payment_details->id)){ echo $payment_details->transaction_code; } ?>" required readonly />
                                        @if ($errors->has('transaction_code'))
                                            <div class="error" style="color:red;">{{ $errors->first('transaction_code') }}</div>
                                        @endif
                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-control-label">Type<span>(*)</span></label>
                                        <select name="account_tool<?php echo $tr_id; ?>" id="account_tool<?php echo $tr_id; ?>" class="form-control"
                                            required>

                                              <option value="credit">Credit</option>
                                              <option value="debit">Debit</option>



                                          </select>
                                        @if ($errors->has('account_tool'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_tool') }}</div>
                                        @endif
                                    </div>


                                </div>



                                <div class="row form-group">

                                        <div class="col-md-3" id="account_head" style="display:none;">
                                                <label class=" form-control-label">Receive Account Head <span>(*)</span></label>
                                                <select name="receive_id<?php echo $tr_id; ?>" id="receive_id<?php echo $tr_id; ?>" class="form-control"  >
                                                    <option value="">Select Receive Mode</option>
                                                    <option value="07/003/004">Cash in Hand</option>
                                                    <option value="07/003/005">Petty Cash</option>
                                                </select>
                                                @if ($errors->has('bank_id'))
                                                    <div class="error" style="color:red;">{{ $errors->first('bank_id') }}</div>
                                                @endif
                                            </div>



                                            <div class="col-md-3">
                                                <label class="form-control-label">Received Amount<span>(*)</span></label>
                                                <input type="text" name="bill_amt<?php echo $tr_id; ?>" class="form-control" value="0" id="bill_amt<?php echo $tr_id; ?>"  >
                                                @if ($errors->has('amount'))
                                                    <div class="error" style="color:red;">{{ $errors->first('amount') }}</div>
                                                @endif
                                            </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">GST Amount</label>
                                        <input type="text" name="bill_gst_amt<?php echo $tr_id; ?>" id="bill_gst_amt<?php echo $tr_id; ?>" class="form-control" value="0"  onblur="calculateFinalBill(<?php echo $tr_id; ?>);">
                                        @if ($errors->has('bill_gst_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('bill_gst_amt') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label">Total Amount<span>(*)</span></label>
                                        <input type="text" name="payable_amt<?php echo $tr_id; ?>" class="form-control" value="0" readonly id="payable_amt<?php echo $tr_id; ?>" required />
                                        @if ($errors->has('payable_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('payable_amt') }}</div>
                                        @endif
                                    </div>



                                </div>


                                <div class="row form-group">






                                    <div class="col-md-6">
                                        <label class="form-control-label">Narration</label>
                                        <textarea rows="5" name='entry_remark<?php echo $tr_id; ?>' class="form-control" id="entry_remark<?php echo $tr_id; ?>"><?php if(!empty($payment_details->entry_remark)){ echo $payment_details->entry_remark; }  ?></textarea>
                                        @if ($errors->has('entry_remark'))
                                            <div class="error" style="color:red;">{{ $errors->first('entry_remark') }}</div>
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
                                {{-- <button type="submit" class="btn btn-danger btn-sm" >Submit</button> --}}


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

            if(  ($('#voucher_type').val() == '') ){

                alert("Please Fill up The form Properly");
                return false;

            }


            var payment_booking_id= $('#payment_booking_id').val();
            var selectedsub_account_id = $("#sub_account_id option:selected").val();
            var totcredit = $('#totcredit').val();

var totdebit = $('#totdebit').val();

if(parseInt(totcredit)!=parseInt(totdebit)){

    alert("Debit and Credit amount are not same");
    return false;
}
            if(payment_booking_id == '' ) {
                $.ajax({
                    type:'GET',
                    url:'{{url('accountreceivable/get-lastvoucherno')}}',

                    success: function(response){
                        console.log(response);
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

                window.location='{{ url('accountreceivable/list') }}';

            }

        });
        function addnewrow(rowid)
	{



		if (rowid != ''){
				$('#add'+rowid).attr('disabled',true);

		}



		//alert(rowid);
		$.ajax({

				url:'{{url('accountreceivable/get-add-row-item')}}/'+rowid,
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

            // alert(account_head_id);

            $.ajax({
                type:'GET',
                url:'{{url('accountpayable/assetslist')}}/'+account_head_id,
                success: function(response){

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


        function getPaymentMode(){

            var payment_mode= $("#payment_mode option:selected").val();
            // alert(selectedsub_account_head);
            if(payment_mode == 'cash')
            {
                $("#account_head").show();
                $("#bank_name").hide();
                $("#bank_branch_name").hide();
            }

            else if(payment_mode=='cheque'){


                $("#account_head").hide();

                $("#bank_branch_name").show();
                $('#cheque_draft').attr('readonly',false);
                $('#cheque_date').attr('readonly',false);


            }else{

                $("#account_head").hide();
                $("#bank_name").show();
                $("#bank_branch_name").show();
                $('#cheque_draft').attr('readonly',true);
                $('#cheque_date').attr('readonly',true);
            }
        }


        // function getVoucherType(){
        //
        //     var voucher_type = $("#voucher_type option:selected").val();
        //
        //     if(voucher_type =='contra'){
        //
        //         $('#bank_id').attr('disabled',false);
        //         $('#employee_id').attr('disabled',true);
        //         $('#purchase_code').attr('disabled',true);
        //         $('#billno').attr('readonly',true);
        //         $('#billdate').attr('readonly',true);
        //         $('#purchase_code').attr('disabled',true);
        //         $('#vendor_id').attr('readonly',true);
        //
        //
        //     }else if(voucher_type =='payment_employee'){
        //
        //         $('#bank_id').attr('disabled',true);
        //         $('#purchase_code').attr('disabled',true);
        //         $('#employee_id').attr('disabled',false);
        //         $('#billno').attr('readonly',true);
        //         $('#billdate').attr('readonly',true);
        //         $('#purchase_code').attr('disabled',true);
        //         $('#vendor_id').attr('readonly',true);
        //
        //     }else{
        //
        //         $('#bank_id').attr('disabled',true);
        //         $('#purchase_code').attr('disabled',false);
        //         $('#employee_id').val('');
        //         $('#employee_id').attr('disabled',true);
        //         $('#billno').attr('readonly',false);
        //         $('#billdate').attr('readonly',false);
        //         $('#purchase_code').attr('disabled',false);
        //         $('#vendor_id').attr('readonly',false);
        //
        //     }
        // }

        {{--function getPurchaseOrderDtl(){--}}

        {{--    var purchase_order_no = $("#purchase_code option:selected").val();--}}

        {{--    $.ajax({--}}
        {{--        type:'GET',--}}
        {{--        url:'{{url('purchase/purchase_order_dtl')}}/'+purchase_order_no,--}}
        {{--        success: function(response){--}}
        {{--            obj=JSON.parse(response);--}}
        {{--            console.log(obj);--}}
        {{--            $("#bill_amt").val(obj.purchase_order_dtl.offer_price);--}}
        {{--            var bill_gst_amt= obj.purchase_order_dtl.sgst+ obj.purchase_order_dtl.cgst+obj.purchase_order_dtl.igst;--}}
        {{--            $("#bill_gst_amt").val(bill_gst_amt);--}}
        {{--            $("#final_bill_amt").val(obj.purchase_order_dtl.total_with_tax);--}}
        {{--            $("#payable_amt").val(obj.purchase_order_dtl.total_with_tax);--}}
        {{--            $('#vendor_id').val(obj.supplier_dtl.supplier_business_name);--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}


        // $('input:radio').change(function(){
        //
        //     var getvalue = this.value;
        //
        //     if(getvalue =='no'){
        //
        //         $('#tds_id').attr('disabled',true);
        //
        //     }else{
        //
        //         $('#tds_id').attr('disabled',false);
        //     }
        // });
        //
        // function getRate(){
        //     var tds_id= $('#tds_id').val();
        //     var rate = $('select#tds_id').find(':selected').data('rate');
        //     $('#tds_percentage').val(rate);
        //     var amount= $('#bill_amt').val();
        //     var deduction= Math.round(amount*rate/100);
        //     $('#deduction_amt').val(deduction);
        //     var payable_amt=(parseInt(amount) - parseInt(deduction));
        //     $('#payable_amt').val(payable_amt);
        //     $('#final_bill_amt').val(payable_amt);
        // }

        function calculateFinalBill(val)
        {
            var amount= $('#bill_amt'+val).val();
            var addition= $('#bill_gst_amt'+val).val();
            var amt =(parseInt(amount) + parseInt(addition));
            // $('#final_bill_amt').val(amt);
            $('#payable_amt'+val).val(amt);
            var account_tool = $('#account_tool'+val).find(":selected").val();

            var totcredit = $('#totcredit').val();
        var totdebit = $('#totdebit').val();

        if (account_tool == 'debit'){
var total=parseInt(totdebit)+parseInt(amt);
            $('#totdebit').val(total);

        }else{
            var total=parseInt(totcredit)+parseInt(amt);
            $('#totcredit').val(total);

        }
        }





    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
