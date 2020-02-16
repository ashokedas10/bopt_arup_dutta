<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\InstituteWiseConfig;
use App\Model\Masters\SubjectConfig;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use App\Branch;
use App\Model\Masters\Subject;
use App\Model\Masters\Classes;
use Validator;
use Session;

class InstituteWiseConfigController extends Controller
{
    //
	public function getInstituteWiseConfig()
	{
		$ins_config_rs = DB::Table('institute_wise_configuration') 
							->leftJoin('institute','institute_wise_configuration.institute_code','=','institute.institute_code')
							->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
							->leftJoin('branch','institute_wise_configuration.rice_branch_code','=','branch.branch_code')
							->leftJoin('class','institute_wise_configuration.class_code','=','class.class_code')
							
							->select('institute_wise_configuration.*','institute.institute_name','faculty.faculty_name','class.class_name','branch.branch_name')
							->get();
		
		return view('masters/institute-wise-config', compact('ins_config_rs'));
	}
	
	public function viewInstituteWiseConfig()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		/*$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		$course_rs=Course::where('course_status','=','active')->get();
		$subject_rs=Subject::where('subject_status','=','active')->get();*/
		return view('masters/add-inst-wise-config-au', compact('institute_rs'));
	}
	
	public function viewInstituteWisePageConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_name'=>'required'
		],
		[
		'institute_name.required'=>'Institute Required'
		]);
		if($validator->fails())
		{
			return redirect('masters/add-inst-wise-config-au')->withErrors($validator)->withInput();
			
		}
		$ins_name = $request->institute_name;
		$ins_code = $request->institute_code;
		$ins_rice = Institute::where('institute_code','=',$ins_code)->select('institute_name')->get()->first();
		$rice_arr = array('RICE','rice','Rice');
		$contains_rice = str_contains($ins_rice, $rice_arr);
		if($contains_rice)
		{
		$branch_rs=Branch::where('branch_status','=','active')->get();
		}
		else
		{
		$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		}
		$course_rs=Course::where('course_status','=','active')->get();
		$class_rs=Classes::where('class_status','=','active')->get();
		
		$institute_name_arr=array('University','university','UNIVERSITY','RICE','rice','Rice');
		$contains = str_contains($ins_name, $institute_name_arr);
		
		
		if($contains)
		{
			
			return view('masters/add-inst-wise-config-au-next', compact('faculty_rs','branch_rs','course_rs','ins_name','ins_code'));
		}
		else
		{
			return view('masters/add-inst-wise-config-ais-next',compact('ins_code','ins_name','class_rs'));
		}
		
	}
	
	public function saveInstituteWisePageConfig(Request $request)
	{
		
		/*$validator=Validator::make($request->all(),[
		'faculty_id'=>'required',
		'course_code'=>'required',
		'status'=>'required'
		],
		[
		'faculty_id.unique'=>'Faculty Required',
		'course_code.required'=>'Course Required',
		'status.unique'=>'Status required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-inst-wise-config-au-next')->withErrors($validator)->withInput();
			
		}*/
		
		
		$data = $request->all();
		$data=request()->except(['_token','course_code']);
		//$tot_course=count($request->course_code);
		$institutewiseconfig=new InstituteWiseConfig();
		$institute_code=$request->institute_code;
		$last_id=InstituteWiseConfig::orderBy('id', 'desc')->select('id')->get()->first();
		if($last_id == '')
		{
		$id=1;
		}
		else
		{
		$id=$last_id->id+1;
		}
		$course_code=$institute_code."-C".$id;
		//for($i=0;$i<$tot_course;$i++)
		//{
			$data['course_code'] = $course_code;//dd($data);
			$institutewiseconfig->create($data);
		//}
		
		Session::flash('message','Course Configuration Information Successfully Saved.');
		return redirect('masters/institute-wise-config');
	}
	
	public function saveSchoolWisePageConfig(Request $request)
	{
		
		/*$validator=Validator::make($request->all(),[
		'faculty_id'=>'required',
		'course_code'=>'required',
		'status'=>'required'
		],
		[
		'faculty_id.unique'=>'Faculty Required',
		'course_code.required'=>'Course Required',
		'status.unique'=>'Status required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-inst-wise-config-au-next')->withErrors($validator)->withInput();
			
		}*/
		//echo "test";die;
		
		//$data = $request->all();
		//dd($data);
		$data=request()->except(['_token','class_code']);
		$tot_class=count($request->class_code);
		$institutewiseconfig=new InstituteWiseConfig();
		for($i=0;$i<$tot_class;$i++)
		{
			
			
			$data['class_code'] = $request->class_code[$i];
			$institutewiseconfig->create($data);
			
		
		}
		
		Session::flash('message','Institute Wise Configuration Information Successfully Saved.');
		return redirect('masters/institute-wise-config');
	}
}
