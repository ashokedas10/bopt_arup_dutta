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
                            <strong>Add GPF Loan</strong>
                            </div>
                            <div class="card-body card-block">
                            <form action="{{ url('gpf/apply') }}" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="loan_id" value="{{$gpf_loan_dtl->id}}">
                                <input type="hidden" name="emp_code" value="{{$gpf_loan_dtl->employee_code}}">
                                <div class="row form-group">
                                    <div class="col-md-12 brdr-btm" style="border-bottom: 1px solid #8c8888;">
                                    <label class="form-control-label">{{$emp_dtl->emp_fname}} {{$emp_dtl->emp_mname}} {{$emp_dtl->emp_lname}}</label>
                                    </div>
                                </div>    

                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="form-control-label">Loan No</label>
                                        <input type="text" name="loan_no" class="form-control" value="{{$gpf_loan_dtl->loan_applied_no}}" id="loan_no" readonly />
                                    </div>
                                   
                                    <div class="col-md-3">
                                        <label class="form-control-label">Apply Amount<span>(*)</span></label>
                                        <input type="text" name="apply_amt" class="form-control" value="{{$gpf_loan_dtl->loan_amount}}" id="apply_amt" readonly />
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-control-label">Gpf Amount</label>
                                        <input type="text" name="gpf_amt" class="form-control" value="{{$gpf_details[0]->total_closing_balance}}" id="gpf_amt" readonly />
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class=" form-control-label">Bank List <span>(*)</span></label>
                                          <select name="bank_id" id="bank_id" class="form-control" onchange="fromPopulateBranch()" required>
                                            <option value="">Select Bank name</option>
                                            @foreach($banklist as $bank)
                                            <option value="<?php echo $bank->bank_name; ?>" >
                                            <?php echo $bank->bank_name; ?></option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('bank_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('bank_id') }}</div>
                                        @endif
                                    </div>

                                </div>
                                
                                <div class="row form-group">

                                    <input type="hidden" class="form-control" name="bank_branch_id" id="bank_branch_id" value="<?php echo $bank->id; ?>" readonly />
                                        
                                

                                     <div class="col-md-2">
                                        <label class="form-control-label">TDS Calculate</span></label><br>
                                        <label class="radio-inline">
                                          <input type="radio" value="no" name="optradio" checked>No
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" value="yes" name="optradio">Yes
                                        </label>
                                    </div>   

                                    <div class="col-md-3">
                                        <label class=" form-control-label">TDS List</label>
                                          <select name="tds_id" id="tds_id" class="form-control" onchange="getRate()" disabled> 
                                            <option value="">Select TDS Rate</option>
                                            @foreach($tdslist as $tds)
                                            <option value="<?php echo $tds->id; ?>" data-rate="<?php echo $tds->tds_percentage; ?>"   
                                            ><?php echo $tds->tds_section; ?>(<?php echo $tds->tds_percentage ?>)</option>
                                            @endforeach
                                          </select>
                                        @if ($errors->has('tds_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('tds_id') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-1">
                                        <label class=" form-control-label">Percentage</label>
                                        <input type="text" class="form-control" name="tds_percentage" id="tds_percentage" value="" readonly /> 
                                    </div>


                                     <div class="col-md-3">
                                        <label class=" form-control-label">Deduction Amount<span>(*)</span></label>
                                         <input type="text" name="deduction_amt" class="form-control" value="0" id="deduction_amt" readonly />
                                        @if ($errors->has('deduction_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('deduction_amt') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label class=" form-control-label">Scanction Amount<span>(*)</span></label>
                                         <input type="text" name="scanction_amt" class="form-control" value="{{$gpf_loan_dtl->loan_amount}}" id="scanction_amt" readonly />
                                        @if ($errors->has('scanction_amt'))
                                            <div class="error" style="color:red;">{{ $errors->first('scanction_amt') }}</div>
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


<script>


    $('input:radio').change(function(){
        
        var getvalue = this.value;

        if(getvalue =='no'){

            $('#tds_id').attr('disabled',true);
            $('#deduction_amt').val(0);
            $('#tds_percentage').val(0);
            $('#tds_id').val('');
            
           
              
        }else{

            $('#tds_id').attr('disabled',false); 
        } 
    }); 

    function getRate(){
        var tds_id= $('#tds_id').val();
        var rate = $('select#tds_id').find(':selected').data('rate');
        $('#tds_percentage').val(rate);
        var amount= $('#apply_amt').val();
        var deduction= Math.round(amount*rate/100);
        $('#deduction_amt').val(deduction);
        var scanction_amt=(parseInt(amount) - parseInt(deduction));
        $('#scanction_amt').val(scanction_amt);
        
    }


    </script>


@endsection


@section('scripts')
    @include('partials.scripts')

@endsection
