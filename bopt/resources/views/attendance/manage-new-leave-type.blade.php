
@extends('attendance.layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('leavemanagement.sidebar')
@endsection

@section('header')
	@include('attendance.partials.header')
@endsection

@section('scripts')
	@include('attendance.partials.scripts')
@endsection

@section('content')

 <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                  
                    <div class="main-card" style="width:900px;margin:0 auto;">
                        <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Manage New Leave Type</strong>
                        </div>
                           
                            <div class="card-body card-block">
                                <form action="{{url('leave-management/new-leave-type')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                    @csrf
                                  
                                    <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Leave Type <span>(*)</span></label>
                                        <input type="text" name='leave_type_name' class="form-control" id="leave-type" value="{{ old('leave_type_name') }}">
                                         @if($errors->has('leave_type_name'))
                                            <div class="error" style="color:red;">{{$errors->first('leave_type_name')}}</div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                    <label>Alias <span>(*)</span></label>
                                <input type="text" name='alies' class="form-control" id="alias" value="{{ old('alies') }}">
                                 @if($errors->has('alies'))
                                            <div class="error" style="color:red;">{{ $errors->first('alies') }}</div>
                                 @endif
                                </div>
                                
                                    
                                   
                            </div>
                            <div class="row form-group">
                            <div class="col-md-12">
                                <label>Remarks</label>
                                <textarea rows="3" name='remarks' class="form-control" id="remarks"></textarea>
                               
                                </div>
                            </div>
                            
                            
                           
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                                <p>(*) marked fields are mandatory</p>
                            
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
        <!-- /.content -->

@endsection
