@extends('dak.layouts.master')

@section('title')
Dak Module
@endsection

@section('sidebar')
	@include('dak.partials.sidebar')
@endsection

@section('header')
	@include('dak.partials.header')
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
									<strong class="card-title">Dak history search</strong>
								</div>
								<!-- <div class="aply-lv">
								<a href="company-master.php" class="btn btn-default">Add New Company Master <i class="fa fa-plus"></i></a>
							</div> -->
								<br/>
								 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="width:1180px;overflow-x: scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Diary No.</th>
                                            <th>Forwarding No.</th>
                                            <th>Final No.</th>
                                            <th>Reciept Type</th>
                                            <th>Sender's Name</th>
                                            <th>DAK Recieved Date</th>
                                            <th>DAK Status</th>
                                            <th>Forwarded to</th>
                                            <th>Forwarded Date</th>
                                            <th>Closing Date</th>
                                            <th>Closing Remarks(if any)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dak_details as $dak_detail)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dak_detail->dairy_no }}</td>
                                                <td>{{ $dak_detail->dak_forward_no }}</td>
                                                <td>{{ $dak_detail->finaldakno }}</td>
                                                <td>{{ $dak_detail->receipt_type }}</td>
                                                <td>{{ $dak_detail->sender_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($dak_detail->diary_date)->format('d/m/Y') }}</td>
                                                <td>{{ ucFirst($dak_detail->doc_status) }}</td>
                                                <td>{{ $dak_detail->emp_fname }} {{ $dak_detail->emp_mname }} {{ $dak_detail->emp_lname }}</td>
                                                @if($dak_detail->forwarddate)
                                                <td>{{ \Carbon\Carbon::parse($dak_detail->forwarddate)->format('d/m/Y') }}</td>
                                                @else
                                                <td>-</td>
                                                @endif
                                                @if($dak_detail->closing_date)
                                                <td>{{ \Carbon\Carbon::parse($dak_detail->closing_date)->format('d/m/Y') }}</td>
                                                @else
                                                <td>-</td>
                                                @endif
                                                <td>{{ $dak_detail->closing_remarks }}</td>
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
       <?php //include("footer.php"); ?>
    </div>
    <!-- /#right-panel -->

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection
