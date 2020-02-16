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
                            <strong>Add Contra Voucher</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('contra/save') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="" id="payment_booking_id">

                                <input type="hidden" name="voucher_type" id="voucher_type" class="form-control" value="contra" readonly>
                                <input type="hidden" name="account_tool" id="account_tool" class="form-control" value="debit" readonly>

                                <div class="row form-group">
                                    <!--<div class="col-md-3">
                                        <label>Contra Type</label>
                                        <select class="form-control" name="contra_type">
                                            <option value="">Select</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                        </select>
                                    </div>-->


                                    <div class="col-md-3">
                                        <label>Payment Mode</label>
                                        <select name="payment_mode" id="payment_mode" class="form-control" onchange="getPaymentMode()" required>
                                            <option value="">Select Payment Mode</option>
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                        </select>

                                        @if ($errors->has('payment_mode'))
                                            <div class="error" style="color:red;">{{ $errors->first('payment_mode') }}</div>
                                        @endif
                                    </div>


                                    <div class="col-md-3">
                                        <label>Account type <span>(*)</span></label>
                                        <select class="form-control" name="account_tool" id="account_tool" required>
                                            <option>Select</option>
                                            <option value="debit">Debit</option>
                                            <option value="credit">Credit</option>
                                        </select>

                                        @if($errors->has('account_tool'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_tool') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Bank List <span>(*)</span></label>
                                          <select name="from_bank_id" id="from_bank_id" class="form-control" onchange="fromPopulateBranch()" disabled>
                                            <option value="">Select Bank name</option>
                                            @foreach($banklist as $bank)
                                            <option value="<?php echo $bank->master_bank_name; ?>" >
                                            <?php echo $bank->master_bank_name; ?></option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('from_bank_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('from_bank_id') }}</div>
                                        @endif
                                    </div>

                                        <div class="col-md-3">
                                        <label>Branch <span>(*)</span></label>
                                        <select class="form-control" name="from_bank_branch_id" id="from_bank_branch_id" required disabled>

                                        </select>
                                         @if ($errors->has('from_bank_branch_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('from_bank_branch_id') }}</div>
                                        @endif
                                    </div>



                                </div>
                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="form-control-label">Account Head<span>(*)</span></label>
                                        <select name="account_head_id" class="form-control" id="account_head_id" required disabled>
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
                                        <select name="sub_account_id" id="sub_account_id" class="form-control" disabled onchange="getSubhead();">
                                            <option value="">Select Account Subhead</option>
                                            @foreach($subaccounthead as $subaccounthead)
                                                <option value="<?php echo $subaccounthead->id; ?>" data-subaccount-code="<?php echo $subaccounthead->coa_code; ?>"><?php echo $subaccounthead->head_name; ?></option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('sub_account_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('sub_account_id') }}</div>
                                        @endif

                                        <input type="hidden" name="sub_account_name" id="sub_account_name" class="form-control" value="" readonly>
                                        <input type="hidden" name="sub_account_code" id="sub_account_code" class="form-control" value="" readonly>

                                        <input type="hidden" name="bill_booking_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly />

                                    </div>

                                     <div class="col-md-3">
                                        <label class=" form-control-label">Bank List <span>(*)</span></label>
                                          <select name="to_bank_id" id="to_bank_id" class="form-control" onchange="toPopulateBranch()" disabled>
                                            <option value="">Select Bank name</option>
                                            @foreach($banklist as $bank)
                                            <option value="<?php echo $bank->master_bank_name; ?>" >
                                            <?php echo $bank->master_bank_name; ?></option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('to_bank_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('to_bank_id') }}</div>
                                        @endif
                                    </div>
                                     <div class="col-md-3">
                                        <label>Branch <span>(*)</span></label>
                                        <select class="form-control" name="to_bank_branch_id" id="to_bank_branch_id" required disabled>
                                        </select>

                                         @if ($errors->has('to_bank_branch_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('to_bank_branch_id') }}</div>
                                        @endif
                                    </div>

                                </div>


                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label class="form-control-label">Amount<span>(*)</span></label>
                                        <input type="text" name="payable_amt" class="form-control" value="" id="payable_amt" required />
                                        @if ($errors->has('payable_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('payable_amt') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label class=" form-control-label">Voucher No</label>
                                        <input type="text" name="voucher_no" class="form-control" value="" id="voucher_no" readonly required />
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-control-label">Narration</label>
                                         <textarea rows="5" name='entry_remark' class="form-control" id="entry_remark"><?php if(!empty($payment_details->entry_remark)){ echo $payment_details->entry_remark; }  ?></textarea>
                                        @if ($errors->has('entry_remark'))
                                            <div class="error" style="color:red;">{{ $errors->first('entry_remark') }}</div>
                                        @endif
                                    </div>


                                </div>

				               <button type="button" class="btn btn-danger btn-sm" id="getvoucher">Submit</button>

                               {{-- <button type="submit" class="btn btn-danger btn-sm">Submit</button> --}}

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

    function getPaymentMode(){

        var payment_mode= $("#payment_mode option:selected").val();

        if(payment_mode=='bank'){

            $('#from_bank_id').attr('disabled',false);
            $('#from_bank_branch_id').attr('disabled',false);
            $('#to_bank_id').attr('disabled',false);
            $('#to_bank_branch_id').attr('disabled',false);
            $('#account_head_id').attr('disabled',true);
            $('#sub_account_id').attr('disabled',true);
            $('#account_head_id').val('');
            $('#sub_account_id').val('');
            $('#sub_account_name').val('');
            $('#sub_account_code').val('');

        }else{

            $('#account_head_id').attr('disabled',false);
            $('#sub_account_id').attr('disabled',false);
            $('#from_bank_id').attr('disabled',true);
            $('#from_bank_id').val('');
            $('#from_bank_branch_id').attr('disabled',true);
            $('#from_bank_branch_id').val('');
            $('#to_bank_id').attr('disabled',false);
            $('#to_bank_branch_id').attr('disabled',false);
        }
    }


    function getSubhead(){
        var payment_mode= $("#payment_mode option:selected").val();
        var sub_account_name= $("#sub_account_id option:selected").text();
        var sub_account_code= $("#sub_account_id option:selected").data('subaccount-code');

        $('#sub_account_name').val(sub_account_name);
        $('#sub_account_code').val(sub_account_code);


        if(sub_account_name=='cash in hand'){

            $('#to_bank_id').removeAttr("disabled");
            $('#to_bank_branch_id').attr('disabled',false);

        }else{

            $('#to_bank_id').attr('disabled',false);
            $('#to_bank_branch_id').attr('disabled',false);

            // $('#account_tool').prop('readonly',true);

            $('#account_tool option[value="credit"]').attr("disabled", true);
        }
        /*if(sub_account_name=='Petty cash'){

            $('#to_bank_id').attr('disabled',false);
            $('#to_bank_branch_id').attr('disabled',false);

        }else{

            $('#to_bank_id').attr('disabled',true);
            $('#to_bank_branch_id').attr('disabled',true);

        }*/

    }


    function fromPopulateBranch(){

        var from_bank_id = $("#from_bank_id option:selected" ).val();
        //$('#to_bank_id option[value="'+from_bank_id+'"]').attr("disabled", true);
        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank')}}/'+from_bank_id,
            success: function(response){

                obj=JSON.parse(response);
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }

                $('#from_bank_branch_id').html(option);
            }
        });
    }


    function toPopulateBranch(){

        var to_bank_id = $("#to_bank_id option:selected" ).val();


        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank')}}/'+to_bank_id,
            success: function(response){

                obj=JSON.parse(response);
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }

                $('#to_bank_branch_id').html(option);
            }
        });
    }



    $("#getvoucher").click(function () {

        var payment_booking_id= $('#payment_booking_id').val();
        if(payment_booking_id == '' ) {
            $.ajax({
                type:'GET',
                url:'{{url('accountpayable/get-lastvoucherno')}}',
                success: function(response){
                    //console.log(response);
                    $("#voucher_no").val(response);
                    var x=confirm( "Are you sure you want to save?!");

                    if(x){

                        $.ajax({
                            type: "POST",
                            url: '{{ url('contra/save') }}',
                            data: $("#payablebooking").serialize(),
                            datatype: 'JSON',
                            success: function(responce)
                            {
                                console.log(responce);
                                window.location='{{ url('contra/list') }}';
                                alert("Record save Successfully");
                            }
                        });
                    }else{

                        location.reload();
                    }
                }
            });
        }else{

            window.location='{{ url('contra/list') }}';

        }

    });








    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
