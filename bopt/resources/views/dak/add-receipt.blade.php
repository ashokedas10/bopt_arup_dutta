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
                              <strong class="card-title">Save Receipt</strong></div>
                            <?php }else{ ?>
                             <strong class="card-title">Add New Receipt</strong></div>
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
<form role="form" method="post" action="{{ url('dak/add-receipt') }}" enctype="multipart/form-data">
               
                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 


              <input type="hidden" name="id" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->id;} ?>"> 

                <div class="row form-group">
                  <div class="col-md-3">
                    <label for="text-input" class="form-control-label">Diary Year</label>
                    <?php $year_value = array(2019, 2020, 2021, 2022, 2023); ?>
                    <select class="form-control" name="d_year" id="d_year" <?php if(!empty($receipt_det->id)){ ?>  <?php } ?> >
                     
                      <option>Select Year</option>

                    
                    <option  value="2023" <?php if(!empty($year_value[4])){ if("2023"== $year_value[4]) { echo "selected"; } } ?> >
                          <?php echo $year_value[4]; ?>            
                    </option>
                      <option  value="2022" <?php if(!empty($year_value[3])){ if("2022"== $year_value[3]) { echo "selected"; } } ?> >
                          <?php echo $year_value[3]; ?>            
                    </option>
                      <option  value="2021" <?php if(!empty($year_value[2])){ if("2021"== $year_value[2]) { echo "selected"; } } ?> >
                          <?php echo $year_value[2]; ?>            
                    </option>
                   <option  value="2020" <?php if(!empty($year_value[1])){ if("2020"== $year_value[1]) { echo "selected"; } } ?> >
                          <?php echo $year_value[1]; ?>            
                    </option>
                     <option  value="2019" <?php if(!empty($year_value[0])){ if("2019"== $year_value[0]) { echo "selected"; } } ?> >
                          <?php echo $year_value[0]; ?>            
                    </option>
                    
                     
                     
                    </select>
                  </div>
                  <div class="col-md-3">
                  
                    <label for="email-input" class=" form-control-label">Diary Date</label>
                    <input type="date" placeholder="dd-mm-yyyy" value="<?php if(!empty($receipt_det->id)){ echo date('Y-m-d', strtotime($receipt_det->diary_date)); } ?>" name="d_date" <?php if(!empty($receipt_det->id)){ ?>  <?php } ?> class="form-control">
                    
                  </div>
                  <div class="col-md-3">
                    <label for="email-input" class=" form-control-label">Receipt Type</label>
                  <select class="form-control" name="receipt_type">
        						<option>Select</option>
      <option value="Letter" <?php if(!empty($receipt_det->receipt_type)){ if("Letter"== $receipt_det->receipt_type) { echo "selected"; } } ?>>Letter</option>
      <option value="Bill" <?php if(!empty($receipt_det->receipt_type)){ if("Bill"== $receipt_det->receipt_type){ echo "selected"; } }?>>Bill</option>
      <option value="Proficiancy certificate" <?php if(!empty($receipt_det->receipt_type)){ if("Proficiancy certificate"== $receipt_det->receipt_type) { echo "selected"; } } ?>>Proficiency certificate</option>
      <option value="Noting" <?php if(!empty($receipt_det->receipt_type)){ if("Noting"== $receipt_det->receipt_type) { echo "selected"; } } ?>>Noting</option>
      <option value="Envelop" <?php if(!empty($receipt_det->receipt_type)){ if("Envelop"== $receipt_det->receipt_type) { echo "selected"; } } ?>>Envelop</option>
      <option value="Others" <?php if(!empty($receipt_det->receipt_type)){ if("Others"== $receipt_det->receipt_type){ echo "selected"; } }?>>Others</option>
      <option value="Ministry Communication" <?php if(!empty($receipt_det->receipt_type)){ if("Ministry Communication"== $receipt_det->receipt_type){ echo "selected"; } }?>>Ministry Communication</option>
      <option value="Bill(Stipend)" <?php if(!empty($receipt_det->receipt_type)){ if("Bill(Stipend)"== $receipt_det->receipt_type){ echo "selected"; } }?>>Bill(Stipend)</option>
      <option value="Bill(Establishment)" <?php if(!empty($receipt_det->receipt_type)){ if("Bill(Establishment)"== $receipt_det->receipt_type){ echo "selected"; } }?>>Bill(Establishment)</option>
      <option value="Apprenticeship" <?php if(!empty($receipt_det->receipt_type)){ if("Apprenticeship"== $receipt_det->receipt_type){ echo "selected"; } }?>>Apprenticeship Contract Registration Form</option>
      <option value="Legal" <?php if(!empty($receipt_det->receipt_type)){ if("Legal"== $receipt_det->receipt_type){ echo "selected"; } }?>>Legal</option>
      <option value="RTI" <?php if(!empty($receipt_det->receipt_type)){ if("RTI"== $receipt_det->receipt_type){ echo "selected"; } }?>>RTI</option>
      <option value="Public Grievance" <?php if(!empty($receipt_det->receipt_type)){ if("Public Grievance"== $receipt_det->receipt_type){ echo "selected"; } }?>>Public Grievance</option>
      <option value="DO Letter" <?php if(!empty($receipt_det->receipt_type)){ if("DO Letter"== $receipt_det->receipt_type){ echo "selected"; } }?>>D.O. Letter</option>
        					</select>
                  </div>
      <div class="col-md-3">
          <label for="email-input" class=" form-control-label">Receipt Category</label>
          <select class="form-control" name="receipt_categoty">
      <option>Select</option>
      <option value="General" <?php if(!empty($receipt_det->receipt_category)){ if("General"== $receipt_det->receipt_category) { echo "selected"; } } ?>>General</option>
      <option value="Urgent" <?php if(!empty($receipt_det->receipt_category)){ if("Urgent"== $receipt_det->receipt_category){ echo "selected"; } }?>>Urgent</option>
      <option value="Confidential" <?php if(!empty($receipt_det->receipt_category)){ if("Confidential"== $receipt_det->receipt_category){ echo "selected"; } }?>>Confidential</option>

			</select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Reference No.</label>
                  <input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->reference_no; } ?>" name="ref_no">
                  </div>
                  <div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Reference Date</label>
              <input type="date" placeholder="dd-mm-yyyy" value="<?php if(!empty($receipt_det->id)){  echo date('Y-m-d', strtotime($receipt_det->reference_date)); } ?>" class="form-control" name="ref_date">
                  </div>
                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Sender's Name</label>
                    <input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->sender_name; } ?>" name="sender_name" required>
                  </div>
				  
                </div>
				<div class="row form-group">
					<div class="col-md-6">
						<label>Address</label>
						<input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->address; } ?>" name="address">
					</div>
					<div class="col-md-3">
						<label>State</label>
             <?php //$state = array('Andaman and Nicobar Islands', 'Andaman and Nicobar Islands', 2021, 2022, 2023); ?>
						<select class="form-control" name="state">
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
         <option value="West Bengal" <?php if(!empty($receipt_det->state)){ if("West Bengal"== $receipt_det->state) { echo "selected"; } } ?>>West Bengal</option>

						</select>
					</div>
					<div class="col-md-3">
						<label>Subject</label>
						<input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->subject; } ?>" name="re_subject">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-3">
						<label>Remarks</label>
						<input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->remarks; } ?>" name="remarks">
					</div>
					
					<div class="col-md-3">
						<label>Enclosure Details</label>
						<input type="text" class="form-control" value="<?php if(!empty($receipt_det->id)){ echo $receipt_det->enclosure_details; } ?>" name="enclosure_details">
					</div>
            <div class="col-md-3">
            <label>Receipt language</label>
            <select class="form-control" name="rec_lan" id="rec_lan" onchange="enterOtherLanguages()">
              <option>Select</option>
            
              <option value="English" <?php if(!empty($receipt_det->rec_lan)){ if("English"== $receipt_det->rec_lan) { echo "selected"; } } ?>>English</option>
          <option value="Hindi" <?php if(!empty($receipt_det->rec_lan)){ if("Hindi"== $receipt_det->rec_lan){ echo "selected"; } }?>>Hindi</option>
          <option value="Other" <?php if(!empty($receipt_det->rec_lan)){ if("Other"== $receipt_det->rec_lan){ echo "selected"; } }?>>Other</option>
            </select>
          </div>
          <div class="col-md-3">
            <label>If Other please specify</label>
            <input type="text" class="form-control" value="<?php if(!empty($receipt_det->other_lan)){ echo $receipt_det->other_lan; } ?>" name="other_lan" id="other_lan" disabled>
          </div>
				</div>
        <input type="submit" value="Save Receipt" name="submit" class="btn btn-danger btn-sm">
        <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
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
        @endsection

@section('scripts')
@include('attendance.partials.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script>

    $('.date').datepicker({
       format: 'dd-mm-yyyy'
     });

    jQuery(document).ready(function($) {
     $('.date').bind('keypress', function(e) {
        e.preventDefault(); 
     });

     enterOtherLanguages();
    });

    

  

    function enterOtherLanguages(){
      var other_lan = $("#rec_lan option:selected").val();
      if(other_lan=='Other'){
        $('#other_lan').attr('disabled',false);
      }else{
        $('#other_lan').attr('disabled',true);
      }
    }
  		
	</script>	
    }
@endsection