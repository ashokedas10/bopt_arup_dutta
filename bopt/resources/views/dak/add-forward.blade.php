@extends('dak.layouts.master')

@section('title')
Dak Module
@endsection

@section('sidebar')
  @include('dak.partials.sidebar')
@endsection

@section('header')
  @include('dak.partials.header')
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
							<?php
                          // print_r($department_details); exit;
							 if(!empty($receipt_det->id)){ ?>
                              <strong class="card-title">Save Forward</strong></div>
                            <?php }else{ ?>
                             <strong class="card-title">Add New Forward</strong></div>
                            <?php } ?>
                            <div class="card-body card-block">

	                    @if ($errors->any())
	                   <div class="alert alert-danger">
	                   <ul>
	                    @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                    @endforeach
	                    </ul>
	                   </div><br />
	                   @endif           

                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif  
<form role="form" method="post" action="{{ url('dak/addforward') }}" enctype="multipart/form-data">
               
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
              <div class="row form-group">
                <div class="col-md-3">
                    <label for="text-input" class="form-control-label">Select Receipts</label>
                    <input type="hidden" name="forward_id" value="<?php if(!empty($forward_detail->forward_id)){ echo $forward_detail->forward_id; } ?>" />
                    <select class="form-control" name="dak_receipt_detail_id" id="dak_receipt_detail_id" <?php if(!empty($forward_detail->id)){ ?> disabled <?php } ?>  onchange="populateData()" >
                    <option>Select Dak</option>
                    <?php foreach($receipt_details_code as $receipt){ ?>
                      <option  value="<?php echo $receipt->id; ?>" <?php if(!empty($forward_detail->id)){ if($receipt->id == $forward_detail->id) { echo "selected"; } } ?>><?php echo $receipt->dairy_no; ?></option>
                    <?php } ?> 
                    </select>
                  </div>
              </div>  

                <div class="row form-group">
                  <div class="col-md-3">
                    <label for="text-input" class="form-control-label">Diary Year</label>
                    
                    <select class="form-control" name="d_year" disabled="true" id="d_year">
                    <option>Select Year</option>
                      <option  value="2023" <?php if(!empty($forward_detail->diary_year)){ if("2023"== $forward_detail->diary_year) { echo "selected"; } } ?>>2023</option>
                      <option  value="2022" <?php if(!empty($forward_detail->diary_year)){ if("2022"== $forward_detail->diary_year) { echo "selected"; } } ?> >2022</option>
                      <option  value="2021" <?php if(!empty($forward_detail->diary_year)){ if("2021"== $forward_detail->diary_year) { echo "selected"; } } ?> >2021</option>
                      <option  value="2020" <?php if(!empty($forward_detail->diary_year)){ if("2020"== $forward_detail->diary_year ) { echo "selected"; } } ?> >2020</option>
                      <option  value="2019" <?php if(!empty($forward_detail->diary_year)){ if("2019"== $forward_detail->diary_year) { echo "selected"; } } ?> >2019</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                  
                    <label for="email-input" class="form-control-label">Diary Date</label>
                    <input type="date" class="form-control" value="<?php if(!empty($forward_detail->diary_date)){ echo date('Y-m-d', strtotime($forward_detail->diary_date)); } ?>" name="d_date" readonly  id="d_date">
                    
                  </div>
                  <div class="col-md-3">
                    <label for="email-input" class=" form-control-label">Receipt Type</label>
                  <select class="form-control" name="receipt_type" disabled="true" id="receipt_type" >
        						<option>Select</option>
                      <option value="Letter" <?php if(!empty($forward_detail->receipt_type)){ if("Letter"==$forward_detail->receipt_type) { echo "selected"; } } ?>>Letter</option>
                      <option value="Bill" <?php if(!empty($forward_detail->receipt_type)){ if("Bill"== $forward_detail->receipt_type){ echo "selected"; } }?>>Bill</option>
                      <option value="Proficiancy certificate" <?php if(!empty($forward_detail->receipt_type)){ if("Proficiancy certificate"== $forward_detail->receipt_type) { echo "selected"; } } ?>>Proficiancy certificate</option>
                      <option value="Noting" <?php if(!empty($forward_detail->receipt_type)){ if("Noting"== $forward_detail->receipt_type) { echo "selected"; } } ?>>Noting</option>
                      <option value="Envelop" <?php if(!empty($forward_detail->receipt_type)){ if("Envelop"== $forward_detail->receipt_type) { echo "selected"; } } ?>>Envelop</option>
                      <option value="Others" <?php if(!empty($forward_detail->receipt_type)){ if("Others"== $forward_detail->receipt_type){ echo "selected"; } }?>>Others</option>
                      <option value="Ministry Communication" <?php if(!empty($forward_detail->receipt_type)){ if("Ministry Communication"== $forward_detail->receipt_type){ echo "selected"; } }?>>Ministry Communication</option>
                      <option value="Bill(Stipend)" <?php if(!empty($forward_detail->receipt_type)){ if("Bill(Stipend)"== $forward_detail->receipt_type){ echo "selected"; } }?>>Bill(Stipend)</option>
                      <option value="Bill(Establishment)" <?php if(!empty($forward_detail->receipt_type)){ if("Bill(Establishment)"== $forward_detail->receipt_type){ echo "selected"; } }?>>Bill(Establishment)</option>
                      <option value="Apprenticeship" <?php if(!empty($forward_detail->receipt_type)){ if("Apprenticeship"== $forward_detail->receipt_type){ echo "selected"; } }?>>Apprenticeship Contract Registration Form</option>
                      <option value="Legal" <?php if(!empty($forward_detail->receipt_type)){ if("Legal"== $forward_detail->receipt_type){ echo "selected"; } }?>>Legal</option>
                      <option value="RTI" <?php if(!empty($forward_detail->receipt_type)){ if("RTI"== $forward_detail->receipt_type){ echo "selected"; } }?>>RTI</option>
                      <option value="Public Grievance" <?php if(!empty($forward_detail->receipt_type)){ if("Public Grievance"== $forward_detail->receipt_type){ echo "selected"; } }?>>Public Grievance</option>
                      <option value="DO Letter" <?php if(!empty($forward_detail->receipt_type)){ if("DO Letter"== $forward_detail->receipt_type){ echo "selected"; } }?>>D.O. Letter</option>
        					</select>
                  </div>
                <div class="col-md-3">
                    <label for="email-input" class=" form-control-label">Receipt Category</label>
                    <select class="form-control" name="receipt_categoty" disabled="true" id="receipt_category">
                      <option>Select</option>
                      <option value="General" <?php if(!empty($forward_detail->receipt_category)){ if("General"== $forward_detail->receipt_category) { echo "selected"; } } ?>>General</option>
                      <option value="Urgent" <?php if(!empty($forward_detail->receipt_category)){ if("Urgent"== $forward_detail->receipt_category){ echo "selected"; } }?>>Urgent</option>
                    </select>
                </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Reference No.</label>
                  <input type="text" class="form-control" value="<?php if(!empty($forward_detail->reference_no)){ echo $forward_detail->reference_no; } ?>" name="ref_no" id="ref_no" readonly >
                  </div>
                  <div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Reference Date</label>
              <input type="date" placeholder="dd-mm-yyyy" value="<?php if(!empty($forward_detail->reference_date)){  echo date('Y-m-d', strtotime($forward_detail->reference_date)); } ?>" class="form-control" name="ref_date" id="ref_date" readonly >
                  </div>
                  <div class="col-md-6">
                    <label for="text-input" class="form-control-label">Sender's Name</label>
                    <input type="text" class="form-control" value="<?php if(!empty($forward_detail->sender_name)){ echo $forward_detail->sender_name; } ?>" name="sender_name" id="sender_name" readonly >
                  </div>
				  
                </div>
				<div class="row form-group">
					<div class="col-md-6">
						<label>Address</label>
						<input type="text" class="form-control" value="<?php if(!empty($forward_detail->address)){ echo $forward_detail->address; } ?>" name="address" id="address" readonly >
					</div>
					<div class="col-md-3">
						<label>State</label>
             <?php //$state = array('Andaman and Nicobar Islands', 'Andaman and Nicobar Islands', 2021, 2022, 2023); ?>
						<select class="form-control" name="state" disabled="true" id="state" >
						<option value="">Select State</option>
          
          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chandigarh">Chandigarh</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
          <option value="Daman and Diu">Daman and Diu</option>
          <option value="Delhi">Delhi</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Lakshadweep">Lakshadweep</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Orissa">Orissa</option>
          <option value="Pondicherry">Pondicherry</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttaranchal">Uttaranchal</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
         <option value="West Bengal" <?php if(!empty($forward_detail->state)){ if("West Bengal"== $forward_detail->state) { echo "selected"; } } ?>>West Bengal</option>

						</select>
					</div>
					<div class="col-md-3">
						<label>Subject</label>
						<input type="text" class="form-control" value="<?php if(!empty($forward_detail->subject)){ echo $forward_detail->subject; } ?>" name="re_subject" id="re_subject" readonly >
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-3">
						<label>Remarks</label>
						<input type="text" class="form-control" value="<?php if(!empty($forward_detail->remarks)){ echo $forward_detail->remarks; } ?>" name="remarks" id="remarks" readonly >
					</div>
					
					<div class="col-md-3">
						<label>Enclosure Details</label>
						<input type="text" class="form-control" value="<?php if(!empty($forward_detail->enclosure_details)){ echo $forward_detail->enclosure_details; } ?>" name="enclosure_details" id="enclosure_details" readonly >
					</div>
          <div class="col-md-3">
            <label>Receipt language</label>
            <input type="text" class="form-control" value="<?php if(!empty($forward_detail->rec_lan)){ echo $forward_detail->rec_lan; } ?>" name="rec_lan" id="rec_lan" readonly>

            <!--<select class="form-control" name="rec_lan" id="rec_lan" disabled="true" >
              <option>Select</option>
              <option value="English" <?php if(!empty($forward_detail->rec_lan)){ if("English"== $forward_detail->rec_lan) { echo "selected"; } } ?>>English</option>
              <option value="Hindi" <?php if(!empty($forward_detail->rec_lan)){ if("Hindi"== $forward_detail->rec_lan){ echo "selected"; } }?>>Hindi</option>
              <option value="Other" <?php if(!empty($forward_detail->rec_lan)){ if("Other"== $forward_detail->rec_lan){ echo "selected"; } }?>>Other</option>
            </select>-->

          </div>

         
				</div>

          <div class="row form-group">

            <div class="col-md-3">
              <label>Department Listing</label>
              <select class="form-control" name="department_id" id="department_id" onchange="selectEmployee()">
                <option value="">Select Department</option>
                <?php foreach($departments as $department){ ?>
                 <option value="<?php echo $department->department_name; ?>" <?php if(!empty($forward_detail->forwarddept)){ if($department->department_name == $forward_detail->forwarddept) { echo "selected"; } } ?>><?php echo $department->department_name; ?></option>
                <?php }  ?>   
              </select>
            </div>
            
            <div class="col-md-3">
              <label>Employee Listing</label>
              <select class="form-control" name="empployee_id" id="empployee_id">
                 
              </select>
            </div>


          </div>
        <input type="submit" value="Save Receipt" name="submit" class="btn btn-danger btn-sm">
        </form>
				</div>
      </div>				
                        
    </div>   
</div>

</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

<script>
  selectEmployee();

    var select_emp = "<?php  if(!empty($forward_detail->forwardemp)){ echo $forward_detail->forwardemp;}?>";
  
    setTimeout(function(){
      if(select_emp!=""){
        $("#empployee_id option[value='"+select_emp+"']").prop('selected', 'selected'); 
      }
    },1000);
    

    function selectEmployee(){
      var department_id = $("#department_id option:selected").val();
      $.ajax({
        type:'GET',
        url:'{{url('dak/employeelist')}}/'+department_id,        
        success: function(response){
          
            // console.log(response);
            var option = '';
            option += '<option value="">Select Employee</option>';
            for (var i=0;i<response.length;i++){
              option += '<option value="'+ response[i].emp_code+ '">' + response[i].emp_fname + " " +response[i].emp_mname + " " +response[i].emp_lname+  "(" +response[i].emp_code+ ")" + '</option>';
            }
            $('#empployee_id').html(option);
                     
        }
      });
    }

    
    function populateData()
    {
      var dak_receipt_detail_id = $("#dak_receipt_detail_id option:selected").val();
      $.ajax({
        type:'GET',
        url:"{{url('dak/forwarddtl')}}/"+dak_receipt_detail_id,        
        success: function(response){
          
              // console.log(response);
            $("#d_year").val(response.forward_detail['diary_year']);
            $("#d_date").val(response.forward_detail['diary_date']); 
            $("#receipt_type option[value='"+response.forward_detail['receipt_type']+"']").prop('selected', true);   
            $("#receipt_category option[value='"+response.forward_detail['receipt_category']+"']").prop('selected', true);  
            $("#ref_no").val(response.forward_detail['reference_no']);  
            $("#ref_date").val(response.forward_detail['reference_date']);  
            $("#sender_name").val(response.forward_detail['sender_name']); 
            $("#address").val(response.forward_detail['address']);
            $("#state option[value='"+response.forward_detail['state']+"']").prop('selected', true); 
            $("#re_subject").val(response.forward_detail['subject']);
            $("#remarks").val(response.forward_detail['remarks']);
            $("#enclosure_details").val(response.forward_detail['enclosure_details']);
            $("#rec_lan").val(response.forward_detail['rec_lan']);     
        }
      });

    }
  </script> 


@endsection



@section('scripts')
@include('attendance.partials.scripts')
