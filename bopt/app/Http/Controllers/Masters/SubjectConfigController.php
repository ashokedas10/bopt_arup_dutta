<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\SubjectConfig;
use App\Model\Masters\InstituteWiseConfig;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use App\Model\Masters\Subject;
use Validator;
use Session;

class SubjectConfigController extends Controller
{
    //
	public function getSubjectConfig()
	{
		$subject_config_rs = DB::Table('subject_configuration') 
							->leftJoin('institute','subject_configuration.institute_code','=','institute.institute_code')
							->leftJoin('faculty','subject_configuration.faculty_id','=','faculty.faculty_id')
							->leftJoin('class','subject_configuration.class_code','=','class.class_code')
							->leftJoin('institute_wise_configuration','subject_configuration.course_code','=','institute_wise_configuration.course_code')
							->leftJoin('branch','institute_wise_configuration.rice_branch_code','=','branch.branch_code')
							->select('subject_configuration.*','institute.institute_name','faculty.faculty_name','institute_wise_configuration.course_name','branch.branch_name','class.class_name')
							->get();
		//dd($subject_config_rs);
		return view('masters/subject-configuration', compact('subject_config_rs'));
	}
	
	public function viewSubjectConfig()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		//$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		//$course_rs=Course::where('course_status','=','active')->get();
		//$subject_rs=Subject::where('subject_status','=','active')->get();
		return view('masters/add-sub-config',compact('institute_rs'));
	}
	
	public function saveSubjectConfig(Request $request)
	{
		/*$validator=Validator::make($request->all(),[
		'institute_id'=>'required'
		],
		[
		'institute_id.required'=>'Institute Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-sub-config')->withErrors($validator)->withInput();
			
		}*/
		$ins_id = $request->institute_code;
		$ins_name = $request->institute_name;
		$ins_code = $request->institute_code;
		$ins_rice = Institute::where('institute_code','=',$ins_code)->select('institute_name')->get()->first();
		$rice_arr = array('RICE','rice','Rice');
		$contains_rice = str_contains($ins_rice, $rice_arr);
		if($contains_rice)
		{
		//$branch_rs=Branch::where('branch_status','=','active')->get();
		$branch_rs=DB::Table('institute_wise_configuration')
					->leftJoin('branch','institute_wise_configuration.rice_branch_code','=','branch.branch_code')
					->where('institute_wise_configuration.institute_code','=',$ins_id)
					->groupBy('institute_wise_configuration.rice_branch_code')
					->select('institute_wise_configuration.rice_branch_code','branch.branch_name','branch.branch_code')
					->get();
		}
		else
		{
		$faculty_rs=DB::Table('institute_wise_configuration')
					->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
					->where('institute_wise_configuration.institute_code','=',$ins_id)
					->groupBy('institute_wise_configuration.faculty_id')
					->select('institute_wise_configuration.faculty_id','faculty.faculty_name')
					->get();
		}
		//$course_rs=Course::where('course_status','=','active')->get();
		$class_rs=DB::Table('institute_wise_configuration')
				->leftJoin('class','institute_wise_configuration.class_code','=','class.class_code')
				->where('institute_wise_configuration.institute_code','=',$ins_id)
				->select('institute_wise_configuration.class_code','class.class_name')
				->get();
		$subject_rs=Subject::where('subject_status','=','active')->get();
		$institute_name_arr=array('University','university','UNIVERSITY','RICE','rice','Rice');
		$contains = str_contains($ins_name, $institute_name_arr);
		//echo $contains;die;
		if(!empty($contains))
		{
			//echo "test1";
			return view('masters/add-sub-config-next', compact('faculty_rs','branch_rs','course_rs','subject_rs','ins_name','ins_code'));
		}
		else
		{
			//echo "test2";die;
			return view('masters/add-sub-config-ais-next',compact('ins_code','ins_name','class_rs','subject_rs'));
		}
		
	}
	public function viewSubjectNextConfig(Request $request)
	{
		$data = $request->all();
		//dd($data);
		$data=request()->except(['_token','subject_code']);
		//$tot_sub=count($request->subject_code);
		$subjectconfig=new SubjectConfig();
		$last_id=SubjectConfig::orderBy('id', 'desc')->select('id')->get()->first();
		if($last_id == '')
		{
		$id=1;
		}
		else
		{
		$id=$last_id->id+1;
		}
		$subject_code=$request->institute_code."-S".$id;
		//for($i=0;$i<$tot_sub;$i++)
		//{
			$data['subject_code'] = $subject_code;//dd($data);
			$subjectconfig->create($data);
		//}
		
		Session::flash('message','Subject Configuration Information Successfully Saved.');
		return redirect('masters/subject-configuration');
	}
}
