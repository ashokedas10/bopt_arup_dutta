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
                            <strong>Add GPF Payment</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('gpf/payment') }}" method="post" enctype="multipart/form-data" id="payablebooking">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Interest Receive From TDR</label>
                                        <input type="text" name="inest_rcv_tdr" class="form-control" value="" required />
                                        @if ($errors->has('inest_rcv_tdr'))
                                            <div class="error" style="color:red;">{{ $errors->first('inest_rcv_tdr') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">Invesment Encashed<span></span></label>
                                        <input type="text" name="invt_encash" class="form-control" value="" required />
                                        @if ($errors->has('invt_encash'))
                                            <div class="error" style="color:red;">{{ $errors->first('invt_encash') }}</div>
                                        @endif
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-control-label">Interest Receive</label>
                                        <input type="text" name="inst_recv" class="form-control" value="" required />
                                        @if ($errors->has('inst_recv'))
                                            <div class="error" style="color:red;">{{ $errors->first('inst_recv') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="form-control-label">TDS on Interest</label>
                                        <input type="text" name="tds_inest" class="form-control" value="" required />
                                         
                                        @if ($errors->has('tds_inest'))
                                            <div class="error" style="color:red;">{{ $errors->first('tds_inest') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Invesment during the Year</label>
                                        <input type="text" name="invt_year" class="form-control" value="" required />
                                        @if ($errors->has('invt_year'))
                                            <div class="error" style="color:red;">{{ $errors->first('invt_year') }}</div>
                                        @endif
                                    </div>
                                </div>    


                                
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>

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

@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
