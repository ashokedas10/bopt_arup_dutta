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
                            <strong><?php if(empty($ledger_details->id)){ ?>Add <?php } ?>General Ledger</strong>
                             
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('masters/ledger') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="<?php if(!empty($ledger_details->id)){ echo $ledger_details->id; }  ?>">

                                <div class="row form-group">                                    
									<div class="col-md-3">
                                        <label class=" form-control-label">Account Grp <span>(*)</span></label>
                                          <select name="asset_grp" class="form-control" onchange="getAccgrp()" id="asset_grp" <?php if(!empty($ledger_details->id)){ echo "readonly"; } ?> required> 
                                            <option value="">Select Account</option>
                                            <option value="Assets"<?php if(!empty($ledger_details->asset_grp)){ if("Assets"== $ledger_details->asset_grp){echo "selected"; } } ?>>Assets</option>
                                            <option value="Liabilities" <?php if(!empty($ledger_details->asset_grp)){ if($ledger_details->asset_grp=="Liabilities"){echo "selected"; } } ?>>Liabilities</option>
                                            <option value="Expenses" <?php if(!empty($ledger_details->asset_grp)){ if($ledger_details->asset_grp=="Expenses"){echo "selected"; } } ?>>Expenses</option>
                                            <option value="Income" <?php if(!empty($ledger_details->asset_grp)){ if($ledger_details->asset_grp=="Income"){echo "selected"; } } ?>>Income</option>
                                          </select>
										@if ($errors->has('asset_grp'))
											<div class="error" style="color:red;">{{ $errors->first('asset_grp') }}</div>
										@endif
                                    </div>


                                    <div class="col-md-3">
                                        <span id="min_range"></span><span id="seperator" style="display:none">-</span><span id="max_range"></span>
                                        <label class="form-control-label">General Ladger Code <span>(*)</span></label>
                                        <input type="text" name="gl_code" id="gl_code" class="form-control" value="<?php if(!empty($ledger_details->gl_code)){ echo $ledger_details->gl_code; }  ?>">
                                        @if ($errors->has('gl_code'))
                                            <div class="error" style="color:red;">{{ $errors->first('gl_code') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">General Ladger Name<span>(*)</span></label>
                                         <input type="text" name="gl_name" class="form-control" value="<?php if(!empty($ledger_details->gl_name)){ echo $ledger_details->gl_name; }  ?>" required>
                                        @if ($errors->has('gl_name'))
                                            <div class="error" style="color:red;">{{ $errors->first('gl_name') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">General Ledger Type <span>(*)</span></label>
                                          <select name="gl_type" class="form-control" required> 
                                            <option value="">Select Account</option>
                                            <option value="Debit"<?php if(!empty($ledger_details->gl_type)){ if($ledger_details->gl_type=='Debit'){echo "selected"; } } ?>>Debit</option>
                                            <option value="Credit" <?php if(!empty($ledger_details->gl_type)){ if($ledger_details->gl_type=='Credit'){echo "selected"; } } ?>>Credit</option>
                                          </select>
                                        @if ($errors->has('gl_type'))
                                            <div class="error" style="color:red;">{{ $errors->first('gl_type') }}</div>
                                        @endif
                                    </div>
                                </div> 
								   
								<div class="row form-group">
									<div class="col-md-6">
                                        <label class="form-control-label">Description</label>
                                         <textarea rows="5" name='gl_description' class="form-control"><?php if(!empty($ledger_details->gl_description)){ echo $ledger_details->gl_description; }  ?></textarea>
										@if ($errors->has('gl_description'))
											<div class="error" style="color:red;">{{ $errors->first('gl_description') }}</div>
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
       
    </div>
    <!-- /#right-panel -->
<script>
    function getAccgrp()
    {           
       var asset_grp = $("#asset_grp option:selected").val();
        //alert(asset_grp);
        $.ajax({
            type:'GET',
            url:'{{url('masters/coarange')}}/'+asset_grp,             
            success: function(response){

                //console.log(response);
                if(response != 'null'){
                var obj=JSON.parse(response);
                $( "#min_range" ).append( obj.coa_min_number );
                $( "#seperator" ).show();
                $( "#max_range" ).append( obj.coa_max_number );
                }
                
            }
        });
    }
</script>   
@endsection


@section('scripts')
@include('masters.partials.scripts')



@endsection

