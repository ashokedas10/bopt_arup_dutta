<?php

namespace App\Http\Controllers\SMS\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Model\Masters\Institute;
use App\Model\Fees\FeesHeadConfig;
use App\Model\Masters\Classes;
use App\Model\Fees\FeesHead;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use App\Model\Masters\InstituteWiseConfig;
use Illuminate\Support\Facades\DB;
use App\Model\Fees\Fees;
use App\Model\Admission\Batch;
use App\Model\Admission\UniversityStudentAdmission;
use App\Model\Admission\RiceStudentAdmission;
use App\Model\Admission\UniversityFeesDetails;
use App\Model\Admission\RiceFeesDetails;

class AdmissionController extends Controller
{
	public $universityAdmission='';
	public $institute='';
	public $batch='';

	public function __construct(UniversityStudentAdmission $universityAdmission,Institute $institute,Batch $batch)
	{
		$this->universityAdmission=$universityAdmission;		
		$this->institute=$institute;	
		$this->batch=$batch;
	}
	
	public function getAdmission()
	{
		$admissions=	$this->universityAdmission->all();		
		return view('sms/admission/view-admission', compact('admissions'));		
	}
	
	public function formInstitute()
	{		
		$institute_rs=$this->institute->where('institute_status','=','active')->get();
		return view('sms/admission/admission-institute', compact('institute_rs'));
	}
	
	public function saveInstitute(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required'		
		],
		[
		'institute_code.required'=>'Institute Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/admission/new-admission-institute')->withErrors($validator)->withInput();			
		}		
		
		$institute_code=$request->institute_code;
		$institute_name=$request->institute_name;
		
		//echo $institute_code."-".$institute_name; die;
		$institute_name_arr=array('University','university','UNIVERSITY');
		$contains_university = str_contains($institute_name, $institute_name_arr);
		
		$rice_institute_name_arr=array('Rice','rice','RICE');
		$contains_rice = str_contains($institute_name, $rice_institute_name_arr);
		
		$school_name_arr=array('School','school','SCHOOL');
		$contains_school = str_contains($institute_name, $school_name_arr);
		
		$faculty_rs=DB::Table('institute_wise_configuration')
		->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
		->where('institute_wise_configuration.status','=','active')
		->where('institute_wise_configuration.institute_code','=',$institute_code)
		->where('institute_wise_configuration.faculty_id','<>','')
		->groupBy('institute_wise_configuration.faculty_id')->get();
		
		$batch_rs=$this->batch->where('institute_name','=',$institute_name)->where('status','=','active')->get();
		$class_rs=Classes::where('class_status','=','active')->get();
		
		//dd($batch_rs);
		if($contains_university)
		{
			return view('sms/admission/admission-institute-next',compact('institute_code','faculty_rs'));
		}

		if($contains_rice)
		{
			return view('sms/admission/admission-rice-next',compact('institute_code','faculty_rs','batch_rs'));
		}
				
		if($contains_school)
		{
			return view('sms/admission/admission-school-next',compact('institute_code','class_rs'));
		}
	}
	
	public function formAdmissionUniversity(Request $request)
	{
		return view('sms/admission/new-admission-university');
	}	
	
	public function saveAdmissionUniversity(Request $request)
	{
		//$data=$request->all();		
		$data=DB::Table('institute_wise_configuration')
		->leftJoin('institute','institute_wise_configuration.institute_code','=','institute.institute_code')
		->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
		->leftJoin('course','institute_wise_configuration.course_code','=','course.course_code')
		->where('institute_wise_configuration.status','=','active')
		->where('institute_wise_configuration.institute_code','=',$request->institute_code)
		->where('institute_wise_configuration.faculty_id','=',$request->faculty_id)
		->where('institute_wise_configuration.course_code','=',$request->course_code)
		->where('institute_wise_configuration.faculty_id','<>','')
		->groupBy('institute_wise_configuration.faculty_id')->get()->first();
		//$data
		//dd($data);
		$data->session=$request->session;		
		return view('sms/admission/new-admission-university', compact('data'));
	}
	
	public function saveAdmissionFormUniversity(Request $request)
	{
		//dd($request->all());		
		$dob=$request->dd.'-'.$request->mm.'-'.$request->yy;
		$universityStudentAdmission=new UniversityStudentAdmission();
		$universityFeesDetails=new UniversityFeesDetails();
		
		if($request->hasFile('passport_photo'))
		{
			$files = $request->file('passport_photo');		
			$passport_photo = $files->store('passport_photo');
			$data['passport_photo']=$passport_photo;
			//dd($data);
		}
		//echo $files;
		
		if($request->hasFile('signature'))
		{
			$files = $request->file('signature');		
			$signature = $files->store('signature');
			$data['signature']=$signature;	
		}
		
		//dd($data);
		if($request->hasFile('adhaar_card'))
		{
			$files = $request->file('adhaar_card');		
			$adhaar_card = $files->store('adhaar_card');
			$data['adhaar_card']=$adhaar_card;	
		}
		
		if($request->hasFile('voter_card'))
		{
			$files = $request->file('voter_card');		
			$voter_card = $files->store('voter_card');
			$data['voter_card']=$voter_card;	
		}
		
		if($request->hasFile('caste_certificate'))
		{
			$files = $request->file('caste_certificate');		
			$caste_certificate = $files->store('caste_certificate');
			$data['caste_certificate']=$caste_certificate;	
		}
		
		if($request->hasFile('physically_challenged_certificate'))
		{
			$files = $request->file('physically_challenged_certificate');		
			$physically_challenged_certificate = $files->store('physically_challenged_certificate');
			$data['physically_challenged_certificate']=$physically_challenged_certificate;	
		}
		
		if($request->hasFile('x_marksheet'))
		{
			$files = $request->file('x_marksheet');		
			$x_marksheet = $files->store('x_marksheet');
			$data['x_marksheet']=$x_marksheet;	
		}
		
		if($request->hasFile('xii_marksheet'))
		{
			$files = $request->file('xii_marksheet');		
			$xii_marksheet = $files->store('xii_marksheet');
			$data['xii_marksheet']=$xii_marksheet;	
		}
		
		if($request->hasFile('graduation_marksheet'))
		{
			$files = $request->file('graduation_marksheet');		
			$graduation_marksheet = $files->store('graduation_marksheet');
			$data['graduation_marksheet']=$graduation_marksheet;	
		}
		
		if($request->hasFile('post_graduation_marksheet'))
		{
			$files = $request->file('post_graduation_marksheet');		
			$post_graduation_marksheet = $files->store('post_graduation_marksheet');
			$data['post_graduation_marksheet']=$post_graduation_marksheet;	
		}
		
		$data=request()->except(['_token','dd','mm','yy','waiver_amt','fees_head_name','actual_amt','pay_amt','due_amt','fdd','fyy','passport_photo','signature']);
		//dd($data);	
		$data['dob']=$dob;
		//dd($data);
		$universityStudentAdmission->create($data);
		
		$i=0;
		 
		foreach($request->fees_head_name as $fees_head_name)
		{
			$fee_details['application_no']=$request->application_no;
			$fee_details['enrollment_no']=$request->enrollment_no;
			$fee_details['fees_head_name']=$request->fees_head_name[$i];
			$fee_details['actual_amt']=$request->actual_amt[$i];
			$fee_details['waiver_amt']=$request->waiver_amt[$i];
			$fee_details['pay_amt']=$request->pay_amt[$i];
			$fee_details['due_amt']=$request->due_amt[$i];
			$fee_details['month']=$request->fdd[$i];
			$fee_details['year']=$request->fyy[$i];
			
			$universityFeesDetails->create($fee_details);
			$i++;
		}
		
		
		
		Session::flash('message','Student Admission Information Successfully Saved.');
		return redirect('sms/admission/vw-admission');
	}
	
	/*
	public function formAdmissionRice()
	{
		//return view('sms/admission/new-admission-rice');
	}
	*/
	
	public function saveAdmissionRice(Request $request)
	{
		//dd($request->all());
		$data=DB::Table('institute_wise_configuration')
		->leftJoin('institute','institute_wise_configuration.institute_code','=','institute.institute_code')
		->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
		->leftJoin('course','institute_wise_configuration.course_code','=','course.course_code')
		->where('institute_wise_configuration.status','=','active')
		->where('institute_wise_configuration.institute_code','=',$request->institute_code)
		->where('institute_wise_configuration.faculty_id','=',$request->faculty_id)
		->where('institute_wise_configuration.course_code','=',$request->course_code)
		->where('institute_wise_configuration.faculty_id','<>','')
		->groupBy('institute_wise_configuration.faculty_id')->get()->first();
		$data->session=$request->session;
		//dd($data);
		
		return view('sms/admission/new-admission-rice', compact('data'));
	}
	
	public function viewAdmissionFormRice()
	{
		return view('sms/admission/new-admission-rice', compact('data'));
	} 
		
	public function saveAdmissionFormRice(Request $request)
	{
		//dd($request->all());	
		$data=request()->except(['_token','dd','mm','yy','waiver_amt','fees_head_name','actual_amt','pay_amt','due_amt','fdd','fyy','passport_photo','x_marksheet','xii_marksheet','graduation_marksheet','post_graduation_marksheet']);
		//dd($data);
		$dob=$request->dd.'-'.$request->mm.'-'.$request->yy;
		$riceStudentAdmission=new RiceStudentAdmission();
		$riceFeesDetails=new RiceFeesDetails();
		
		if($request->hasFile('passport_photo'))
		{
			$files = $request->file('passport_photo');		
			$passport_photo = $files->store('rice/passport_photo');
			$data['passport_photo']=$passport_photo;
			//dd($data);
		}
				
		if($request->hasFile('x_marksheet'))
		{
			$files = $request->file('x_marksheet');		
			$x_marksheet = $files->store('rice/x_marksheet');
			$data['x_marksheet']=$x_marksheet;	
		}
		
		if($request->hasFile('xii_marksheet'))
		{
			$files = $request->file('xii_marksheet');		
			$xii_marksheet = $files->store('rice/xii_marksheet');
			$data['xii_marksheet']=$xii_marksheet;	
		}
		
		if($request->hasFile('graduation_marksheet'))
		{
			$files = $request->file('graduation_marksheet');		
			$graduation_marksheet = $files->store('rice/graduation_marksheet');
			$data['graduation_marksheet']=$graduation_marksheet;	
		}
		
		if($request->hasFile('post_graduation_marksheet'))
		{
			$files = $request->file('post_graduation_marksheet');		
			$post_graduation_marksheet = $files->store('rice/post_graduation_marksheet');
			$data['post_graduation_marksheet']=$post_graduation_marksheet;	
		}
		
			
		$data['dob']=$dob;
		//dd($data);
		$riceStudentAdmission->create($data);
		
		$i=0;
		
		if($request->fees_head_name)
		{
			foreach($request->fees_head_name as $fees_head_name)
			{
				$fee_details['application_no']=$request->application_no;
				$fee_details['enrollment_no']=$request->enrollment_no;
				$fee_details['fees_head_name']=$request->fees_head_name[$i];
				$fee_details['actual_amt']=$request->actual_amt[$i];
				$fee_details['waiver_amt']=$request->waiver_amt[$i];
				$fee_details['pay_amt']=$request->pay_amt[$i];
				$fee_details['due_amt']=$request->due_amt[$i];
				$fee_details['month']=$request->fdd[$i];
				$fee_details['year']=$request->fyy[$i];
				
				$riceFeesDetails->create($fee_details);
				$i++;
			}	
		}
		
		Session::flash('message','Student Admission Information Successfully Saved.');
		return redirect('sms/admission/vw-admission');
	}
	
	public function formAdmissionSchool()
	{
		//return view('sms/admission/new-admission-school', compact('data'));
	}
	
	public function saveAdmissionSchool(Request $request)
	{
		//dd($request->all());
		//DB::enableQueryLog();
		$data=DB::Table('institute_wise_configuration')
		->leftJoin('institute','institute_wise_configuration.institute_code','=','institute.institute_code')
		->leftJoin('class','institute_wise_configuration.class_code','=','class.class_code')
		->where('institute_wise_configuration.status','=','active')
		->where('institute_wise_configuration.institute_code','=',$request->institute_code)
		->where('institute_wise_configuration.class_code','=',$request->class_code)
		->get()->first();
		
		//echo $request->session;		
		//dd(DB::getQueryLog());
		
		//dd($data);
		$data->session=$request->session;
		
		return view('sms/admission/new-admission-school', compact('data'));
		
	}
	
	public function saveAdmissionFormSchool(Request $request)
	{
		//dd($request->all());		
		$dob=$request->dd.'-'.$request->mm.'-'.$request->yy;
		$riceStudentAdmission=new RiceStudentAdmission();
		$riceFeesDetails=new RiceFeesDetails();
		
		if($request->hasFile('passport_photo'))
		{
			$files = $request->file('passport_photo');		
			$passport_photo = $files->store('passport_photo');
			$data['passport_photo']=$passport_photo;
			//dd($data);
		}
		//echo $files;
		
		if($request->hasFile('signature'))
		{
			$files = $request->file('signature');		
			$signature = $files->store('signature');
			$data['signature']=$signature;	
		}
		
		//dd($data);
		if($request->hasFile('adhaar_card'))
		{
			$files = $request->file('adhaar_card');		
			$adhaar_card = $files->store('adhaar_card');
			$data['adhaar_card']=$adhaar_card;	
		}
		
		if($request->hasFile('voter_card'))
		{
			$files = $request->file('voter_card');		
			$voter_card = $files->store('voter_card');
			$data['voter_card']=$voter_card;	
		}
		
		if($request->hasFile('caste_certificate'))
		{
			$files = $request->file('caste_certificate');		
			$caste_certificate = $files->store('caste_certificate');
			$data['caste_certificate']=$caste_certificate;	
		}
		
		if($request->hasFile('physically_challenged_certificate'))
		{
			$files = $request->file('physically_challenged_certificate');		
			$physically_challenged_certificate = $files->store('physically_challenged_certificate');
			$data['physically_challenged_certificate']=$physically_challenged_certificate;	
		}
		
		if($request->hasFile('x_marksheet'))
		{
			$files = $request->file('x_marksheet');		
			$x_marksheet = $files->store('x_marksheet');
			$data['x_marksheet']=$x_marksheet;	
		}
		
		if($request->hasFile('xii_marksheet'))
		{
			$files = $request->file('xii_marksheet');		
			$xii_marksheet = $files->store('xii_marksheet');
			$data['xii_marksheet']=$xii_marksheet;	
		}
		
		if($request->hasFile('graduation_marksheet'))
		{
			$files = $request->file('graduation_marksheet');		
			$graduation_marksheet = $files->store('graduation_marksheet');
			$data['graduation_marksheet']=$graduation_marksheet;	
		}
		
		if($request->hasFile('post_graduation_marksheet'))
		{
			$files = $request->file('post_graduation_marksheet');		
			$post_graduation_marksheet = $files->store('post_graduation_marksheet');
			$data['post_graduation_marksheet']=$post_graduation_marksheet;	
		}
		
		$data=request()->except(['_token','dd','mm','yy','waiver_amt','fees_head_name','actual_amt','pay_amt','due_amt','fdd','fyy','passport_photo','signature']);
		//dd($data);	
		$data['dob']=$dob;
		//dd($data);
		$universityStudentAdmission->create($data);
		
		$i=0;
		 
		foreach($request->fees_head_name as $fees_head_name)
		{
			$fee_details['application_no']=$request->application_no;
			$fee_details['enrollment_no']=$request->enrollment_no;
			$fee_details['fees_head_name']=$request->fees_head_name[$i];
			$fee_details['actual_amt']=$request->actual_amt[$i];
			$fee_details['waiver_amt']=$request->waiver_amt[$i];
			$fee_details['pay_amt']=$request->pay_amt[$i];
			$fee_details['due_amt']=$request->due_amt[$i];
			$fee_details['month']=$request->fdd[$i];
			$fee_details['year']=$request->fyy[$i];
			
			$riceFeesDetails->create($fee_details);
			$i++;
		}
		
		Session::flash('message','Student Admission Information Successfully Saved.');
		return redirect('sms/admission/vw-admission');
	}
}

