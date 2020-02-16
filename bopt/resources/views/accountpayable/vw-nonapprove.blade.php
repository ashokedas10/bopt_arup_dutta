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
                            <strong>Not Approve Voucher</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('accoutpayable/edit') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="voucher_no" value="<?php if(!empty($payment_details->voucher_no)){ echo $payment_details->voucher_no; }  ?>" id="payment_booking_id">



                                <div class="row form-group">


                                    <div class="col-md-3">
                                        <label class=" form-control-label">Voucher Type <span>(*)</span></label>
                                          <input type="text" name="voucher_type" id="voucher_type" class="form-control" value="<?php if(!empty($payment_details->voucher_type)){ echo $payment_details->voucher_type; } ?>" readonly>

                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Employee List <span>(*)</span></label>

                                        <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php if(!empty($payment_details->employee_id)){ echo $payment_details->employee_id; } ?>" readonly />


                                    </div>


                                    <div class="col-md-3">
                                        <label class=" form-control-label">Vendor List <span>(*)</span></label>

                                        <input type="text" name="vendor_id" id="vendor_id" class="form-control" value="<?php if(!empty($payment_details->vendor_id)){ echo $payment_details->vendor_id; } ?>" readonly />


                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">Bill No.<span>(*)</span></label>
                                        <input type="text" name="billno" class="form-control" value="<?php if(!empty($payment_details->billno)){ echo $payment_details->billno; } ?>" <?php if(!empty($payment_details->id)){ echo "readonly"; }  ?> >

                                    </div>


                                </div>

                                <div class="row form-group">





                                    <div class="col-md-3">
                                        <label class=" form-control-label">Bill Date<span>(*)</span></label>
                                         <input type="date" name="billdate" class="form-control" value="<?php if(!empty($payment_details->billdate)){ echo $payment_details->billdate; }  ?>" <?php if(!empty($payment_details->id)){ echo "readonly"; }  ?>>

                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Bill booking Date<span>(*)</span></label>
                                         <input type="date" name="bill_booking_date" class="form-control" value="<?php if(!empty($payment_details->bill_booking_date)){ echo $payment_details->bill_booking_date; }  ?>" readonly />

                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-control-label">Payable Amount<span>(*)</span></label>
                                        <input type="text" name="payable_amt" class="form-control" value="<?php if(!empty($payment[0]->payable_amt)){ echo $payment[0]->payable_amt; }else{ echo '0';}  ?>" readonly id="payable_amt">

                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Approve Status</label>
                                        <select name="approve_status" id="approve_status" class="form-control" <?php if($payment_details->approve_status == "Approve"){ echo "disabled"; } ?> required>
                                            <option value="Not Approve" <?php if($payment_details->approve_status == "Not Approve"){ echo "selected"; } ?> >Not Approve</option>
                                            <option value="Approve" <?php if($payment_details->approve_status == "Approve"){ echo "selected"; } ?>>Approve</option>
                                        </select>
                                         @if ($errors->has('approve_status'))
                                            <div class="error" style="color:red;">{{ $errors->first('approve_status') }}</div>
                                        @endif
                                    </div>

                                </div>







							<?php if($payment_details->approve_status == "Not Approve"){?>
							<button type="submit" class="btn btn-danger btn-sm" id="getvoucher">Submit</button>
                            <?php } ?>

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



    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
