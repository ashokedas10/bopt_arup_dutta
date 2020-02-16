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
                                                <strong class="card-title">Religion Master</strong>
                                        </div>

                                        @if(Session::has('message'))										
                                                        <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                                        @endif	
								
                                <div class="aply-lv">
                                <a href="{{ url('masters/add-new-religion') }}" class="btn btn-default">Add Religion Master <i class="fa fa-plus"></i></a>
                                </div>
                                <br/>
                                 <div class="clear-fix">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Religion Name</th>
                                            <th>Action</th>
                                       </tr>
                                           
                                    </thead>
                                    
                                    <tbody>
                                            @foreach($Religions as $rel)
                                             <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$rel->religion_name}}</td>
                                           <td><a href="{{url('masters/add-new-religion')}}?id={{$rel->id}}"><i class="ti-pencil-alt"></i></a>

						<!--<a href="{{url('masters/vw-religion')}}?del={{$rel->id}}" onclick="return confirm('Are you sure you want to delete this department?');"><i class="ti-trash"></i>
                        </a>-->

					      </td>    
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


