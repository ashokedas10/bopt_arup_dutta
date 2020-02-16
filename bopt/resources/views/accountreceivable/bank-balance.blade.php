@extends('masters.layouts.master')

@section('title')
    BOPT - Receive Voucher Booking
@endsection

@section('sidebar')
    @include('accountreceivable.partials.sidebar')
@endsection

@section('header')
    @include('accountreceivable.partials.header')
@endsection

@section('scripts')
    @include('accountreceivable.partials.scripts')
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
                            <strong>Add Balance</strong>
                            </div>
                            @if(Session::has('message'))
                            <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif
                            <div class="card-body card-block">
                            <form action="{{ url('accountreceivable/balsave') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row form-group">
                                <div class="col-md-6">
                                    <select class="form-control" name="month_yr" id="month_yr" required>
                                        <option value="">Please Select Group Code  </option>
                                        @foreach ($banklist as $val)
                                        <option <?php if(isset($month_yr) && ($val==$month_yr)) { echo 'selected';} ?> value="@php echo $val;@endphp">@php echo $val;@endphp
                                        </option>
                                        @endforeach

                                        <!--
                                        -->
                                    </select>
                                </div>
                            </div>
					               <button type="submit" class="btn btn-danger btn-sm" id="getvoucher">Submit</button>

                            </form>





                            </div>

                            <div class="card-body card-block">
							<div class="payroll-table table-responsive" style="width:1020px;margin:0 auto;overflow-x:scroll;">
                             <form action="{{url('accountreceivable/save-payroll-all')}}" method="post">
                                                                {{csrf_field()}}
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
					        <thead style="text-align:center;vertical-align:middle;">
					          <tr>
					            <th rowspan="2">Sl. No.</th>
                                            <th rowspan="2">Month</th>
                                            <th rowspan="2">Group Code</th>
                                            <th rowspan="2">Transaction  Code</th>

                                            <th rowspan="2">Opening Balance</th>
                                            <th rowspan="2">Cr Amount</th>
                                            <th rowspan="2">Dr Amount</th>
											<th rowspan="2">Closing Balance</th>


					        	</tr>

					        </thead>

                            <tbody>

                                <?php
if(isset($result)){
    print_r($result);
}
                               ?>
					        </tbody>

					          <tfoot>
					            <tr>
					              <td colspan="32" style="border:none;">

							<button type="submit" class="btn btn-danger btn-sm">Save</button>
					                <button type="reset" class="btn btn-danger btn-sm"> Reset</button>
					              </td>
					            </tr>
						 </tfoot>


					      </table>
                          </form>
							</div>
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




@endsection

@section('scripts')
    @include('attendance.partials.scripts')

@endsection
