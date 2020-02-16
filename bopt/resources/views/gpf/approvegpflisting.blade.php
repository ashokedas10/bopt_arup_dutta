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
                            @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
                            <strong class="card-title">GPF Listing</strong>
                            </div>
                            <br/>


                            <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="overflow-x:scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Emp Code</th>
                                            <th>Emp Name</th>
                                            <th>Loan No.</th>
                                            <th>Loan Amount</th>
                                            <th>Loan Apply Date</th>
                                            <th>Loan Apply Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($approve_gpf_listing as $approvelist)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$approvelist->employee_code}}</td>
                                            <td>{{$approvelist->emp_fname}} {{$approvelist->emp_mname}}{{$approvelist->emp_lname}}</td>
                                            <td>{{$approvelist->loan_applied_no}}</td>
                                            <td>{{$approvelist->loan_amount}}</td>
                                            <td>{{ date('d-m-Y', strtotime($approvelist->apply_date)) }}</td>
                                            <td>{{$approvelist->loan_status}}</td>
                                            @if($approvelist->loan_status=='APPROVED')
                                            <td><a href='{{url("gpf/apply/$approvelist->id")}}'><i class="ti-pencil-alt"></i></a></td>
                                            @else
                                            <td></td>
                                            @endif
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
