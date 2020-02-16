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
.brdr {
    border: 1px solid #b2b8bd;
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
                            <strong>Payment Entry</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('payment/view') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="id" value="" />

                            <div class="row form-group">
                              <div class="col-md-4">
                                <label for="text-input" class="form-control-label">Payment Id </label>
                                <input type="text" class="form-control" name="payment_code" value="<?php echo time(); ?>" />
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
                                <label class=" form-control-label">Voucher Type <span>(*)</span></label>
                                <input type="text" name="voucher_type" id="voucher_type" class="form-control" value="" readonly />
                            </div>

                            <div class="col-md-4">
                                <label class=" form-control-label">Employee List <span>(*)</span></label>

                                <input type="text" name="employee_id" id="employee_id" class="form-control" value="" readonly />

                            </div>
                            <div class="col-md-4">
                                <label>Vendor List</label>
                                 <input type="text" name="vendor_id" id="vendor_id" class="form-control" value="" readonly />
                            </div>
                            <div class="col-md-4">
                                <label for="text-input" class="form-control-label">Bill No.</label>
                                <input type="text" class="form-control" name="bill_no" id="bill_no" value="" readonly />
                              </div>

                        </div>


                        <div class="row form-group">


                          <div class="col-md-4">
                            <label for="text-input" class="form-control-label">Bill Date</label>
                            <input type="text" class="form-control" name="bill_date" id="bill_date" value="" readonly />
                          </div>

                          <div class="col-md-4">
                            <label>Payment Booking Date</label>
                            <input type="date" class="form-control" name="payment_booking_date" value="" />
                        </div>


                        <div class="col-md-4">
                            <label>Payment Release Date</label>
                            <input type="date" class="form-control" name="release_date" value="">
                        </div>

                            </div>
                            <div id='paybr'>
                            <div class="brdr"  >
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="email-input" class="form-control-label">Account Head</label>
                                    <select name="account_head_id" class="form-control" id="account_head_id">
                                        <option value="">Select Account</option>
                                                @foreach($accounthead as $acchead)
                                                <option value="{{ $acchead->account_code }}">{{ $acchead->account_name }}</option>
                                                @endforeach
                                    </select>
                                  </div>
                              <div class="col-md-4">
                                <label for="text-input" class="form-control-label">Account Sub Head</label>
                                <select name="sub_account_id" id="sub_account_id" class="form-control">
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


                              </div>


                            <div class="row form-group">

                                <div class="col-md-4">
                                    <label for="text-input" class="form-control-label">Type </label>

                                    <input type="text" class="form-control" name="account_type" id="account_type" value="" readonly />
                                  </div>

                              <div class="col-md-4">
                                <label for="text-input" class="form-control-label">Final Bill Amount</label>
                                <input type="text" class="form-control" name="final_bill_amt" id="final_bill_amt" value="" readonly />
                              </div>
                              <div class="col-md-4">
                                <label>Bill GST Amount</label>
                                <input type="text" class="form-control" name="bill_gst_amt"
                                id="bill_gst_amt" value="" readonly />
                            </div>
                            </div>


                              <div class="row form-group">



                                <div class="col-md-4">
                                    <label>Net Amount</label>
                                    <input type="text" class="form-control" name="net_amt" id="net_amt" value="" readonly />
                                </div>

                                <div class="col-md-4">
                                    <label>Payment Mode</label>
                                    <select name="payment_mode" id="payment_mode" class="form-control" onchange="getPaymentMode()" required>
                                        <option value="">Select Payment Mode</option>
                                        <option value="cash">Cash</option>
                                        <option value="neft">NEFT/RTGS</option>
                                        <option value="cheque">Cheque</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Cheque/Draft No./ Transfer No. </label>
                                    <input type="text" class="form-control" name="cheque_draft" id="cheque_draft" value="" required />
                                </div>

                            </div>


                            <div class="row form-group">





                                <div class="col-md-4">
                                    <label>Cheque/Draft Transfer Date</label>
                                    <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="" required />

                                </div>


                                <div class="col-md-4">
                                    <label>Select Bank</label>
                                    <select name="payment_bank_id" id="payment_bank_id" class="form-control" required onchange="populateBranch()">
                                        <option value="">Select Bank name</option>
                                        @foreach($banklist as $bank)
                                        <option value="<?php echo $bank->master_bank_name; ?>" >
                                        <?php echo $bank->master_bank_name; ?></option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label>Branch <span>(*)</span></label>
                                    <select class="form-control" name="bank_branch_id" id="bank_branch_id" required>

                                    </select>
                                </div>

                            </div>

                            <div class="row form-group">


                                <div class="col-md-4">
                                    <label>Payment Amount</label>
                                    <input type="text" class="form-control" name="payment_amount" id="payment_amount" value="" readonly />
                                </div>

                                <div class="col-md-4">
                                    <label>Due Amount</label>
                                    <input type="text" class="form-control" readonly name="due_amt" id="due_amt" value="0" />
                                </div>

                                <div class="col-md-8">
                                    <label>Narration</label>
                                    <textarea rows="3" class="form-control" name="remarks" id="remarks" readonly></textarea>
                            </div>

                            </div>

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
            url:'{{url('accoutpayable/view')}}/'+voucher_no,
            success: function(response){
                console.log(response);



$('#voucher_type').val(response.payments.voucher_type);
                $('#vendor_id').val(response.payments.vendor_id);
                $('#employee_id').val(response.payments.employee_id);
                $('#bank_id').val(response.payments.bank_name);
                $('#bill_no').val(response.payments.billno);
                $('#bill_date').val(response.payments.billdate);
                $('#paybr').html(response.result);


            }
        });
    }


    function populateBranch(val){


        var bank_name = $('#payment_bank_id'+val).find(":selected").val();

        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank-pay')}}/'+bank_name,
            success: function(response){
                console.log(response);
                obj=JSON.parse(response);
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }
                $('#bank_branch_id'+val).html(option);
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


    function getPaymentMode(val){
        var payment_mode = $('#payment_mode'+val).find(":selected").val();


        if(payment_mode=='cheque'){

            $('#cheque_draft'+val).attr('readonly',false);
            $('#cheque_date'+val).attr('readonly',false);
        }else{
            $('#cheque_draft'+val).attr('readonly',true);
            $('#cheque_date'+val).attr('readonly',true);
        }
    }


</script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
