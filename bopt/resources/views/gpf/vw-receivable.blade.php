@extends('layouts.master')

@section('title')
GPF System-Company
@endsection

@section('sidebar')
    @include('gpf.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('scripts')
    @include('gpf.scripts')
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
                            <strong>Add  Received</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ url('gpf/save') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="" id="payment_booking_id">

                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Account Head<span>(*)</span></label>
                                        <select name="account_head_id" class="form-control" id="account_head_id" onchange="getSubhead()" required>
                                            <option value="">Select Account</option>
                                            @foreach($accounthead as $acchead)
                                                <option value="<?php echo $acchead->account_head; ?>"><?php echo $acchead->account_head; ?></option>
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
                                        <label class="form-control-label">Type<span>(*)</span></label>
                                        <input type="text" name="account_tool" id="account_tool" class="form-control" value="" required readonly>
                                        @if ($errors->has('account_tool'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_tool') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label>Receive Mode</label>
                                        <select name="payment_mode" id="payment_mode" class="form-control" onchange="getPaymentMode()" required>
                                            <option value="">Select Receive Mode</option>
                                            <option value="neft">NEFT/RTGS</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="row form-group">



                                        <div class="col-md-3">
                                                <label>Cheque/Draft No.</label>
                                                <input type="text" class="form-control" name="cheque_draft" id="cheque_draft" value="" readonly />
                                        </div>

                                        <div class="col-md-3">
                                            <label>Cheque/Draft Date</label>
                                            <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="" readonly />

                                        </div>
                                        <div class="col-md-3" id="bank_name">
                                            <label class=" form-control-label">Bank Name <span>(*)</span></label>
                                            <select name="bank_id" id="bank_id" class="form-control" onchange="populateBranch()" >
                                                @foreach($banklist as $value)
                                                <option value="<?php echo $value->bank_name; ?>"><?php echo $value->bank_name; ?></option>
                                            @endforeach

                                            </select>
                                            @if ($errors->has('bank_id'))
                                                <div class="error" style="color:red;">{{ $errors->first('bank_id') }}</div>
                                            @endif
                                        </div>


                                        <div class="col-md-3" id="bank_branch_name">
                                            <label class=" form-control-label">Bank Branch Name <span>(*)</span></label>
                                            <select name="bank_branch_id" id="bank_branch_id" class="form-control"  >

                                            </select>
                                            @if ($errors->has('bank_id'))
                                                <div class="error" style="color:red;">{{ $errors->first('bank_id') }}</div>
                                            @endif
                                        </div>
                                </div>

                                <div class="row form-group">

                                        <div class="col-md-3" id="account_head" style="display:none;">
                                                <label class=" form-control-label">Receive Account Head <span>(*)</span></label>
                                                <select name="receive_id" id="receive_id" class="form-control"  >
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
                                                <input type="text" name="bill_amt" class="form-control" value="0" id="bill_amt"   onblur="calculateFinalBill();">
                                                @if ($errors->has('amount'))
                                                    <div class="error" style="color:red;">{{ $errors->first('amount') }}</div>
                                                @endif
                                            </div>


                                    <div class="col-md-3">
                                        <label class="form-control-label">Total Amount<span>(*)</span></label>
                                        <input type="text" name="payable_amt" class="form-control" value="0" readonly id="payable_amt" required />
                                        @if ($errors->has('payable_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('payable_amt') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Voucher No</label>
                                        <input type="text" name="voucher_no" class="form-control" value="" id="voucher_no" readonly required />

                                    </div>


                                </div>


                                <div class="row form-group">






                                    <div class="col-md-6">
                                        <label class="form-control-label">Narration</label>
                                        <textarea rows="5" name='entry_remark' class="form-control" id="entry_remark"><?php if(!empty($payment_details->entry_remark)){ echo $payment_details->entry_remark; }  ?></textarea>
                                        @if ($errors->has('entry_remark'))
                                            <div class="error" style="color:red;">{{ $errors->first('entry_remark') }}</div>
                                        @endif
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

            if(($('#account_head_id').val() == '') || ($('#sub_account_id').val() == '') || ($('#account_tool').val() == '')  || ($('#bill_amt').val() == '') || ($('#payable_amt').val() == '') ){

                alert("Please Fill up The form Properly");
                return false;

            }


            var payment_booking_id= $('#payment_booking_id').val();
            var selectedsub_account_id = $("#sub_account_id option:selected").val();

            if(payment_booking_id == '' ) {
                $.ajax({
                    type:'GET',
                    url:'{{url('gpf/get-lastvoucherno')}}/'+selectedsub_account_id,

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

                window.location='{{ url('gpf/list') }}';

            }

        });

        function getSubhead(){

            var account_head_id = $("#account_head_id option:selected").text();
            // alert(account_head_id);

            $.ajax({
                type:'GET',
                url:'{{url('gpf/assetslist')}}/'+account_head_id,
                success: function(response){
                   // console.log(response);
                    if(response){
                        var option = '<option value="">Select Sub Account</option>';
                        for (var i=0;i<response.length;i++){
                            option += '<option value="'+ response[i].id + '">' + response[i].sub_account_head + '</option>';
                        }
                        $('#sub_account_id').html(option);
                    }
                }
            });

        }


        function getSubaccountDtl(){
            var selectedsub_account_head = $("#sub_account_id option:selected").val();

            $.ajax({
                type:'GET',
                url:'{{url('gpf/subaccount_dtl')}}/'+selectedsub_account_head,
                success: function(response){


                   // console.log(response);
                    var obj = JSON.parse(response);
                    $('#account_tool').val(obj.type);

                }
            });
            var selectedsub_account_head_bank = $("#sub_account_id option:selected").val();

            $.ajax({

                type:'GET',
                url:'{{url('gpf/bank_details')}}/'+selectedsub_account_head_bank,
                success: function(response){

                    if(response){
                        //console.log(response);
                        var obj = JSON.parse(response);
                        var option = '<option value="">Select Bank name</option>';
                        for (var i=0;i<obj.length;i++){
                            option += '<option value="'+ obj[i].master_bank_name + '">' + obj[i].master_bank_name + '</option>';
                        }
                        $('#bank_id').html(option);
                    }
                }
            });


        }

        function populateBranch(){

            var bank_name = $("#bank_id option:selected").val();
            var selectedsub_account_head_bank = $("#sub_account_id option:selected").text();


            $.ajax({
                type:'GET',
                url:'{{url('gpf/get-company-bank')}}/'+bank_name,
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
                $("#bank_name").show();
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

        function calculateFinalBill()
        {
            var amount= $('#bill_amt').val();

            var amt =(parseInt(amount) );
            // $('#final_bill_amt').val(amt);
            $('#payable_amt').val(amt);
        }





    </script>



@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection

