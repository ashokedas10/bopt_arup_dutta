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

                               
                             @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
                            <strong class="card-title">Contra Listing</strong>
                            </div>
                            <div class="aply-lv">
                                <a href='{{url("contra/view")}}' class="btn btn-default">Add New Contra Voucher <i class="fa fa-plus"></i></a>
                            </div>
                            <br/>
                            <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="overflow-x:scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Voucher No.</th>
                                            <th>Payment ID</th>
                                            <th>Net Amount</th>
                                            <th>Payment Amount</th>
                                            <th>Payment Date</th>
                                            <!--<th>View Voucher </th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($payablelisting as $paylist)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$paylist->voucher_no}}</td>
                                            <td>{{$paylist->payment_code}}</td>
                                            <td>{{$paylist->payable_amt}}</td>
                                            <td>{{$paylist->payment_amount}}</td>
                                            <td>{{$paylist->payment_release_date}}</td>
                                            <!--<td style="text-align:center;">
                                                <a href='{{url("payment/report/$paylist->voucher_no")}}' target="_blank"><i class="ti-eye" style="background: #1c9ac5;color: #fff;height: 50px;width: 53px;    border-radius: 50%;padding: 9px 10px;"></i></a> 
                                            </td>-->
                                        </tr>
                                        @endforeach
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


<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>      
<script>

    $(function() {

        $(".btn-info").click(function() {
            id = $(this).data('id');
            $("#voucher_id").val(id);


            $.ajax({
            type : 'get',
            url  : '{{url('payment/view')}}/'+id,
            data : {'id':id},
                success:function(data){
                  console.log(data);
                  $('#voucher_no').val(data.payment_details.voucher_no);
                  $('#vendor_id').val(data.payment_details.vendor_id);
                  $('#billno').val(data.payment_details.billno);
                  $('#billdate').val(data.payment_details.billdate);
                  $('#bill_booking_date').val(data.payment_details.bill_booking_date);
                  $('#bill_amt').val(data.payment_details.bill_amt);
                  $('#bill_gst_amt').val(data.payment_details.bill_gst_amt);
                  $('#deduction_amt').val(data.payment_details.deduction_amt);
                  $('#final_bill_amt').val(data.payment_details.final_bill_amt);
                  $('#payable_amt').val(data.payment_details.payable_amt);
                  $('#entry_remark').val(data.payment_details.entry_remark);
                  
                  
                }
            });
        });

    });
</script>    

        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
