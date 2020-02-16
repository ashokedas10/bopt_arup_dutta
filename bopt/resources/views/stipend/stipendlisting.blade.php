@extends('layouts.master')

@section('title')
Stipend System-Company
@endsection

@section('sidebar')
    @include('stipend.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('scripts')
    @include('stipend.scripts')
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
							<strong class="card-title">Stipend Listing</strong>
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
                                            <th>Account Name</th>
                                            <th>Transaction Code</th>
                                            <th>Bill No.</th>
                                            <th>Establishment Name</th>
                                            <th>Amount for Graduate</th>
                                            <th>Amount for Diploma</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									 @foreach($stipend_datas as $stipend_data)
                                        <tr>
                                        	<td>{{$loop->iteration}}</td>
											<td>{{$stipend_data->account_name}}</td>
                                            <td>{{$stipend_data->transaction_id}}</td>
                                            <td>{{$stipend_data->bill_no}}</td>
                                            <td>{{$stipend_data->establishment_name}}</td>
                                            <td>{{$stipend_data->graduate}}</td>
                                            <td>
                                                {{-- <a href='{{url("approve/view/$paylist->id")}}'><i class="ti-pencil-alt"></i></a> --}}
                                                {{ $stipend_data->diploma }}
                                            </td>
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



<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script>

    $(function() {



    });
</script>

        @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
