<?php

namespace App\Http\Controllers\SMS\FeesManagement;

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
use Illuminate\Support\Facades\DB;

class FeesHeadConfigController extends Controller
{
	public function getFeesHeadConfig()
	{
		//$feesHead_rs=FeesHeadConfig::all();
		$feesHead_rs=DB::Table('fees_head_config')
		->leftJoin('institute','fees_head_config.institute_code','=','institute.institute_code')
		->leftJoin('faculty','fees_head_config.faculty_code','=','faculty.faculty_id')
		->leftJoin('branch','fees_head_config.branch_code','=','branch.branch_code')
		->leftJoin('class','fees_head_config.class_code','=','class.class_code')
		->leftJoin('institute_wise_configuration','fees_head_config.course_code','=','institute_wise_configuration.course_code')
		->leftJoin('fees_head','fees_head_config.fees_head_code','=','fees_head.fees_head_code')
		->get();
		
		return view('sms/fees-management/view-fees-head-config',compact('feesHead_rs'));
	}
	
	public function formFeesHeadConfig()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		return view('sms/fees-management/fees-head-config',compact('institute_rs'));
	}
	
	public function saveFeesHeadConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required'		
		],
		[
		'institute_code.required'=>'Institute Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/fees-head-config')->withErrors($validator)->withInput();			
		}		
		
		$institute_code=$request->institute_code;
		$institute_name=$request->institute_name;
		
		$institute_name_arr=array('University','university','UNIVERSITY','Rice','rice','RICE');
		$contains = str_contains($institute_name, $institute_name_arr);
		//$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		$ins_rice = Institute::where('institute_code','=',$institute_code)->select('institute_name')->get()->first();
		$rice_arr = array('RICE','rice','Rice');
		$contains_rice = str_contains($ins_rice, $rice_arr);
		if($contains_rice)
		{
		//$branch_rs=Branch::where('branch_status','=','active')->get();
		$branch_rs=DB::Table('institute_wise_configuration')
					->leftJoin('branch','institute_wise_configuration.rice_branch_code','=','branch.branch_code')
					->where('institute_wise_configuration.institute_code','=',$institute_code)
					->groupBy('institute_wise_configuration.rice_branch_code')
					->select('institute_wise_configuration.rice_branch_code','branch.branch_name','branch.branch_code')
					->get();
		}
		else
		{
		$faculty_rs=DB::Table('institute_wise_configuration')
					->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
					->where('institute_wise_configuration.institute_code','=',$institute_code)
					->groupBy('institute_wise_configuration.faculty_id')
					->select('institute_wise_configuration.faculty_id','faculty.faculty_name')
					->get();
		}
		$course_rs=Course::where('course_status','=','active')->get();
		$class_rs=Classes::where('class_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		
		if($contains)
		{
			return view('sms/fees-management/fees-head-university-config',compact('institute_code','faculty_rs','branch_rs','course_rs','fees_head_rs'));
		}
		else
		{
			return view('sms/fees-management/fees-head-school-config',compact('institute_code','class_rs','fees_head_rs'));
		}		
	}
	
	public function formFeesHeadSchoolConfig()
	{
		$class_rs=$institute_code=$fees_head_rs='';
		$class_rs=Classes::where('class_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		return view('sms/fees-management/fees-head-school-config',compact('institute_code','class_rs','fees_head_rs'));
	}
	
	
	
	public function saveFeesHeadSchoolConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'',
		'fees_head_code'=>'required',
		'class_code'=>'required',
		'fees_head_config_status'=>'required'		
		],
		[
		'fees_head_code.required'=>'Fees Name Required',
		'class_code.required'=>'Class Name Required',
		'fees_head_config_status.required'=>'Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/fees-head-school-config')->withErrors($validator)->withInput();			
		}
		//dd($request->all());
		$data=request()->except(['_token','fees_head_code']);
		
		if($request->institute_code <> null || $request->institute_code <> '')
		{
			$feesHeadConfig=new FeesHeadConfig();
			
			foreach($request->fees_head_code as $fees_head_code)
			{
				$data['fees_head_code']=$fees_head_code;
				$feesHeadConfig->create($data);
			}
			
			Session::flash('message','Fees Head Configuration Successfully Saved.');
			return redirect('sms/fees-management/view-fees-head-config');
		}
		else
		{
			return redirect('sms/fees-management/fees-head-config');
		}
	}
	
	public function formFeesHeadUniversityConfig()
	{
		$class_rs=$institute_code=$fees_head_rs='';
		$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		$course_rs=Course::where('course_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		return view('sms/fees-management/fees-head-university-config',compact('institute_code','faculty_rs','course_rs','fees_head_rs'));
	}
	
	public function saveFeesHeadUniversityConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'',
		'faculty_code'=>'required',
		'course_code'=>'required',
		'fees_head_code'=>'required',
		'fees_head_config_status'=>'required'		
		],
		[
		'faculty_code.required'=>'Faculty Name Required',
		'course_code.required'=>'Course Name Required',
		'fees_head_config_status.required'=>'Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/fees-head-university-config')->withErrors($validator)->withInput();			
		}
		//dd($request->all());
		$data=request()->except(['_token','fees_head_code']);
		
		if($request->institute_code <> null || $request->institute_code <> '')
		{
			$feesHeadConfig=new FeesHeadConfig();
			
			foreach($request->fees_head_code as $fees_head_code)
			{
				$data['fees_head_code']=$fees_head_code;
				$feesHeadConfig->create($data);
			}
			
			Session::flash('message','Fees Head Configuration Successfully Saved.');
			return redirect('sms/fees-management/view-fees-head-config');
		}
		else
		{
			return redirect('sms/fees-management/fees-head-config');
		}
	}
}
