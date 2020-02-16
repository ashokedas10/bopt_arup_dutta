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
                            <strong class="card-title">Term Deposit Listing</strong>
                            </div>
                            <div class="aply-lv">
                                <a href='{{url("gpf/termdeposit")}}' class="btn btn-default">Add New Term Deposit <i class="fa fa-plus"></i></a>
                            </div>
                            <br/>


                            <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="overflow-x:scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Bank Name</th>
                                            <th>Account No.</th>
                                            <th>Investment Date</th>
                                            <th>Invesment Amount</th>
                                            <th>Date Of Maturity</th>
                                              <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($term_deposit_listing as $term_deposit)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$term_deposit->bank_name}}</td>
                                            <td>{{$term_deposit->account_no}}</td>
                                            <td>{{$term_deposit->date_of_invesment}}</td>
                                            <td>{{$term_deposit->invested_amt}}</td>
                                            <td>{{$term_deposit->date_of_maturity}}</td>
                                             <td><a href='{{url("gpf/termdeposit/$term_deposit->id")}}'><i class="ti-pencil-alt"></i></a></td>
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
