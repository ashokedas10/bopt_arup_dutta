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
	  .help-inline-error{color:red;}#sf3 .form-control {height: 39px;}.table td, .table th{vertical-align:middle;}.table thead th{vertical-align:middle;font-size:15px;} .table thead{background: #d0e7ef;} .table tr td {font-size: 14px;}.card form label{font-size:13px;}
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
              <form name="basicform" id="basicform" method="post" action="{{ url('sms/admission/new-admission-form-rice') }}" enctype="multipart/form-data" >
			   <input type="hidden" name="_token" value="{{ csrf_token() }}" >
			   
                <div id="sf1" class="frm">
                  <fieldset>
                  <legend>Admission &amp; Student Personal Information</legend>
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Institute Name</label>
                      <input type="text" class="form-control" readonly="" id="institute_name"  value="{{ $data->institute_name }}">
					   <input type="hidden" name="institute_code" id="institute_code" value="{{ $data->institute_code }}" >
                    </div>
					
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Faculty</label>
                      <input type="text" class="form-control" readonly="" id="faculty_name" value="{{ $data->faculty_name }}">
					  <input type="hidden" name="faculty_code" id="faculty_code" value="{{ $data->faculty_id }}" >
                    </div>
					
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Course Applied for</label>
                      <input type="text" class="form-control" readonly="" id="course_name" value="{{ $data->course_name }}" >
					  <input type="hidden" name="course_code" id="course_code" value="{{ $data->course_code }}" >
                    </div>
					
                    <div class="col-md-3">
                      <label>Session</label>
                      <input type="text" readonly="" class="form-control" placeholder="2018" name="session"  value="{{ $data->session}}" >
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label>Application Date</label>
                      <input type="date" class="form-control" name="application_dt" >
					  
                    </div>
                    <div class="col-md-3">
                      <label>Application Form No.</label>
                      <input type="text" class="form-control" name="application_no" >
                    </div>
                    <div class="col-md-3">
                      <label>Enrollment No.</label>
                      <input type="text" class="form-control" name="enrollment_no" >
                    </div>
                    <div class="col-md-3">
                      <label>Applicant Type</label>
                      <select class="form-control" name="application_type" >
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
                      <input type="text" class="form-control" name="first_name" >
                    </div>
                    <div class="col-md-4">
                      <label>Middle Name</label>
                      <input type="text" class="form-control" name="middle_name"  >
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input type="text" class="form-control" name="last_name"  >
                    </div>
                  </div>
				  
				  <div class="row form-group">
                  <div class="col-md-4">
                    <label>Date of Birth</label>
                    <div class="row form-group">
                      <div class="col-md-4">
                        <select name="day" class="form-control" style="padding: 0px;" name="dd"  >
                         	<option value="" selected disabled> Day</option>
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
                        <select name="month" class="form-control" style="padding: 0px;" name="mm"  >
                         	<option value="" selected disabled> Month</option>
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
                        <select name="year" class="form-control" style="padding: 0px;" name="yy"  >
                         	<option value="" selected disabled> Year</option>
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
                    <input type="radio" value="Male" name="gender"  >
                    Male</label>
                    <label class="radio-inline">
                    <input type="radio" value="Female" name="gender"  >
                    Female</label>
                  </div>
				  <div class="col-md-3">
				  	<label>Age</label>
					<input type="text" class="form-control" name="age"  >
				  </div>
				  <div class="col-md-3">
				  	<label>Marital Status</label>
					<select class="form-control" name="marital_status" >
						<option value="" selected disabled>Select</option>
						<option value="Married" >Married</option>
						<option value="Unmarried">Unmarried</option>
					</select>
				  </div>
                </div>
				
				<div class="row form-group">
				<div class="col-md-3">
				  <label>Select Blood Group</label>
                    <select  class="form-control" name="blood_group"  >
                   	<option value="" selected disabled>Select</option>
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
				  	<label>Mother Tongue</label>
					<select class="form-control" name="mothers_tounge"  >
                     	<option value="" selected disabled>Select</option>
                      <option value="Hindi">Hindi</option>
                      <option value="English">English</option>
					  <option value="Gujrati" >Gujrati</option>
					  <option value="Hindustani" >Hindustani</option>
					  <option value="Bengali" >Bengali</option>
					  <option value="Panjabi">Panjabi</option>	
					  <option value="Sanskrit">Sanskrit</option>
					  <option value="Sindhi">Sindhi</option>
					  <option value="Tamil">Tamil</option>
					  <option value="Kannada">Kannada</option>
					  <option value="Urdu">Urdu</option>
					  <option value="Telugu">Telugu</option>
					  <option value="Malayalam">Malayalam</option>
					  <option value="Maithili">Maithili</option>
					 </select>
				  </div>
					<div class="col-md-3">
						<label>Nationality</label>
						<select class="form-control" name="nationality"  >
								<option value="" selected disabled>Select</option>
						  <option value="afghan">Afghan</option>
						  <option value="albanian">Albanian</option>
						  <option value="algerian">Algerian</option>
						  <option value="american">American</option>
						  <option value="andorran">Andorran</option>
						  <option value="angolan">Angolan</option>
						  <option value="antiguans">Antiguans</option>
						  <option value="argentinean">Argentinean</option>
						  <option value="armenian">Armenian</option>
						  <option value="australian">Australian</option>
						  <option value="austrian">Austrian</option>
						  <option value="azerbaijani">Azerbaijani</option>
						  <option value="bahamian">Bahamian</option>
						  <option value="bahraini">Bahraini</option>
						  <option value="bangladeshi">Bangladeshi</option>
						  <option value="barbadian">Barbadian</option>
						  <option value="barbudans">Barbudans</option>
						  <option value="batswana">Batswana</option>
						  <option value="belarusian">Belarusian</option>
						  <option value="belgian">Belgian</option>
						  <option value="belizean">Belizean</option>
						  <option value="beninese">Beninese</option>
						  <option value="bhutanese">Bhutanese</option>
						  <option value="bolivian">Bolivian</option>
						  <option value="bosnian">Bosnian</option>
						  <option value="brazilian">Brazilian</option>
						  <option value="british">British</option>
						  <option value="bruneian">Bruneian</option>
						  <option value="bulgarian">Bulgarian</option>
						  <option value="burkinabe">Burkinabe</option>
						  <option value="burmese">Burmese</option>
						  <option value="burundian">Burundian</option>
						  <option value="cambodian">Cambodian</option>
						  <option value="cameroonian">Cameroonian</option>
						  <option value="canadian">Canadian</option>
						  <option value="cape verdean">Cape Verdean</option>
						  <option value="central african">Central African</option>
						  <option value="chadian">Chadian</option>
						  <option value="chilean">Chilean</option>
						  <option value="chinese">Chinese</option>
						  <option value="colombian">Colombian</option>
						  <option value="comoran">Comoran</option>
						  <option value="congolese">Congolese</option>
						  <option value="costa rican">Costa Rican</option>
						  <option value="croatian">Croatian</option>
						  <option value="cuban">Cuban</option>
						  <option value="cypriot">Cypriot</option>
						  <option value="czech">Czech</option>
						  <option value="danish">Danish</option>
						  <option value="djibouti">Djibouti</option>
						  <option value="dominican">Dominican</option>
						  <option value="dutch">Dutch</option>
						  <option value="east timorese">East Timorese</option>
						  <option value="ecuadorean">Ecuadorean</option>
						  <option value="egyptian">Egyptian</option>
						  <option value="emirian">Emirian</option>
						  <option value="equatorial guinean">Equatorial Guinean</option>
						  <option value="eritrean">Eritrean</option>
						  <option value="estonian">Estonian</option>
						  <option value="ethiopian">Ethiopian</option>
						  <option value="fijian">Fijian</option>
						  <option value="filipino">Filipino</option>
						  <option value="finnish">Finnish</option>
						  <option value="french">French</option>
						  <option value="gabonese">Gabonese</option>
						  <option value="gambian">Gambian</option>
						  <option value="georgian">Georgian</option>
						  <option value="german">German</option>
						  <option value="ghanaian">Ghanaian</option>
						  <option value="greek">Greek</option>
						  <option value="grenadian">Grenadian</option>
						  <option value="guatemalan">Guatemalan</option>
						  <option value="guinea-bissauan">Guinea-Bissauan</option>
						  <option value="guinean">Guinean</option>
						  <option value="guyanese">Guyanese</option>
						  <option value="haitian">Haitian</option>
						  <option value="herzegovinian">Herzegovinian</option>
						  <option value="honduran">Honduran</option>
						  <option value="hungarian">Hungarian</option>
						  <option value="icelander">Icelander</option>
						  <option value="indian">Indian</option>
						  <option value="indonesian">Indonesian</option>
						  <option value="iranian">Iranian</option>
						  <option value="iraqi">Iraqi</option>
						  <option value="irish">Irish</option>
						  <option value="israeli">Israeli</option>
						  <option value="italian">Italian</option>
						  <option value="ivorian">Ivorian</option>
						  <option value="jamaican">Jamaican</option>
						  <option value="japanese">Japanese</option>
						  <option value="jordanian">Jordanian</option>
						  <option value="kazakhstani">Kazakhstani</option>
						  <option value="kenyan">Kenyan</option>
						  <option value="kittian and nevisian">Kittian and Nevisian</option>
						  <option value="kuwaiti">Kuwaiti</option>
						  <option value="kyrgyz">Kyrgyz</option>
						  <option value="laotian">Laotian</option>
						  <option value="latvian">Latvian</option>
						  <option value="lebanese">Lebanese</option>
						  <option value="liberian">Liberian</option>
						  <option value="libyan">Libyan</option>
						  <option value="liechtensteiner">Liechtensteiner</option>
						  <option value="lithuanian">Lithuanian</option>
						  <option value="luxembourger">Luxembourger</option>
						  <option value="macedonian">Macedonian</option>
						  <option value="malagasy">Malagasy</option>
						  <option value="malawian">Malawian</option>
						  <option value="malaysian">Malaysian</option>
						  <option value="maldivan">Maldivan</option>
						  <option value="malian">Malian</option>
						  <option value="maltese">Maltese</option>
						  <option value="marshallese">Marshallese</option>
						  <option value="mauritanian">Mauritanian</option>
						  <option value="mauritian">Mauritian</option>
						  <option value="mexican">Mexican</option>
						  <option value="micronesian">Micronesian</option>
						  <option value="moldovan">Moldovan</option>
						  <option value="monacan">Monacan</option>
						  <option value="mongolian">Mongolian</option>
						  <option value="moroccan">Moroccan</option>
						  <option value="mosotho">Mosotho</option>
						  <option value="motswana">Motswana</option>
						  <option value="mozambican">Mozambican</option>
						  <option value="namibian">Namibian</option>
						  <option value="nauruan">Nauruan</option>
						  <option value="nepalese">Nepalese</option>
						  <option value="new zealander">New Zealander</option>
						  <option value="ni-vanuatu">Ni-Vanuatu</option>
						  <option value="nicaraguan">Nicaraguan</option>
						  <option value="nigerien">Nigerien</option>
						  <option value="north korean">North Korean</option>
						  <option value="northern irish">Northern Irish</option>
						  <option value="norwegian">Norwegian</option>
						  <option value="omani">Omani</option>
						  <option value="pakistani">Pakistani</option>
						  <option value="palauan">Palauan</option>
						  <option value="panamanian">Panamanian</option>
						  <option value="papua new guinean">Papua New Guinean</option>
						  <option value="paraguayan">Paraguayan</option>
						  <option value="peruvian">Peruvian</option>
						  <option value="polish">Polish</option>
						  <option value="portuguese">Portuguese</option>
						  <option value="qatari">Qatari</option>
						  <option value="romanian">Romanian</option>
						  <option value="russian">Russian</option>
						  <option value="rwandan">Rwandan</option>
						  <option value="saint lucian">Saint Lucian</option>
						  <option value="salvadoran">Salvadoran</option>
						  <option value="samoan">Samoan</option>
						  <option value="san marinese">San Marinese</option>
						  <option value="sao tomean">Sao Tomean</option>
						  <option value="saudi">Saudi</option>
						  <option value="scottish">Scottish</option>
						  <option value="senegalese">Senegalese</option>
						  <option value="serbian">Serbian</option>
						  <option value="seychellois">Seychellois</option>
						  <option value="sierra leonean">Sierra Leonean</option>
						  <option value="singaporean">Singaporean</option>
						  <option value="slovakian">Slovakian</option>
						  <option value="slovenian">Slovenian</option>
						  <option value="solomon islander">Solomon Islander</option>
						  <option value="somali">Somali</option>
						  <option value="south african">South African</option>
						  <option value="south korean">South Korean</option>
						  <option value="spanish">Spanish</option>
						  <option value="sri lankan">Sri Lankan</option>
						  <option value="sudanese">Sudanese</option>
						  <option value="surinamer">Surinamer</option>
						  <option value="swazi">Swazi</option>
						  <option value="swedish">Swedish</option>
						  <option value="swiss">Swiss</option>
						  <option value="syrian">Syrian</option>
						  <option value="taiwanese">Taiwanese</option>
						  <option value="tajik">Tajik</option>
						  <option value="tanzanian">Tanzanian</option>
						  <option value="thai">Thai</option>
						  <option value="togolese">Togolese</option>
						  <option value="tongan">Tongan</option>
						  <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
						  <option value="tunisian">Tunisian</option>
						  <option value="turkish">Turkish</option>
						  <option value="tuvaluan">Tuvaluan</option>
						  <option value="ugandan">Ugandan</option>
						  <option value="ukrainian">Ukrainian</option>
						  <option value="uruguayan">Uruguayan</option>
						  <option value="uzbekistani">Uzbekistani</option>
						  <option value="venezuelan">Venezuelan</option>
						  <option value="vietnamese">Vietnamese</option>
						  <option value="welsh">Welsh</option>
						  <option value="yemenite">Yemenite</option>
						  <option value="zambian">Zambian</option>
						  <option value="zimbabwean">Zimbabwean</option>
						</select>
						
					</div>
					
					<div class="col-md-3">  
				<label>Religion</label>
				<select class="form-control" name="religion"  >
				<option value="" selected disabled> Select</option>
				<option value="Buddhism" >Buddhism</option>
				<option value="Christians">Christians</option>
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
                      <label>Email Id</label>
                      <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="col-md-3">
                      <label>Student Mobile No.</label>
                      <input type="text" class="form-control" name="contact_no" >
                    </div>
                    <div class="col-md-3">
                      <label>Phone No. (Residential)</label>
                      <input type="text" class="form-control" name="alternative_contact" >
                    </div>
                    <div class="col-md-3">
                      <label>Fee Type</label>
                      <select  class="form-control" required="required" name="fee_type" >
					  <option value="" selected disabled>Select</option>
                        <option value="One Time">One Time </option>
                        <option value="Yearly"> Yearly </option>
                        <option value="Half Yearly"> Half Yearly </option>
                        <option value="Quarterly">Quarterly </option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="row form-group">
                    
                    <div class="col-md-4">
                      <label>Caste</label>
                      <select  class="form-control" name="caste" >
                        <option value="" selected disabled>Select</option>
                        <option value="General">General</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="OBC">OBC</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label>Student Passport Size Photo</label>
                      <input type="file" class="form-control" style="height:39px;" name="passport_photo" >
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
            <legend>Father's &amp; Mother's Information</legend>


            <div class="row form-group">
			<div class="col-md-3">
				<label>Father's Name <span>(*)</span></label>
					<input type="text" class="form-control" name="fathers_name" >
				</div>
				<div class="col-md-3">
				<label>Father's Educational Qualification</label>
					<select class="form-control" name="fathers_qualification"  >
						<option value="" selected disabled>Select</option>
						<option value="12th" >12th</option>
						<option value="Graduate" >Graduate</option>
						<option value="Post Graduate &amp; Above" >Post Graduate &amp; Above</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Father's Profession/Occupation</label>
					<select class="form-control" name="fathers_occuption" >
						<option value="" selected disabled>Select</option>
						<option value="Service" >Service</option>
						<option value="Self Employed" >Self Employed</option>
						<option value="Others" >Others</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Father's Office Address</label>
					<input type="text" class="form-control" name="fathers_office_address" >
				</div>
				
			</div>
			
			<div class="row form-group">
				<div class="col-md-3">
				<label>Father's Office Phone No.</label>
					<input type="text" class="form-control" name="fathers_office_contact_no" >
				</div>
				<div class="col-md-3">
				<label>Father's Designation</label>
					<input type="text" class="form-control" name="fathers_designation" >
				</div>
				<div class="col-md-3">
				<label>Father's Nature of Business</label>
					<select class="form-control" name="fathers_nature_of_business" >
						<option value="" selected disabled>Select</option>
						<option value="Sole Proprietorship" >Sole Proprietorship</option>
						<option value="Partnership Firms" >Partnership Firms</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Father's Monthly Income</label>
					<select class="form-control" name="fathers_annual_income" >
						<option value="" selected disabled>Select</option>
						<option value="10,000" >10,000</option>
						<option value="20,000" >20,000</option>
						<option value="30,000" >30,000</option>
						<option value="More than 30,000"> More than 30,000</option>
					</select>
				</div>
				
			</div>
			
			<div class="row form-group">
			<div class="col-md-3">
				<label>Mother's Name <span>(*)</span></label>
					<input type="text" class="form-control" name="mothers_name" >
				</div>
				<div class="col-md-3">
				<label>Mother's Educational Qualification</label>
					<select class="form-control" name="mothers_qualification" >
						<option value="" selected disabled>Select</option>
						<option value="10th">10th</option>
						<option value="12th" >12th</option>
						<option value="Graduate" >Graduate</option>
						<option value="Post Graduate &amp; Above" >Post Graduate &amp; Above</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Mother's Profession/Occupation</label>
					<select class="form-control" name="mothers_occuption" >
						<option value="" selected disabled>Select</option>
						<option value="Home Maker" >Home Maker</option>
						<option value="Service" >Service</option>
						<option value="Self Employed" >Self Employed</option>
						<option value="Others" >Others</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Mother's Office Address</label>
					<input type="text" class="form-control" name="mothers_address" >
				</div>
				
			</div>
			
			<div class="row form-group">
			<div class="col-md-3">
				<label>Mother's Office Phone No.</label>
					<input type="text" class="form-control" name="mothers_office_ph_no" >
				</div>
				<div class="col-md-3">
				<label>Mother's Designation</label>
					<input type="text" class="form-control" name="mothers_designation" >
				</div>
				<div class="col-md-3">
				<label>Mother's Nature of Business</label>
					<select class="form-control" name="mothers_nature_of_business" >
						<option value="" selected disabled>Select</option>
						<option value="Sole Proprietorship" >Sole Proprietorship</option>
						<option value="Partnership Firms" >Partnership Firms</option>
					</select>
				</div>
				<div class="col-md-3">
				<label>Mother's Monthly Income</label>
					<select class="form-control" name="mothers_monthly_income" >
						<option value="" selected disabled>Select</option>
						<option value="10,000" >10,000</option>
						<option value="20,000" >20,000</option>
						<option value="30,000" >30,000</option>
						<option value="More than 30,000"> More than 30,000</option>
					</select>
				</div>
				
			</div>

			<legend>Guardian Information</legend>
			<div class="row form-group">
				<div class="col-md-3">
				<label>Guardian Name</label>
					<input type="text" class="form-control" name="gurdian_name" >
				</div>
				<div class="col-md-3">
				<label>Relationship with Student</label>
					<input type="text" class="form-control" name="relation_with_gurdian" >
				</div>
				<div class="col-md-3">
				<label>Guardian Address</label>
					<input type="text" class="form-control" name="gurdian_address" >
				</div>
				<div class="col-md-3">
				<label>Guardian Phone No.</label>
					<input type="text" class="form-control" name="gurdian_contact_no" >
				</div>	
			</div>
			
			
			<legend>Present Address</legend>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Address</label>
					<input type="text" class="form-control" name="present_street_no_name" id="present_street_no_name"  >
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="present_city" id="present_city">
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="present_state" id="present_state" >
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<select class="form-control" name="present_country" id="present_country">
						<option value="" selected disabled>Select</option>
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
					<input type="text" class="form-control" name="present_pin_code" id="present_pin_code">
				</div>
			</div>



		<legend>Parmanent Address <span><label class="checkbox-inline">
			<input type="checkbox"  id="diffaddrress" onclick="sameaddress();">(If same as present address)</label></span></legend> 
			<div class="row form-group">
				<div class="col-md-4">
					<label>Address</label>
					<input type="text" class="form-control" name="permanent_street_no_name" id="permanent_street_no_name" >
				</div>
				<div class="col-md-4">
					<label>City</label>
					<input type="text" class="form-control" name="permanent_city" id="permanent_city" >
				</div>
				<div class="col-md-4">
					<label>State</label>
					<input type="text" class="form-control" name="permanent_state" id="permanent_state">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4">
					<label>Country</label>
					<select class="form-control" name="permanent_country" id="permanent_country">
					<option value="" selected disabled>Select</option>
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
					<input type="text" class="form-control" name="permanent_pin_code" id="permanent_pin_code" >
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
                  <legend>Student Academic Qualification</legend>
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
                          <td><input type="text" class="form-control" name="x_board_university"  ></td>
                          <td><input type="text" class="form-control" name="x_passing_year"  ></td>
                          <td><input type="text" class="form-control" name="x_division"  ></td>
                          <td><input type="text" class="form-control" name="x_subject"  ></td>
                          <td><input type="text" class="form-control" name="x_tot_marks" ></td>
                          <td><input type="text" class="form-control" name="x_marks_obtained" ></td>
                          <td><input type="file" class="form-control" name="x_marksheet" ></td>
                        </tr>
                        <tr>
                          <td>Class XII</td>
                          <td><input type="text" class="form-control" name="xii_board_university" ></td>
                          <td><input type="text" class="form-control" name="xii_passing_year"  ></td>
                          <td><input type="text" class="form-control" name="xii_division"  ></td>
                          <td><input type="text" class="form-control" name="xii_subject"  ></td>
                          <td><input type="text" class="form-control" name="xii_tot_marks"  ></td>
                          <td><input type="text" class="form-control" name="xii_marks_obtained"  ></td>
                          <td><input type="file" class="form-control" name="xii_marksheet"  ></td>
                        </tr>
                        <tr>
                          <td>Graduation</td>
                          <td><input type="text" class="form-control" name="graduation_board_university"  ></td>
                          <td><input type="text" class="form-control" name="graduation_passing_year"  ></td>
                          <td><input type="text" class="form-control" name="graduation_division"  ></td>
                          <td><input type="text" class="form-control" name="graduation_subject"  ></td>
                          <td><input type="text" class="form-control" name="graduation_tot_marks"  ></td>
                          <td><input type="text" class="form-control" name="graduation_marks_obtained"  ></td>
                          <td><input type="file" class="form-control" name="graduation_marksheet" ></td>
                        </tr>
                        <tr>
                          <td>Post Graduation</td>
                          <td><input type="text" class="form-control" name="post_graduation_board_university"  ></td>
                          <td><input type="text" class="form-control" name="post_graduation_passing_year"  ></td>
                          <td><input type="text" class="form-control" name="post_graduation_division"  ></td>
                          <td><input type="text" class="form-control" name="post_graduation_subject"  ></td>
                          <td><input type="text" class="form-control" name="post_graduation_tot_marks"  ></td>
                          <td><input type="text" class="form-control" name="post_graduation_marks_obtained"  ></td>
                          <td><input type="file" class="form-control" name="post_graduation_marksheet" ></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
				  
				  <legend>Education Status</legend>
				  <div class="row form-group">
				  	<div class="col-md-4">
						<label>Current Status</label>
						<select class="form-control" name="current_education_status"  >
							<option value="" selected disabled>Select</option>
							<option value="Completed" >Completed</option>
							<option value="Persuing" >Persuing</option>
						</select>
					</div>
					<div class="col-md-4">
						<label>Stream (Graduation)</label>
						<select class="form-control" name="graduation_status"  >
							<option value="" selected disabled>Select</option>
							<option value="Arts" >Arts</option>
							<option value="Commerce" >Commerce</option>
							<option value="Science" >Science</option>
						</select>
					</div>
					<div class="col-md-4">
						<label>Qualification (Post Graduation)</label>
						<select class="form-control" name="post_graduation_status"  >
							<option value="" selected disabled>Select</option>
							<option value="MSc" >MSc</option>
							<option  value="Mtech" >Mtech</option>
							<option value="MA" >MA</option>
							<option value="Mcom" >Mcom</option>
							<option value="Phd" >Phd</option>
						</select>
					</div>
				  </div>
				  <legend>Employment Details</legend>
				  <div class="row form-group">
				  	<div class="col-md-4">
						<label>Type of Industry</label>
							<select class="form-control" name="industry_type"  >
							<option value="" selected disabled>Select</option>
							<option value="Industry1" >Industry1</option>
						</select>
					</div>
					<div class="col-md-4">
						<label>IT skills</label>
						<select class="form-control" name="it_skills"  >
							<option value="" selected disabled>Select</option>
							<option value="Programming and Application Development" >Programming and Application Development</option>
							<option value="Help Desk and Technical Support" >Help Desk and Technical Support</option>
							<option value="Networking">Networking</option>
							<option value="Mobile Applications and Device Management">Mobile Applications and Device Management</option>
							<option value="Project Management">Project Management</option>
							<option value="Database Administration" >Database Administration</option>
						</select>
					</div>
					<div class="col-md-4">
						<label>Work Experience (Months)</label>
						<input type="text" class="form-control" name="work_experience"  >
					</div>
				  </div>
				  <div class="row form-group">
				  	<div class="col-md-4">
						<label>Role</label>
						<input type="text" class="form-control" name="role"  >
					</div>
					<div class="col-md-4">
						<label>Salary (INR)</label>
						<input type="text" class="form-control" name="salary">
					</div>
				  </div>
				  <legend>Reference of My Friends</legend>
				  <table class="table" style="border-collapse:collapse;">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Name</th>
                          <th>Contact No.</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><input type="text" class="form-control" name="refer_name"></td>
                          <td><input type="text" class="form-control" name="refer_contact_no"></td>
                          <td><input type="text" class="form-control" name="refer_address"></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><input type="text" class="form-control"></td>
                          <td><input type="text" class="form-control"></td>
                          <td><input type="text" class="form-control"></td>
                        </tr>
                        
                        
                      </tbody>
                    </table>
					
					<legend>Post Counseling Feedback (Rating 1-5) 1--> Low, 5--> High</legend>
				  <table class="table" style="border-collapse:collapse;">
                      <thead>
                        <tr>
                          <th>Sl No.</th>
                          <th>Questions</th>
                          <th>Rating</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Front Office Ambience</td>
                          <td><input type="text" class="form-control" name="front_office_ambience"></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Relevant Information Brochure Availability</td>
                          <td><input type="text" class="form-control"  name="brochure_avail"></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Queries were handled to my stisfaction</td>
                          <td><input type="text" class="form-control"  name="queries"></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>RICE can provide me with the product that I need and is best suited for my career</td>
                          <td><input type="text" class="form-control" name="rice_products"></td>
                        </tr>
                      </tbody>
                    </table>
                  <div class="form-group">
                    <button class="btn btn-warning back3" type="button"><i class="ti-arrow-left"></i> Back</button>
                    <button class="btn btn-primary open3" type="button">Next <i class="ti-arrow-right"></i></button>
                    <img src="spinner.gif" alt="" id="loader" style="display: none"> </div>
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
							
						</tbody>
					</table>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-warning back4" type="button"><i class="ti-arrow-left"></i> Back</button>
                    <button class="btn btn-primary open4" type="submit">Submit</button>
                    <img src="spinner.gif" alt="" id="loader" style="display: none"> </div>
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
</div>
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
     /* rules: {
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
    });
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
