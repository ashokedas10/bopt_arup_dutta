@extends('layouts.master')

@section('title')
Stipend System-Company
@endsection

@section('sidebar')
    @include('stipend.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('scripts')
    @include('stipend.scripts')
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
                            <form action="{{ url('stipend/save') }}" method="post" enctype="multipart/form-data" id="payablebooking">
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
                                        <div class="col-md-3">
                                            <label for="text-input" class="form-control-label">Received  Date</label>
                                            <input type="text" class="form-control" name="bill_date" id="bill_date" readonly value="{{date('Y-m-d')}}"  />
                                          </div>

                                          <div class="col-md-3">
                                            <label>Payment Received Date</label>
                                            <input type="date" class="form-control" name="payment_booking_date" value="" />
                                        </div>
                                </div>


                                <div id="dynamic_row">


<div class="bordr itemslot" 	id="">
                                <div class="row form-group " >
                                    <div class="col-md-3">
                                        <label class="form-control-label">Account Head<span>(*)</span></label>
                                        <select name="account_head_id" class="form-control" id="account_head_id" onchange="getSubhead()" required>
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
                                        <select name="sub_account_id" id="sub_account_id" class="form-control" onchange="getSubaccountDtl()" required>
                                        </select>
                                        @if ($errors->has('sub_account_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('sub_account_id') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Transaction Code <span>(*)</span></label>
                                        <input type="text" name="transaction_code"
                                        id="transaction_code" class="form-control"
                                        value="<?php if(!empty($payment_details->id)){ echo $payment_details->transaction_code; } ?>" required readonly />
                                        @if ($errors->has('transaction_code'))
                                            <div class="error" style="color:red;">{{ $errors->first('transaction_code') }}</div>
                                        @endif
                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-control-label">Type<span>(*)</span></label>
                                        <select name="account_tool" id="account_tool" class="form-control"
                                            required>

                                              <option value="credit">Credit</option>



                                          </select>
                                        @if ($errors->has('account_tool'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_tool') }}</div>
                                        @endif
                                    </div>


                                </div>


                                <div class="row form-group">




                                    <div class="col-md-4">
                                        <label>Payment Mode</label>
                                        <select name="payment_mode" id="payment_mode" class="form-control" onchange="getPaymentMode()" required>
                                            <option value="">Select Payment Mode</option>

                                            <option value="neft">NEFT/RTGS</option>
                                            <option value="cheque">Cheque</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Cheque/Draft No./ Transfer No. </label>
                                        <input type="text" class="form-control" name="cheque_draft" id="cheque_draft" value="" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Cheque/Draft Transfer Date</label>
                                        <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="" required />

                                    </div>
                                </div>
                                <div class="row form-group">










                                <div class="col-md-3">
                                    <label>Select Bank</label>
                                    <select name="payment_bank_id" id="payment_bank_id" class="form-control" required onchange="populateBranch()">
                                        <option value="">Select Bank name</option>
                                        @foreach($banklist as $bank)
                                        <option value="<?php echo $bank->master_bank_name; ?>" >
                                        <?php echo $bank->master_bank_name; ?></option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label>Branch <span>(*)</span></label>
                                    <select class="form-control" name="bank_branch_id" id="bank_branch_id" required>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label">Received Amount<span>(*)</span></label>
                                    <input type="text" name="bill_amt" class="form-control" value="0" id="bill_amt"  >
                                    @if ($errors->has('amount'))
                                        <div class="error" style="color:red;">{{ $errors->first('amount') }}</div>
                                    @endif
                                </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">GST Amount</label>
                                        <input type="text" name="bill_gst_amt" id="bill_gst_amt" class="form-control" value="0"  onblur="calculateFinalBill();">
                                        @if ($errors->has('bill_gst_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('bill_gst_amt') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-control-label">Total Amount<span>(*)</span></label>
                                        <input type="text" name="payable_amt" class="form-control" value="0" readonly id="payable_amt" required />
                                        @if ($errors->has('payable_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('payable_amt') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-control-label">Narration</label>
                                        <textarea rows="5" name='entry_remark' class="form-control" id="entry_remark"><?php if(!empty($payment_details->entry_remark)){ echo $payment_details->entry_remark; }  ?></textarea>
                                        @if ($errors->has('entry_remark'))
                                            <div class="error" style="color:red;">{{ $errors->first('entry_remark') }}</div>
                                        @endif
                                    </div>

                                </div>


                                <div class="row form-group">









                                </div>


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

            if(payment_booking_id == '' ) {
                $.ajax({
                    type:'GET',
                    url:'{{url('stipend/get-lastvoucherno')}}',

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

                window.location='{{ url('stipend/listreceived') }}';

            }

        });


        function getSubhead(){
            var account_head_id = $('#account_head_id').find(":selected").text();



            $.ajax({
                type:'GET',
                url:'{{url('accountpayable/assetslist')}}/'+account_head_id,
                success: function(response){

                    if(response){
                        var option = '<option value="">Select Sub Account</option>';
                        for (var i=0;i<response.length;i++){
                            option += '<option value="'+ response[i].id + '">' + response[i].head_name + '</option>';
                        }
                        $('#sub_account_id').html(option);
                    }
                }
            });

        }


        function getSubaccountDtl(){
        var selectedsub_account_head = $('#sub_account_id').find(":selected").val();

            $.ajax({
                type:'GET',
                url:'{{url('accountpayable/subaccount_dtl')}}/'+selectedsub_account_head,
                success: function(response){
                    console.log(response);
                    var obj = JSON.parse(response);
                    $('#account_tool').val(obj.account_tool);
                    $('#transaction_code').val(obj.coa_code);
                }
            });


        }


        function getPaymentMode(){

            var payment_mode = $('#payment_mode').find(":selected").val();



if(payment_mode=='cheque'){

    $('#cheque_draft').attr('readonly',false);
    $('#cheque_date').attr('readonly',false);
    $('#payment_bank_id').attr('readonly',false);
    $('#bank_branch_id').attr('readonly',false);

    $('#receive_id').attr('readonly',true);

}else if(payment_mode=='cash'){

$('#cheque_draft').attr('readonly',true);
    $('#cheque_date').attr('readonly',true);
    $('#payment_bank_id').attr('readonly',true);
    $('#bank_branch_id').attr('readonly',true);
    $('#receive_id').attr('readonly',false);



    }else{

    $('#cheque_draft').attr('readonly',true);
    $('#cheque_date').attr('readonly',true);
    $('#payment_bank_id').attr('readonly',false);
    $('#bank_branch_id').attr('readonly',false);
    $('#receive_id').attr('readonly',true);

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

        function calculateFinalBill()
        {
            var amount= $('#bill_amt').val();
            var addition= $('#bill_gst_amt').val();
            var amt =(parseInt(amount) + parseInt(addition));
            // $('#final_bill_amt').val(amt);
            $('#payable_amt').val(amt);



        }


        function populateBranch(){


var bank_name = $('#payment_bank_id').find(":selected").val();

$.ajax({
    type:'GET',
    url:'{{url('stipend/get-company-bank-pay')}}/'+bank_name,
    success: function(response){
        console.log(response);
        obj=JSON.parse(response);
        var option = '<option value="" label="Select">Select Branch</option>';
        for (var i=0;i<obj.length;i++){
           option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
        }
        $('#bank_branch_id').html(option);
    }
});
}





    </script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection

