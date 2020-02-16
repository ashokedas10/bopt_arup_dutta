@extends('sms.admission.layouts.master')

@section('title')
Admission Management
@endsection

@section('sidebar')
	@include('sms.admission.partials.sidebar')
@endsection

@section('header')
	@include('sms.admission.partials.header')
@endsection

	
@section('content')

<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  } 
  label{margin-top: 10px;}
	  .help-inline-error{color:red;}#sf3 .form-control {height: 39px;}.table td, .table th{vertical-align:middle;}.table thead th{vertical-align:middle;} .table thead{background: #d0e7ef;} .table tr td{}
</style>
	
  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <div class="card">
            <div class="card-header"> <strong>New Admission</strong> </div>
            <div class="card-body card-block">
              <div class="panel panel-primary">
    
    <div class="panel-body">
      <form action="{{ url('sms/admission/new-admission-form-university') }}" id="basicform" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
		
        <div id="sf1" class="frm">
          <fieldset>
            <legend>Admission &amp; Personal Information</legend>

            <div class="row form-group">
				<div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Institute Name</label>
                    <input type="text" class="form-control" value="{{ $data->institute_name }}" readonly="" id="institute_name" >
					 <input type="hidden" name="institute_code" id="institute_code" value="{{ $data->institute_code }}" >
                  </div>
				<div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Faculty</label>
                    <input type="text" class="form-control" readonly=""  value="{{ $data->faculty_name }}" id="faculty_name" >
					 <input type="hidden" name="faculty_code" id="faculty_code" value="{{ $data->faculty_id }}" >
                  </div>
				<div class="col-md-3">
                    <label for="text-input" class=" form-control-label">Course</label>
                    <input type="text" class="form-control" readonly="" value="{{ $data->course_name }}" id="course_name" >
					 <input type="hidden" name="course_code" id="course_code" value="{{ $data->course_code }}" >
                  </div>
				<div class="col-md-3">
					<label>Session</label>
					<input type="text" readonly="" class="form-control" onblur="getFeesConfig();" id="session" name="session" value="{{ $data->session}}" >
				</div>
            </div>
			
			<div class="row form-group">
				
                  <div class="col-md-3">
                    <label>Application Date</label>
                    <input type="date" class="form-control" name="application_dt" required >
                  </div>
                  <div class="col-md-3">
                    <label>Application Form No.</label>
                    <input type="text" class="form-control" name="application_no" required >
                  </div>
				  <div class="col-md-3">
                    <label>Enrollment No.</label>
                    <input type="text" class="form-control" name="enrollment_no" required >
                  </div>
                  <div class="col-md-3">
                    <label>Applicant Type</label>
                    <select class="form-control" name="application_type" required >
                      <option value="" selected disabled>Select</option>
                      <option value="Domestic" >Domestic</option>
                      <option value="Bangladesh" >Bangladesh</option>
                      <option value="Foreigner" >Foreigner</option>
                    </select>
                  </div>
                </div>
				
			<div class="row form-group">
                  <div class="col-md-4">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name" required >
                  </div>
                  <div class="col-md-4">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" >
                  </div>
                  <div class="col-md-4">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" >
                  </div>
                </div>
				
			<div class="row form-group">
			<div class="col-md-4">
                    <label>Email Id</label>
                    <input type="email" class="form-control" name="email" required >
                  </div>
			<div class="col-md-4">
                <label>Contact No.</label>
                <input type="text" class="form-control" name="contact_no" required>
             </div>
			 <div class="col-md-4">
                <label>Alternative Contact No.</label>
                <input type="text" class="form-control" name="alternative_contact">
             </div>
			</div>
			
			<div class="row form-group">
                  <div class="col-md-4">
                    <label>Date of Birth</label>
                    <div class="row form-group">
                      <div class="col-md-4">
                        <select name="day" class="form-control" style="padding: 0px;" name="dd" required >
                          <option value="">Day</option>
                          <option value="01">1</option>
                          <option value="02">2</option>
                          <option value="03">3</option>
                          <option value="04">4</option>
                          <option value="05">5</option>
                          <option value="06">6</option>
                          <option value="07">7</option>
                          <option value="08">8</option>
                          <option value="09">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <select name="month" class="form-control" style="padding: 0px;" name="mm" required >
                          <option value="">Month</option>
                          <option value="01">Jan</option>
                          <option value="02">Feb</option>
                          <option value="03">Mar</option>
                          <option value="04">Apr</option>
                          <option value="05">May</option>
                          <option value="06">Jun</option>
                          <option value="07">Jul</option>
                          <option value="08">Aug</option>
                          <option value="09">Sept</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
                          <option value="12">Dec</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <select name="year" class="form-control" style="padding: 0px;" name="yy" required >
                          <option value="">Year</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>

                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Gender</label>
                    <br>
                    <label class="radio-inline">
                    <input type="radio" name="gender" value="male" required >
                    Male</label>
                    <label class="radio-inline">
                    <input type="radio" name="gender"  value="female" required>
                    Female</label>
                  </div>
                  <div class="col-md-3">
				  <label>Select Blood Group</label>
                    <select  class="form-control" name="blood_group" >
                      <option value="" selected disabled>Select Group</option>
                      <option value="o-">0-</option>
                      <option value="o+">0+</option>
                      <option value="A">A-</option>
                      <option value="A+">A+</option>
                      <option value="B-">B-</option>
                      <option value="B+">B+</option>
                      <option value="AB-">AB-</option>
                      <option value="AB+">AB+</option>
                      <option value="NA">NA</option>
                    </select>
                  </div>
				  <div class="col-md-3">
				  	<label>Marital Status</label>
					<select class="form-control" name="marital_status"  >
                      <option value="" selected disabled>Select</option>
                      <option value="Married">Married</option>
                      <option value="Unmarried">Unmarried</option>
					 </select>
				  </div>
                </div>
				
			<div class="row form-group">
					<div class="col-md-3">
					<label>Adhaar No.</label>
					<input type="text" class="form-control" name="adhaar_no"  >
				</div>
				<div class="col-md-3">
				<label>Caste</label>
				<select class="form-control" name="caste" required >
				<option value="" selected disabled>Select</option>
                    <option value="General">General</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                    <option value="OBC">OBC</option>
                    <option value="Others">Others</option>

                  </select>
				</div>
				<div class="col-md-3">
				  	<label>Nationality</label>
					<input type="text" class="form-control" name="nationality" required >
				</div>
				
				<div class="col-md-3">  
				<label>Religion</label>
				<select class="form-control" name="religion">
				<option value="" selected disabled>Select</option>
				<option value="Buddhism" >Buddhism</option>
				<option value="Christians" >Christians</option>
				<option value="Hinduism">Hinduism</option>
				<option value="Islam">Islam</option>
				<option value="Jainism">Jainism</option>
				<option value="Sikhism">Sikhism</option>
				<option value="Zoroastrian">Zoroastrian</option>
				<option value="Guru Nanak Dev">Guru Nanak Dev</option>
				<option value="Lord Mahavira">Lord Mahavira</option>
				<option value="Adi Shankaracharya">Adi Shankaracharya</option>
				</select>
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-3">
					<label>Passport No</label>
					<input type="text" class="form-control" name="passport" >
				</div>
				<div class="col-md-3">
					<label>Issuing Authority</label>
					<input type="text" class="form-control" name="authority"  >
				</div>
				<div class="col-md-3">
					<label>Valid From</label>
					<input type="text" class="form-control" name="valid_frm" >
				</div>
				<div class="col-md-3">
					<label>Valid To</label>
					<input type="text" class="form-control" name="valid_to"  >
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
					<label>WBJEE Candidate?</label>
					<select class="form-control" name="wbjee_candidate"  >
						<option selected disabled>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Physically Challenged?</label>
					<select class="form-control" name="physically_chalanged"  >
						<option selected disabled>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Percentage of Disability</label>
					<input type="text" class="form-control" name="per_of_disability" >
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
				<label>Passport Size Photograph</label>
					<input type="file" class="form-control" style="height:39px;" name="passport_photo">
				</div>
				<div class="col-md-4">
				<label>Signature</label>
					<input type="file" class="form-control" style="height:39px;" name="signature">
				</div>
				<div class="col-md-4">
				<label>Aadhaar Card</label>
					<input type="file" class="form-control" style="height:39px;" name="adhaar_card">
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
				<label>Voter Card</label>
					<input type="file" class="form-control" style="height:39px;" name="voter_card">
				</div>
				<div class="col-md-4">
				<label>Caste Cetificate</label>
					<input type="file" class="form-control" style="height:39px;" name="caste_certificate">
				</div>
				<div class="col-md-4">
				<label>Physically Clallanged Certificate</label>
					<input type="file" class="form-control" style="height:39px;" name="physically_challenged_certificate">
				</div>
			</div>
			
			<legend>Declaration</legend>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Source</label>
					<select class="form-control" name="source" >
						<option>Select</option>
						<option value="TV" >TV</option>
						<option value="Friends">Friends</option>
						<option value="Leaflet">Leaflet</option>
						<option value="Newspaper">Newspaper</option>
						<option value="Internet">Internet</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Meet with counselor</label>
					<select class="form-control" name="meet_with_counselor" >
						<option>Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Counselor name</label>
					<input type="text" class="form-control" name="counselor_name" >
				</div>
			</div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group">             
                <button class="btn btn-primary open1" type="button">Next <i class="ti-arrow-right"></i></button>               
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>General Information</legend>


            <div class="row form-group">
				<div class="col-md-3">
				<label>Mother's Name</label>
					<input type="text" class="form-control" name="mothers_name" required >
				</div>
				<div class="col-md-3">
				<label>Mother's Qualification</label>
					<input type="text" class="form-control" name="mothers_qualification" >
				</div>
				<div class="col-md-3">
				<label>Father's Name <span>(*)</span></label>
					<input type="text" class="form-control" name="fathers_name" required >
				</div>
				<div class="col-md-3">
				<label>Father's Qualification</label>
					<input type="text" class="form-control" name="fathers_qualification" >
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-3">
				<label>Father's Email Id</label>
					<input type="email" class="form-control" name="fathers_emailid" >
				</div>
				<div class="col-md-3">
				<label>Contact No</label>
					<input type="text" class="form-control" name="fathers_contact_no" >
				</div>
				<div class="col-md-3">
				<label>Occupation</label>
					<input type="text" class="form-control" name="fathers_occuption">
				</div>
				<div class="col-md-3">
				<label>Annual Income</label>
					<input type="text" class="form-control" name="fathers_annual_income">
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-3">
				<label>Gurdian Name</label>
					<input type="text" class="form-control" name="gurdian_name" >
				</div>
				<div class="col-md-3">
				<label>Relation with Guardian </label>
					<input type="text" class="form-control" name="relation_with_gurdian" >
				</div>
				<div class="col-md-3">
				<label>Qualification</label>
					<input type="text" class="form-control" name="gurdian_qualification" >
				</div>
				<div class="col-md-3">
				<label>Email Address</label>
					<input type="email" class="form-control" name="gurdian_email" >
				</div>	
			</div>
			
			<div class="row form-group">
				<div class="col-md-4">
				<label>Contact No.</label>
					<input type="text" class="form-control" name="gurdian_contact_no" >
				</div>
				<div class="col-md-4">
				<label>Occupation</label>
					<input type="text" class="form-control" name="gurdian_occuption" >
				</div>
				<div class="col-md-4">
				<label>Annual Income</label>
					<input type="text" class="form-control" name="gurdian_annual_income" >
				</div>
					
			</div>
			
			<legend>Present Address</legend>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Street No. and Name</label>
					<input type="text" class="form-control" name="present_street_no_name" id="present_street_no_name" required >
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="present_city" id="present_city" required >
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="present_state" id="present_state" required >
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<select class="form-control" name="present_country" id="present_country" required >
					<option>Select</option>
					<option value="AF">Afghanistan</option>
						<option value="AX">Åland Islands</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AS">American Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarctica</option>
						<option value="AG">Antigua and Barbuda</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
						<option value="BB">Barbados</option>
						<option value="BY">Belarus</option>
						<option value="BE">Belgium</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivia, Plurinational State of</option>
						<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
						<option value="BA">Bosnia and Herzegovina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvet Island</option>
						<option value="BR">Brazil</option>
						<option value="IO">British Indian Ocean Territory</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgaria</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="KH">Cambodia</option>
						<option value="CM">Cameroon</option>
						<option value="CA">Canada</option>
						<option value="CV">Cape Verde</option>
						<option value="KY">Cayman Islands</option>
						<option value="CF">Central African Republic</option>
						<option value="TD">Chad</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CX">Christmas Island</option>
						<option value="CC">Cocos (Keeling) Islands</option>
						<option value="CO">Colombia</option>
						<option value="KM">Comoros</option>
						<option value="CG">Congo</option>
						<option value="CD">Congo, the Democratic Republic of the</option>
						<option value="CK">Cook Islands</option>
						<option value="CR">Costa Rica</option>
						<option value="CI">Côte d'Ivoire</option>
						<option value="HR">Croatia</option>
						<option value="CU">Cuba</option>
						<option value="CW">Curaçao</option>
						<option value="CY">Cyprus</option>
						<option value="CZ">Czech Republic</option>
						<option value="DK">Denmark</option>
						<option value="DJ">Djibouti</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominican Republic</option>
						<option value="EC">Ecuador</option>
						<option value="EG">Egypt</option>
						<option value="SV">El Salvador</option>
						<option value="GQ">Equatorial Guinea</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estonia</option>
						<option value="ET">Ethiopia</option>
						<option value="FK">Falkland Islands (Malvinas)</option>
						<option value="FO">Faroe Islands</option>
						<option value="FJ">Fiji</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="GF">French Guiana</option>
						<option value="PF">French Polynesia</option>
						<option value="TF">French Southern Territories</option>
						<option value="GA">Gabon</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgia</option>
						<option value="DE">Germany</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GR">Greece</option>
						<option value="GL">Greenland</option>
						<option value="GD">Grenada</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GG">Guernsey</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HM">Heard Island and McDonald Islands</option>
						<option value="VA">Holy See (Vatican City State)</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IS">Iceland</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IR">Iran, Islamic Republic of</option>
						<option value="IQ">Iraq</option>
						<option value="IE">Ireland</option>
						<option value="IM">Isle of Man</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JM">Jamaica</option>
						<option value="JP">Japan</option>
						<option value="JE">Jersey</option>
						<option value="JO">Jordan</option>
						<option value="KZ">Kazakhstan</option>
						<option value="KE">Kenya</option>
						<option value="KI">Kiribati</option>
						<option value="KP">Korea, Democratic People's Republic of</option>
						<option value="KR">Korea, Republic of</option>
						<option value="KW">Kuwait</option>
						<option value="KG">Kyrgyzstan</option>
						<option value="LA">Lao People's Democratic Republic</option>
						<option value="LV">Latvia</option>
						<option value="LB">Lebanon</option>
						<option value="LS">Lesotho</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libya</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Lithuania</option>
						<option value="LU">Luxembourg</option>
						<option value="MO">Macao</option>
						<option value="MK">Macedonia, the former Yugoslav Republic of</option>
						<option value="MG">Madagascar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Maldives</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MH">Marshall Islands</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritania</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MX">Mexico</option>
						<option value="FM">Micronesia, Federated States of</option>
						<option value="MD">Moldova, Republic of</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolia</option>
						<option value="ME">Montenegro</option>
						<option value="MS">Montserrat</option>
						<option value="MA">Morocco</option>
						<option value="MZ">Mozambique</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NL">Netherlands</option>
						<option value="NC">New Caledonia</option>
						<option value="NZ">New Zealand</option>
						<option value="NI">Nicaragua</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="NF">Norfolk Island</option>
						<option value="MP">Northern Mariana Islands</option>
						<option value="NO">Norway</option>
						<option value="OM">Oman</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PS">Palestinian Territory, Occupied</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua New Guinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippines</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Réunion</option>
						<option value="RO">Romania</option>
						<option value="RU">Russian Federation</option>
						<option value="RW">Rwanda</option>
						<option value="BL">Saint Barthélemy</option>
						<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="KN">Saint Kitts and Nevis</option>
						<option value="LC">Saint Lucia</option>
						<option value="MF">Saint Martin (French part)</option>
						<option value="PM">Saint Pierre and Miquelon</option>
						<option value="VC">Saint Vincent and the Grenadines</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome and Principe</option>
						<option value="SA">Saudi Arabia</option>
						<option value="SN">Senegal</option>
						<option value="RS">Serbia</option>
						<option value="SC">Seychelles</option>
						<option value="SL">Sierra Leone</option>
						<option value="SG">Singapore</option>
						<option value="SX">Sint Maarten (Dutch part)</option>
						<option value="SK">Slovakia</option>
						<option value="SI">Slovenia</option>
						<option value="SB">Solomon Islands</option>
						<option value="SO">Somalia</option>
						<option value="ZA">South Africa</option>
						<option value="GS">South Georgia and the South Sandwich Islands</option>
						<option value="SS">South Sudan</option>
						<option value="ES">Spain</option>
						<option value="LK">Sri Lanka</option>
						<option value="SD">Sudan</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard and Jan Mayen</option>
						<option value="SZ">Swaziland</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="SY">Syrian Arab Republic</option>
						<option value="TW">Taiwan, Province of China</option>
						<option value="TJ">Tajikistan</option>
						<option value="TZ">Tanzania, United Republic of</option>
						<option value="TH">Thailand</option>
						<option value="TL">Timor-Leste</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad and Tobago</option>
						<option value="TN">Tunisia</option>
						<option value="TR">Turkey</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks and Caicos Islands</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="AE">United Arab Emirates</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="UM">United States Minor Outlying Islands</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Uzbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VE">Venezuela, Bolivarian Republic of</option>
						<option value="VN">Viet Nam</option>
						<option value="VG">Virgin Islands, British</option>
						<option value="VI">Virgin Islands, U.S.</option>
						<option value="WF">Wallis and Futuna</option>
						<option value="EH">Western Sahara</option>
						<option value="YE">Yemen</option>
						<option value="ZM">Zambia</option>
						<option value="ZW">Zimbabwe</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Pincode</label>
					<input type="text" class="form-control" name="present_pin_code"  id="present_pin_code" required >
				</div>
			</div>



<legend>Permanent Address <span><label class="checkbox-inline">
<input type="checkbox"  id="diffaddrress" onclick="sameaddress();">(If same as present address)</label></span></legend> 
			<div class="row form-group">
				<div class="col-md-4">
					<label>Street No. and Name</label>
					<input type="text" class="form-control" name="permanent_street_no_name"  id="permanent_street_no_name" required>
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="permanent_city" id="permanent_city" required >
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="permanent_state"  id="permanent_state" required >
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<select class="form-control" name="permanent_country"  id="permanent_country" required >
					<option>Select</option>
					<option value="AF">Afghanistan</option>
						<option value="AX">Åland Islands</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AS">American Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarctica</option>
						<option value="AG">Antigua and Barbuda</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
						<option value="BB">Barbados</option>
						<option value="BY">Belarus</option>
						<option value="BE">Belgium</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivia, Plurinational State of</option>
						<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
						<option value="BA">Bosnia and Herzegovina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvet Island</option>
						<option value="BR">Brazil</option>
						<option value="IO">British Indian Ocean Territory</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgaria</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="KH">Cambodia</option>
						<option value="CM">Cameroon</option>
						<option value="CA">Canada</option>
						<option value="CV">Cape Verde</option>
						<option value="KY">Cayman Islands</option>
						<option value="CF">Central African Republic</option>
						<option value="TD">Chad</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CX">Christmas Island</option>
						<option value="CC">Cocos (Keeling) Islands</option>
						<option value="CO">Colombia</option>
						<option value="KM">Comoros</option>
						<option value="CG">Congo</option>
						<option value="CD">Congo, the Democratic Republic of the</option>
						<option value="CK">Cook Islands</option>
						<option value="CR">Costa Rica</option>
						<option value="CI">Côte d'Ivoire</option>
						<option value="HR">Croatia</option>
						<option value="CU">Cuba</option>
						<option value="CW">Curaçao</option>
						<option value="CY">Cyprus</option>
						<option value="CZ">Czech Republic</option>
						<option value="DK">Denmark</option>
						<option value="DJ">Djibouti</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominican Republic</option>
						<option value="EC">Ecuador</option>
						<option value="EG">Egypt</option>
						<option value="SV">El Salvador</option>
						<option value="GQ">Equatorial Guinea</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estonia</option>
						<option value="ET">Ethiopia</option>
						<option value="FK">Falkland Islands (Malvinas)</option>
						<option value="FO">Faroe Islands</option>
						<option value="FJ">Fiji</option>
						<option value="FI">Finland</option>
						<option value="FR">France</option>
						<option value="GF">French Guiana</option>
						<option value="PF">French Polynesia</option>
						<option value="TF">French Southern Territories</option>
						<option value="GA">Gabon</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgia</option>
						<option value="DE">Germany</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GR">Greece</option>
						<option value="GL">Greenland</option>
						<option value="GD">Grenada</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GG">Guernsey</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HM">Heard Island and McDonald Islands</option>
						<option value="VA">Holy See (Vatican City State)</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hong Kong</option>
						<option value="HU">Hungary</option>
						<option value="IS">Iceland</option>
						<option value="IN">India</option>
						<option value="ID">Indonesia</option>
						<option value="IR">Iran, Islamic Republic of</option>
						<option value="IQ">Iraq</option>
						<option value="IE">Ireland</option>
						<option value="IM">Isle of Man</option>
						<option value="IL">Israel</option>
						<option value="IT">Italy</option>
						<option value="JM">Jamaica</option>
						<option value="JP">Japan</option>
						<option value="JE">Jersey</option>
						<option value="JO">Jordan</option>
						<option value="KZ">Kazakhstan</option>
						<option value="KE">Kenya</option>
						<option value="KI">Kiribati</option>
						<option value="KP">Korea, Democratic People's Republic of</option>
						<option value="KR">Korea, Republic of</option>
						<option value="KW">Kuwait</option>
						<option value="KG">Kyrgyzstan</option>
						<option value="LA">Lao People's Democratic Republic</option>
						<option value="LV">Latvia</option>
						<option value="LB">Lebanon</option>
						<option value="LS">Lesotho</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libya</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Lithuania</option>
						<option value="LU">Luxembourg</option>
						<option value="MO">Macao</option>
						<option value="MK">Macedonia, the former Yugoslav Republic of</option>
						<option value="MG">Madagascar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Maldives</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MH">Marshall Islands</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritania</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MX">Mexico</option>
						<option value="FM">Micronesia, Federated States of</option>
						<option value="MD">Moldova, Republic of</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolia</option>
						<option value="ME">Montenegro</option>
						<option value="MS">Montserrat</option>
						<option value="MA">Morocco</option>
						<option value="MZ">Mozambique</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NL">Netherlands</option>
						<option value="NC">New Caledonia</option>
						<option value="NZ">New Zealand</option>
						<option value="NI">Nicaragua</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="NF">Norfolk Island</option>
						<option value="MP">Northern Mariana Islands</option>
						<option value="NO">Norway</option>
						<option value="OM">Oman</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PS">Palestinian Territory, Occupied</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua New Guinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippines</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Poland</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Réunion</option>
						<option value="RO">Romania</option>
						<option value="RU">Russian Federation</option>
						<option value="RW">Rwanda</option>
						<option value="BL">Saint Barthélemy</option>
						<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="KN">Saint Kitts and Nevis</option>
						<option value="LC">Saint Lucia</option>
						<option value="MF">Saint Martin (French part)</option>
						<option value="PM">Saint Pierre and Miquelon</option>
						<option value="VC">Saint Vincent and the Grenadines</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome and Principe</option>
						<option value="SA">Saudi Arabia</option>
						<option value="SN">Senegal</option>
						<option value="RS">Serbia</option>
						<option value="SC">Seychelles</option>
						<option value="SL">Sierra Leone</option>
						<option value="SG">Singapore</option>
						<option value="SX">Sint Maarten (Dutch part)</option>
						<option value="SK">Slovakia</option>
						<option value="SI">Slovenia</option>
						<option value="SB">Solomon Islands</option>
						<option value="SO">Somalia</option>
						<option value="ZA">South Africa</option>
						<option value="GS">South Georgia and the South Sandwich Islands</option>
						<option value="SS">South Sudan</option>
						<option value="ES">Spain</option>
						<option value="LK">Sri Lanka</option>
						<option value="SD">Sudan</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard and Jan Mayen</option>
						<option value="SZ">Swaziland</option>
						<option value="SE">Sweden</option>
						<option value="CH">Switzerland</option>
						<option value="SY">Syrian Arab Republic</option>
						<option value="TW">Taiwan, Province of China</option>
						<option value="TJ">Tajikistan</option>
						<option value="TZ">Tanzania, United Republic of</option>
						<option value="TH">Thailand</option>
						<option value="TL">Timor-Leste</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad and Tobago</option>
						<option value="TN">Tunisia</option>
						<option value="TR">Turkey</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks and Caicos Islands</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="AE">United Arab Emirates</option>
						<option value="GB">United Kingdom</option>
						<option value="US">United States</option>
						<option value="UM">United States Minor Outlying Islands</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Uzbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VE">Venezuela, Bolivarian Republic of</option>
						<option value="VN">Viet Nam</option>
						<option value="VG">Virgin Islands, British</option>
						<option value="VI">Virgin Islands, U.S.</option>
						<option value="WF">Wallis and Futuna</option>
						<option value="EH">Western Sahara</option>
						<option value="YE">Yemen</option>
						<option value="ZM">Zambia</option>
						<option value="ZW">Zimbabwe</option>
					</select>
				</div>
				<div class="col-md-4">
					<label>Pincode</label>
					<input type="text" class="form-control" name="permanent_pin_code" id="permanent_pin_code" required >
				</div>
			</div>


            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
                <button class="btn btn-warning back2" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open2" type="button">Next <i class="ti-arrow-right"></i></span></button> 
            </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
            <legend>Educational Details</legend>
			<div class="table-responsive">
			<table class="table" style="border-collapse:collapse;">
				<thead>
					<tr>
						<th>Standard</th>
						<th>Board/University</th>
						<th>Passing year</th>
						<th>Division</th>
						<th>Subject</th>
						<th>Total Marks</th>
						<th>Marks Obtained</th>
						<th>Upload Marksheet</th>
					</tr>
				</thead>
				<tbody>
				
					<tr>
						<td>Class X</td> 
						<td><input type="text" name="x_board_university" class="form-control" required></td>
						<td><input type="text" name="x_passing_year"  class="form-control" required ></td>
						<td><input type="text" name="x_division" class="form-control" required ></td>
						<td><input type="text" name="x_subject"  class="form-control" ></td>
						<td><input type="text" name="x_tot_marks"  class="form-control" required></td>
						<td><input type="text" name="x_marks_obtained"  class="form-control" required></td>
						<td><input type="file" name="x_marksheet" class="form-control"  ></td>
					</tr>
					<tr>
						<td>Class XII</td>
						<td><input type="text"  name="xii_board_university"  class="form-control"></td>
						<td><input type="text"  name="xii_passing_year"  class="form-control"></td>
						<td><input type="text"  name="xii_division"  class="form-control"></td>
						<td><input type="text"  name="xii_subject"  class="form-control"></td>
						<td><input type="text"  name="xii_tot_marks"  class="form-control"></td>
						<td><input type="text"  name="xii_marks_obtained"  class="form-control"></td>
						<td><input type="file"  name="xii_marksheet"  class="form-control"></td>
					</tr>
				
					<tr>
						<td>Graduation</td>
						<td><input type="text"  name="graduation_board_university"  class="form-control"></td>
						<td><input type="text"  name="graduation_passing_year"  class="form-control"></td>
						<td><input type="text"  name="graduation_division"  class="form-control"></td>
						<td><input type="text"  name="graduation_subject"  class="form-control"></td>
						<td><input type="text"  name="graduation_tot_marks"  class="form-control"></td>
						<td><input type="text"  name="graduation_marks_obtained"  class="form-control"></td>
						<td><input type="file"  name="graduation_marksheet" class="form-control"></td>
					</tr>
					<tr>
						<td>Post Graduation</td>
						<td><input type="text"  name="post_graduation_board_university"  class="form-control"></td>
						<td><input type="text"  name="post_graduation_passing_year"  class="form-control"></td>
						<td><input type="text"  name="post_graduation_division"  class="form-control"></td>
						<td><input type="text"  name="post_graduation_subject"  class="form-control"></td>
						<td><input type="text"  name="post_graduation_tot_marks"  class="form-control"></td>
						<td><input type="text"  name="post_graduation_marks_obtained"  class="form-control"></td>
						<td><input type="file"  name="post_graduation_marksheet"  class="form-control"></td>
					</tr>
				</tbody>
			</table>
				
			</div>
			
          <div class="form-group">             
                <button class="btn btn-warning back3" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open3" type="button">Next <i class="ti-arrow-right"></i></button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>

          </fieldset>
        </div>
		
		<div id="sf4" class="frm" style="display: none;">
          <fieldset>
            <legend>Fees Configuration</legend>

		<div class="table-responsive">
			<table class="table" style="border-collapse:collapse;">
				<thead>
					<tr>
						<th>Fees Head</th>
						<th>Actual Amount</th>
						<th>Waiver</th>
						<th>Payment</th>
						<th>Due</th>
						<th width="120">Month</th>
						<th width="100">Year</th>
					</tr>
				</thead>
				<tbody id="fees">
					<!--
					<tr>
						<td>Hostel Fees</td>
						<td>8000</td>
						<td>1500</td>
						<td>5000</td>
						<td>1500</td>
						<td><select class="form-control">
							<option>Select</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select></td>
						<td><select class="form-control">
							<option>Select</option>
							<option>2016</option>
							<option>2017</option>
							<option>2018</option>
							<option>2019</option>
						</select></td>
					</tr>
					<tr>
						<td>Admission Fees</td>
						<td>20000</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>June</td>
						<td>2018</td>
					</tr>
					-->
					
				</tbody>
			</table>
				
			</div>				
			
          <div class="form-group">
             
                <button class="btn btn-warning back4" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <input class="btn btn-primary open4" type="submit" value="Submit"> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>

          </fieldset>
        </div>
		
		
		
		
		<!--<div id="sf5" class="frm" style="display: none;">
          <fieldset>
           
			
          <div class="form-group">
             
                <button class="btn btn-warning back5" type="button"><i class="ti-arrow-left"></i> Back</button> 
                <button class="btn btn-primary open5" type="button">Next <i class="ti-arrow-right"></i></button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>

          </fieldset>
        </div>-->
		
		
      </form>
    </div>
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
<div class="clearfix"></div>


