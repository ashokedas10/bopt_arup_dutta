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
                                <strong>Payroll Journal</strong>

                                @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                                @endif 
                            </div>
                            
                               <div class="card-body card-block">
                                   
                                        <div class="row form-group">
                                            <div class="col-md-3">
                                                <label>Select Posting Month</label>
                                                </div>
                                                <div class="col-md-7">
                                                <select class="form-control" name="month_year" id="month_year" onchange="getMonthYear();">
                                                    <option value="">Select Month</option>
                                                    @foreach($process_payroll as $payroll)
                                                    <option value="{{ $payroll->month_yr }}">{{ $payroll->month_yr }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                
                                            </div>
                                    
                                
                                </div>
                                </div>
                                <div class="card">
                                <div class="card-body card-block mainsection" style="display:none">
                              
                                <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="month_year" id="calculate_month_year" value="" />
                                <div class="lv-due" style="border:none;">
                 
                  <div class="row form-group lv-due-body itemslot">
                    <?php $tr_id=1; ?>
                    <div class="col-md-3">
                        <label class=" form-control-label">Account Head</span></label>
                        <select class="form-control" name="account_head_id[]" id="account_head_id<?php echo $tr_id; ?>" onchange="getSubhead(<?php echo $tr_id; ?>)">
                            <option>Select</option>
                            @foreach($accounthead as $head)
                           
                            <option value="<?php echo $head->account_code ?>"><?php echo $head->account_name ?></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-control-label">Sub Head</span></label>
                        <select class="form-control" name="sub_account_id[]" id="sub_account_id<?php echo $tr_id; ?>" onchange="getSubaccountDtl(<?php echo $tr_id; ?>);">
                        </select>
                    </div>
                    <div class="col-md-3">
                            <label>Transction Code</label>
                            <input type="text" name="transaction_code[]" class="form-control" id="transaction_code<?php echo $tr_id; ?>" readonly>
                    </div>  
                    <div class="col-md-3">
                            <label>Type</label>
                            <input type="text" name="account_tool[]" class="form-control" id="account_tool<?php echo $tr_id; ?>" readonly>
                    </div>                                  
                    <div class="col-md-3">
                        <label>Bank Name</label>
                        <select class="form-control" name="payment_bank_id[]" onchange="populateBranch(<?php echo $tr_id; ?>)" id="payment_bank_id<?php echo $tr_id; ?>">
                            <option>Select Bank</option>
                            @foreach($banklist as $bank)
                                    <option value="<?php echo $bank->master_bank_name; ?>" >
                                    <?php echo $bank->master_bank_name; ?></option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-3">
                        <label>Branch <span>(*)</span></label>
                        <select class="form-control" name="bank_branch_id[]" id="bank_branch_id<?php echo $tr_id; ?>" required>
                            
                        </select>   
                    </div>

                    <div class="col-md-3">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="payable_amount[]" id="payable_amount<?php echo $tr_id; ?>" readonly>
                    </div>


                    <div class="col-md-3 btn-up">
                        <button type="button" class="btn btn-danger btn-add" id="add<?php echo $tr_id; ?>" onClick="addnewrow(<?php echo $tr_id; ?>)" data-id="<?php echo $tr_id; ?>"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>

                        <button type="button" class="btn btn-danger " id="del" style="background: #d00404; border-color: #d00404;" onClick="delRow(<?php echo $tr_id; ?>)" disabled> <i class="fa fa-remove" aria-hidden="true">Remove</i></button>
                    </div>
                    

                </div>
                <div class="addrow"></div>
                </div>

                <button type="submit" class="btn btn-danger btn-sm">Save</button>
                                
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


<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>      
<script>

    function getMonthYear(){

        var month_year = $("#month_year option:selected").val();
        
        if(month_year!=''){
            $(".mainsection").show();
            $("#calculate_month_year").val(month_year);
        }else{

           $(".mainsection").hide(); 
        }
        
        
    }

    function addnewrow(rowid)
    {
        if (rowid != ''){
                $('#add'+rowid).attr('disabled',true);
        }

        $.ajax({

            url:'{{url('payroll/accounting/get-add-row')}}/'+rowid,
            type: "GET",

            success: function(response) {

                $(".addrow").append(response);

            }
        });
    }

    function delRow(rowid)
    {
        $(document).on('click','.deleteButton',function() {
        $(this).closest("div.itemslot").remove();
        });
    }

    function getSubhead(rowid){
   
        var account_head_name = $('#account_head_id'+rowid+' option:selected').text();
        
        $.ajax({
            type:'GET',
            url:'{{url('accountpayable/assetslist')}}/'+account_head_name,                
            success: function(response){
                
                if(response){
                    var option = '<option value="">Select Sub Account</option>';
                    for (var i=0;i<response.length;i++){
                        option += '<option value="'+ response[i].id + '">' + response[i].head_name + '</option>';
                    }
                $('#sub_account_id'+rowid).html(option);
                }                     
            }
        });
    }


    function getSubaccountDtl(rowid){
        var selectedsub_account_head = $('#sub_account_id'+rowid+' option:selected').val();
        
        $.ajax({
            type:'GET',
            url:'{{url('accountpayable/subaccount_dtl')}}/'+selectedsub_account_head,                
            success: function(response){
                
                var obj = JSON.parse(response);
                $('#account_tool'+rowid).val(obj.account_tool);
                $('#transaction_code'+rowid).val(obj.coa_code);   
                var month_year = $("#month_year option:selected").val();
                var monthyear =  btoa(month_year);
                
                $.ajax({
                    type:'GET',
                    url:'{{url('monthly/payroll')}}/'+monthyear,
                                 
                    success: function(result){

                        var result = JSON.parse(result);
                        var selectedsub_account_name = $('#sub_account_id'+rowid+' option:selected').text();
                        //alert(selectedsub_account_name);
                            var amount=0;

                            if(selectedsub_account_name=='Basic Pay'){
                                for(var i=0;i<result.length;i++){   
                                    var amount = amount+Number(result[i].emp_basic_pay);    
                                } 
                            }


                            if(selectedsub_account_name=='Dearness Allowance'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_da);    
                                } 
                            }

                            if(selectedsub_account_name=='Transport Allowance'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_transport_allowance);    
                                } 
                            }

                            if(selectedsub_account_name=='Employers Contribution to Pro'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_gpf);    
                                } 
                            }

                            if(selectedsub_account_name=='Cash Handling Allowance'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_cash_handle);    
                                } 
                            }

                            if(selectedsub_account_name=='House Rent Allowance'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_hra);    
                                } 
                            }

                            /*if(selectedsub_account_name=='House Rent Allowance'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_cea);    
                                } 
                            }*/

                            if(selectedsub_account_name=='Others'){
                                for(var i=0;i<result.length;i++){  
                                    var amount = amount+Number(result[i].emp_total_deduction);    
                                } 
                            }
                        
                        

                        setTimeout(function(){
                            $('#payable_amount'+rowid).val(amount);
                        },1000);
                                                   
                    }
                });
            }
        });
    }



    function populateBranch(rowid){

        var bank_name = $('#payment_bank_id'+rowid+' option:selected').val();
        
        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank')}}/'+bank_name,             
            success: function(response){
                console.log(response);
                obj=JSON.parse(response);
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }

                $('#bank_branch_id'+rowid).html(option);            
            }
        });
    }



</script>        
         @endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection

