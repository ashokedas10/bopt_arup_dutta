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
							<strong class="card-title">Approve Listing</strong>
                             @if(Session::has('message'))
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif
						</div>

							<div class="card-body">

							</div>

							<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>Sl. No.</th>
                                            <th>Voucher No</th>

                                            <th>Vouchaer Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($voucher)!='0')
									 @foreach($payablelisting as $paylist)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
											<td>{{$paylist->voucher_no}}</td>

                                            <td>{{$paylist->bill_booking_date}}</td>

                                            <td>
                                                <a href='{{url("approve/view/$paylist->voucher_no")}}'><i class="ti-pencil-alt"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
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



<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script>

    $(function() {



    });
</script>

        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