@endsection

@section('scripts')
	
<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	
	
	<script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/init/datatables-init.js') }}"></script>
	
	<script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
	</script>
	  
<script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>	
<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
    /*rules: {
        uname: {
          required: false,
          minlength: 2,
          maxlength: 16
        },
        uemail: {
          required: false,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        upass1: {
          required: false,
          minlength: 6,
          maxlength: 15,
        },
        upass2: {
          required: false,
          minlength: 6,
          equalTo: "#upass1",
        }

      },
	  */
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
	$(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
      }
    });
	$(".open4").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf5").show("slow");
      }
    });
	
	/*
    $(".open4").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Admission Form Successfully Submitted</h2>');
         }, 1000);
        return false;
      }
    }
	
	);
    */
	
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });
	$(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("slow");
    });
	$(".back5").click(function() {
      $(".frm").hide("fast");
      $("#sf4").show("slow");
    });
	$(".back6").click(function() {
      $(".frm").hide("fast");
      $("#sf5").show("slow");
    });

  });
</script>

<script>

function sameaddress() {
		var ischecked=$('#diffaddrress').is(":checked");
	
		var present_street_no_name=$("#present_street_no_name").val();
		var present_city=$("#present_city").val();
		var present_state=$("#present_state").val();
		var present_country=$("#present_country").val();
		var present_pin_code=$("#present_pin_code").val();
	
		if(ischecked)
		{
			$("#permanent_street_no_name").val(present_street_no_name);
			$("#permanent_city").val(present_city);
			$("#permanent_state").val(present_state);
			$("#permanent_country").val(present_country);
			$("#permanent_pin_code").val(present_pin_code);			
		}
		else
		{  						
			$("#permanent_street_no_name").val('');
			$("#permanent_city").val('');
			$("#permanent_state").val('');
			$("#permanent_country").val('');
			$("#permanent_pin_code").val('');
		}
	}
</script>

<script>
	
	//$(document).ready(function(){
		//function getFeesConfig()
		//{
			var institute_code=$("#institute_code").val();			
			var faculty_code=$("#faculty_code").val();
			var course_code=$("#course_code").val();
			
			//alert("institute_code "+institute_code);
			//alert("faculty_code "+faculty_code);
			//alert("course_code "+course_code);
			$.ajax({
				type:'GET',
				url:'{{url('sms/admission/fees-heads')}}/'+institute_code+'/'+faculty_code+'/'+course_code,				
				success: function(response){
					//alert(response);
					console.log(response); 				
					$("#fees").html(response);
				
				}
				
			});
		//}
	//});	
	
</script>

@endsection
