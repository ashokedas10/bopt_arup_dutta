@extends('layouts.master')

@section('title')
Payroll Accounting
@endsection

@section('sidebar')
    @include('payrollaccounting.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('scripts')
    @include('payrollaccounting.scripts')
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
                            <strong>Payment Entry</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('payroll/payment') }}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label>Select Voucher No.</label>
                                    <select name="voucher_no" class="form-control" id="voucher_no" onchange="getVoucherDtl()">
                                        <option value="">Select Voucher </option>
                                        @foreach($voucherlist as $voucher)
                                            <option value="{{ $voucher->voucher_no }}">{{ $voucher->voucher_no }}</option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>   
                            
                           <div id="data-render">
                           </div>

                            <button type="submit" class="btn btn-danger btn-sm">Submit </button>
								
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
<script>

    function getVoucherDtl(){
        var voucher_no = $("#voucher_no option:selected").val();
       
        $.ajax({
            type:'GET',
            url:'{{url('payroll/accoutpayable/voucherlist')}}/'+voucher_no,                
            success: function(response){

                    var obj = JSON.parse(response);
                    //console.log(obj);              
                    $("#data-render").html(response); 
            }
        });
    }  
   
</script>
   

@endsection


@section('scripts')
    @include('partials.scripts')    
    
@endsection
