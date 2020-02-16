@extends('masters.layouts.master')

@section('title')
BOPT - Masters Module
@endsection

@section('sidebar')
    @include('masters.partials.sidebar')
@endsection

@section('header')
    @include('masters.partials.header')
@endsection



@section('scripts')
    @include('masters.partials.scripts')
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
                            <strong>Rate of Interest</strong>
                             
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('masters/gpf-rate-save') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <div class="row form-group">                                    
								    
                                    <div class="col-md-4">
                                        <label class="form-control-label">Rate of Interest<span>(*)</span></label>
                                        <input type="text" name="rate_of_interest" id="rate_of_interest" class="form-control" value="" required>
                                        @if ($errors->has('rate_of_interest'))
                                            <div class="error" style="color:red;">{{ $errors->first('rate_of_interest') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label class=" form-control-label">From Date<span>(*)</span></label>
                                         <input type="date" name="from_date" class="form-control" value="" required>
                                        @if ($errors->has('from_date'))
                                            <div class="error" style="color:red;">{{ $errors->first('from_date') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label class=" form-control-label">To Date<span>(*)</span></label>
                                         <input type="date" name="to_date" class="form-control" value="" required>
                                        @if ($errors->has('to_date'))
                                            <div class="error" style="color:red;">{{ $errors->first('to_date') }}</div>
                                        @endif
                                    </div>

                                </div> 
								
								<button type="submit" class="btn btn-danger btn-sm">Submit</button>
                               
								<p>(*) marked fields are mandatory</p>
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

@endsection





@section('scripts')
@include('masters.partials.scripts')

@endsection
