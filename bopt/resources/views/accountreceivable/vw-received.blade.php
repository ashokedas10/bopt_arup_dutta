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
                            <strong>Payment Received Entry</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ url('receiveable/view') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="id" value="" />

                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="text-input" class="form-control-label">Payment Id </label>
                                        <input type="text" class="form-control" name="payment_code" value="<?php echo time(); ?>" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select Voucher No.</label>

                                        <select name="voucher_no" class="form-control" id="voucher_no" onchange="getVoucherDtl()">
                                            <option value="">Select Voucher </option>
                                            @foreach($voucherlist as $voucher)
                                                <option value="{{ $voucher->voucher_no }}">{{ $voucher->voucher_no }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" id="account_code" name="account_code" value="" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email-input" class="form-control-label">Account Head</label>
                                        <select name="account_head_id" class="form-control" id="account_head_id" readonly="">
                                            <option value="">Select Account</option>
                                            @foreach($accounthead as $acchead)
                                                <option value="{{ $acchead->account_code }}">{{ $acchead->account_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="text-input" class="form-control-label">Account Sub Head</label>
                                        <select name="sub_account_id" id="sub_account_id" class="form-control" readonly="">
                                            <option value="">Select Account Subhead</option>
                                            @foreach($journalhead as $jourhead)
                                                <option value="<?php echo $jourhead->id; ?>" >
                                                    <?php echo $jourhead->head_name; ?></option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="text-input" class="form-control-label">Transaction Code </label>

                                        <input type="text" name="transaction_code" id="transaction_code" class="form-control" value="<?php if(!empty($payment_details->id)){ echo $payment_details->transaction_code; } ?>" readonly>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="text-input" class="form-control-label">Type </label>

                                        <input type="text" class="form-control" name="account_type" id="account_type" value="" readonly />
                                    </div>

                                </div>


                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <label class=" form-control-label">Voucher Type <span>(*)</span></label>
                                        <input type="text" name="voucher_type" id="voucher_type" class="form-control" value="" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <label class=" form-control-label">Bank List <span>(*)</span></label>

                                        <input type="text" name="bank_id" id="bank_id" class="form-control" value="" readonly />
                                    </div>

                                    <div class="col-md-4">
                                        <label>Branch <span>(*)</span></label>

                                        <input type="text"  id="bank_branch_name" class="form-control" value="" readonly />
                                        <input type="hidden" name="bank_branch_id" id="bank_branch_id" class="form-control" value="" />
                                    </div>



                                </div>



                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <label for="text-input" class="form-control-label">Received Amount</label>
                                        <input type="text" class="form-control" name="final_bill_amt" id="final_bill_amt" value="" readonly />
                                    </div>


                                    <div class="col-md-4">
                                        <label>GST Amount</label>
                                        <input type="text" class="form-control" name="bill_gst_amt"
                                               id="bill_gst_amt" value="" readonly />
                                    </div>

                                    <div class="col-md-4">
                                        <label>Net Amount</label>
                                        <input type="text" class="form-control" name="net_amt" id="net_amt" value="" readonly />
                                    </div>




                                </div>


                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label>Payment Mode</label>
                                        <select name="payment_mode" id="payment_mode" class="form-control" onchange="getPaymentMode()" required>
                                            <option value="">Select Payment Mode</option>
                                            <option value="neft">NEFT/RTGS</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>



                                    <div class="col-md-4">
                                        <label>Cheque/Draft No.</label>
                                        <input type="text" class="form-control" name="cheque_draft" id="cheque_draft" value="" readonly />
                                    </div>

                                    <div class="col-md-4">
                                        <label>Cheque/Draft Date</label>
                                        <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="" readonly />

                                    </div>




                                </div>

                                <div class="row form-group">


                                    <div class="col-md-8">
                                        <label>Narration</label>
                                        <textarea rows="3" class="form-control" id="remarks" name="remarks" value="" readonly></textarea>
                                    </div>



                                </div>




                                <button type="submit" class="btn btn-danger btn-sm">Submit </button>



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

        function getVoucherDtl(){
            var voucher_no = $("#voucher_no option:selected").val();

            $.ajax({
                type:'GET',
                url:'{{url('receiveable/view')}}/'+voucher_no,
                success: function(response){
                    console.log(response);
                    $('#account_code').val(response.payment_details.account_head_id);
                    $('#account_head_id').val(response.payment_details.account_head_id);
                    // $("#account_head_id").attr("disabled", true);
                    $('#sub_account_id').val(response.payment_details.sub_act_head_id);
                    // $("#sub_account_id").attr("disabled", true);
                    $('#transaction_code').val(response.payment_details.transaction_code);
                    $('#account_type').val(response.payment_details.account_tool);
                    $('#voucher_type').val(response.payment_details.voucher_type);
                    $('#vendor_id').val(response.payment_details.vendor_id);
                    $('#employee_id').val(response.payment_details.employee_id);
                    $('#bank_id').val(response.payment_details.bank_name);
                    $('#bank_branch_id').val(response.payment_details.bank_branch_id);
                    $('#bank_branch_name').val(response.payment_details.bank_branch_name);
                    $('#bill_no').val(response.payment_details.billno);
                    $('#bill_date').val(response.payment_details.billdate);
                    $('#final_bill_amt').val(response.payment_details.received_amount);
                    $('#bill_gst_amt').val(response.payment_details.gst_amt);
                    $('#deduction_amt').val(response.payment_details.deduction_amt);
                    $('#net_amt').val(response.payment_details.total_amt);
                    $('#payment_amount').val(response.payment_details.payable_amt);
                    $('#remarks').val(response.payment_details.remarks);

                }
            });
        }






        function calculateFinalBill()
        {
            var net_amt= $('#net_amt').val();
            var payment_amount= $('#payment_amount').val();
            var due_amt=(parseInt(net_amt) - parseInt(payment_amount));
            $('#due_amt').val(due_amt);
        }

        function getPaymentMode(){

            var payment_mode= $("#payment_mode option:selected").val();

            if(payment_mode=='cheque'){

                $('#cheque_draft').attr('readonly',false);
                $('#cheque_date').attr('readonly',false);


            }else{
                $('#cheque_draft').attr('readonly',true);
                $('#cheque_date').attr('readonly',true);
            }
        }




    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
