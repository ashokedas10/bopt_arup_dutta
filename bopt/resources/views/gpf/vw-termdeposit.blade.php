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
                            <strong>Add Term Deposit</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('gpf/termdeposit') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Bank Name</label>
                                        <input type="text" name="bank_name" class="form-control" value="" required />
                                        @if ($errors->has('bank_name'))
                                            <div class="error" style="color:red;">{{ $errors->first('bank_name') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">Account No.<span></span></label>
                                        <input type="text" name="account_no" class="form-control" value="" required />
                                        @if ($errors->has('account_no'))
                                            <div class="error" style="color:red;">{{ $errors->first('account_no') }}</div>
                                        @endif
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-control-label">Date Of Invesment</label>
                                        <input type="date" name="date_of_invesment" class="form-control" value="" required />
                                        @if ($errors->has('date_of_invesment'))
                                            <div class="error" style="color:red;">{{ $errors->first('date_of_invesment') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="form-control-label">Invesment Amount</label>
                                        <input type="text" name="invested_amt" class="form-control" value="" required />
                                         
                                        @if ($errors->has('invested_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('invested_amt') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Rate Of Interest</label>
                                        <input type="text" name="rate_of_interest" class="form-control" value="" required />
                                        @if ($errors->has('rate_of_interest'))
                                            <div class="error" style="color:red;">{{ $errors->first('rate_of_interest') }}</div>
                                        @endif
                                    </div>
                                     <div class="col-md-3">
                                        <label class="form-control-label">Date Of Maturity</label>
                                        <input type="date" name="date_of_maturity" class="form-control" value="" required />
                                        @if ($errors->has('date_of_maturity'))
                                            <div class="error" style="color:red;">{{ $errors->first('date_of_maturity') }}</div>
                                        @endif
                                    </div>

                                     <div class="col-md-3">
                                        <label class="form-control-label">Maturity Value</label>
                                        <input type="text" name="maturity_value" class="form-control" value="" required />
                                        @if ($errors->has('maturity_value'))
                                            <div class="error" style="color:red;">{{ $errors->first('maturity_value') }}</div>
                                        @endif
                                    </div>

                                     <div class="col-md-3">
                                        <label class="form-control-label">Maturity Value Actually Received</label>
                                        <input type="text" name="actual_maturity" class="form-control" value="" required />
                                        @if ($errors->has('actual_maturity'))
                                            <div class="error" style="color:red;">{{ $errors->first('actual_maturity') }}</div>
                                        @endif
                                    </div>
                                </div>    


                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Period</label>
                                        <input type="text" name="term_period" class="form-control" value="" required />
                                        @if ($errors->has('term_period'))
                                            <div class="error" style="color:red;">{{ $errors->first('term_period') }}</div>
                                        @endif
                                    </div>
                                     <div class="col-md-3">
                                        <label class="form-control-label">Renewed and Reinvested Value</label>
                                        <input type="text" name="reinvested_value" class="form-control" value="" required />
                                        @if ($errors->has('reinvested_value'))
                                            <div class="error" style="color:red;">{{ $errors->first('reinvested_value') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">TDS Amount</label>
                                        <input type="text" name="tds_amt" class="form-control" value="" required />
                                        @if ($errors->has('tds_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('tds_amt') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-control-label">Remarks</label>
                                       <select name="deposit_status" class="form-control" required>
                                             <option value="" disabled>Select</option>
                                            <option value="Open">Open</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                        @if ($errors->has('deposit_status'))
                                            <div class="error" style="color:red;">{{ $errors->first('deposit_status') }}</div>
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
