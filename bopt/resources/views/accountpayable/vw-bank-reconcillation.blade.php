@extends('masters.layouts.master')

@section('title')
BOPT - Payment Booking
@endsection

@section('sidebar')
    @include('accountpayable.sidebar')
@endsection

@section('header')
    @include('masters.partials.header')
@endsection

@section('scripts')
    @include('accountpayable.scripts')
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
                                <strong>Bank Reconciliation</strong>
                            </div>

                            @if(Session::has('message'))                                        
                                <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                            @endif  
							
							   <div class="card-body card-block">
                                 <form action="{{url('bank-reconcillation')}}" method="post" style="background: #f3f3f3;" id="showbankdata">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="row form-group">
											<div class="col-md-3">
												<label>Bank Name</label>
                                                <select name="bank_id" id="bank_id" class="form-control" required onchange="populateBranch()">
                                                    <option value=""> Select </option>
                                                    <?php foreach($banklist as $bank){ ?>
                                                    <option value="<?php echo $bank->master_bank_name; ?>"><?php echo $bank->master_bank_name; ?></option>
                                                    <?php } ?>
                                                </select>
											</div>

                                            <div class="col-md-3">
                                                <label>Branch <span>(*)</span></label>
                                                <select class="form-control" name="bank_branch_id" id="bank_branch_id" required>
                                                    
                                                </select>   
                                            </div>

											<div class="col-md-3">
                                                <label>From Date</label>
                                                 <input type="date"  name="from_date" class="form-control" value="" />
                                            </div>

                                            <div class="col-md-3">
                                                <label>To Date</label>
                                                 <input type="date"  name="to_date" class="form-control" value="" />
                                            </div>
                                            
											<div class="col-md-3 btn-up">
                                                 <button type="button" class="btn btn-default" style="background: #0884af;color: #fff;" id="bankdata">Show</button>
                                                <!--<button type="submit" class="btn btn-default" style="background: #0884af;color: #fff;	">Show</button>-->
                                            </div>
										</div>
									
								</form>
								</div>
								</div>
								<div class="card">
						
							<div class="card-header">
                                <strong>Bank Reconciliation</strong>
                            </div>								
							<!--<div class="aply-lv">
								<a href="add-new-branch.php" class="btn btn-default">Add New Branch <i class="fa fa-plus"></i></a>
							</div>-->
								<br/>
								 <div class="clear-fix">

                               <form action="{{url('bank-reconcillation/updatedata')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                                <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="width:1025px;overflow-x:scroll;">
                                    <thead>
                                        <tr>
											<th>Transaction Date</th>
                                            <th>Particulars</th>
                                            <th>Voucher Type</th>
											<th>Debit Amount</th>
											<th>Credit Amount</th>
                                            <th>Clearnce Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datarender">
                                        
                                    </tbody>
                                </table>

                                    <button type="submit" class="btn btn-default" style="background: #0884af;color: #fff;   ">Show</button>

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
	
    function populateBranch(){

        var bank_name = $("#bank_id option:selected" ).val();
        
        $.ajax({
            type:'GET',
            url:'{{url('company/get-company-bank')}}/'+bank_name,             
            success: function(response){

                obj=JSON.parse(response)
                var option = '<option value="" label="Select">Select Branch</option>';
                for (var i=0;i<obj.length;i++){
                   option += '<option value="'+ obj[i].id + '">' + obj[i].branch_name + '</option>';
                }
                
                $('#bank_branch_id').html(option);              
            }
        });
    }



    $("#bankdata").click(function () {

        $.ajax({
            type: "POST",
            url: '{{ url('bank-reconcillation') }}',
            data: $("#showbankdata").serialize(),
            datatype: 'JSON',
            success: function(responce)
            {

                $('#datarender').html(responce);
            }
        });
        
    });





</script>

@endsection

@section('scripts')
@include('attendance.partials.scripts')

@endsection


