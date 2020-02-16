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

    <style type="text/css">
        table#bootstrap-data-table i{color:#fff !important;}
    </style>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">

                <div class="main-card">
                    <div class="card">

                        <div class="card-header">
                            <strong class="card-title">  Received</strong>
                            @if(Session::has('message'))
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="aply-lv" style="padding-right: 17px;margin-bottom:15px;">
                                <a href="{{ url('gpf/view') }}" class="btn btn-default">Add Received Payment <i class="fa fa-plus"></i></a>
                            </div>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Voucher No</th>
                                    <th>Type</th>

{{--                                    <th>Vouchaer Date</th>--}}

                                    <th>Payable Amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receivablelisting as $receivelist)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$receivelist->voucher_no}}</td>
                                        <td>{{$receivelist->account_tool}}</td>
{{--                                        <td>{{$receivelist->bill_booking_date}}</td>--}}

                                        <td>{{$receivelist->total_amt}}</td>
                                        <td>{{$receivelist->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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

    <!-- Modal Start -->

    <!-- Modal End -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script>

        $(function() {

            $(".btn-info").click(function() {
                id = $(this).data('id');
                $("#voucher_id").val(id);


                $.ajax({
                    type : 'get',
                    url  : '{{url('accoutpayable/view')}}/'+id,
                    data : {'id':id},
                    success:function(data){
                        console.log(data.payment_details.approve_status);
                        $('#account_head_id').val(data.payment_details.account_head_id);
                        $('#sub_account_id').val(data.payment_details.sub_account_id);
                        $('#transaction_code').val(data.payment_details.transaction_code);
                        $('#employee_id').val(data.payment_details.employee_id);
                        $('#account_tool').val(data.payment_details.account_tool);
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
                        $('#voucher_no').val(data.payment_details.voucher_no);
                        $("#approve_status").val(data.payment_details.approve_status);
                    }
                });
            });

            $('#modal-save').on('click',function(){
                id = $("#voucher_id").val();
                approve_status = $("#approve_status option:selected").val();

                $.ajax({
                    type: "GET",
                    url: '{{ url('accoutpayable/edit') }}/'+id+'/'+approve_status,

                    success:function(responce){
                        //console.log(responce);
                        location.reload();
                    }
                });
            });


        });
    </script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
