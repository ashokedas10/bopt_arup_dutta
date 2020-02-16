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
						<div class="card-header"><strong class="card-title">Upload Data</strong></div>
                            
                            <div class="card-body card-block">
                                <form action="#" method="post" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
                                    @if(Session::has('message'))										
										<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
									@endif	
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                    <div class="row form-group">
                                        
                                        <div class="col col-md-6">
											<label for="file-input" class=" form-control-label">Request (.csv) File to Upload <span>(*)</span></label>
										<input type="file" id="upload_csv" name="upload_csv" class="form-control-file">
										@if ($errors->has('upload_csv'))
										<div class="error" style="color:red;">{{ $errors->first('upload_csv') }}</div>
										@endif
										</div>
										<div class="col col-md-6 btn-up"><button type="submit" class="btn btn-danger btn-sm">Upload</button>
									   </div>
										
                                    </div>
							</form>
                        </div>
                        
                    </div>
                       
                    </div>

                    
                    
                </div>
                <!-- /Widgets -->
               
                
                
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
         @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection

