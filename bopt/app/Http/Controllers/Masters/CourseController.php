<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Branch;
use Validator;
use Session;
use App\Model\Masters\Course;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
	public function getCourse()
	{
		$course_rs=DB::Table('course')
		->leftJoin('institute','course.institute_code','=','institute.institute_code')
		->leftJoin('branch','course.location_code','=','branch.branch_code')
		->leftJoin('faculty','course.school_code','=','faculty.faculty_id')
		->where('course_status','=','active')
		->select('course.*','branch.branch_name','institute.institute_name', 'faculty.faculty_name')->get();
		
		return view('masters/view-course',compact('course_rs'));
	}
	
	public function viewFormCourse()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		$location_rs=Branch::where('branch_status','=','active')->get();
		return view('masters/course',compact('institute_rs', 'location_rs'));
	}
	
	public function saveCourse(Request $request)
	{	
		/*
		$institute_code=$request->institute_code;
		$faculty_id=$request->faculty_id;
		$faculty_name=$request->faculty_name;
				
		$validator=Validator::make($request->all(),[
		'institute_code'=>[	'required',
							Rule::unique('faculty')->where(function ($query) use($institute_code, $faculty_id, $faculty_name) {
							return $query->where('institute_code', $institute_code)
							->where('faculty_id', $faculty_id)
							->where('faculty_name', $faculty_name);
						}),
					],
		'faculty_id'=>'required',
		'location_code'=>'required',
		'faculty_name'=>'required',
		'faculty_status'=>'required'
		],
		[
		'institute_code.required'=>'Institute Name Required',
		'faculty_id.required'=>'School ID Required',
		'location_code.required'=>'Location Name Required',
		'institute_code.unique'=>'Institute Name, School Code, School Name already exists',
		'faculty_status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-new-faculty')->withErrors($validator)->withInput();
			
		}
		
		$data = $request->all();
		*/
		
		$course_id=0;
		$course_rs=Course::all()->last();
	
		if(!empty($course_rs))
		{
			$course_id=$course_rs->id;
			$k=$course_id+1;
			if($k<10)
			{
				$course_code='C-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$course_code='C-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$course_id+1;
			
			if($k<10)
			{
				$course_code='C-'.date('Y').'-0'.$k;
			}
		}
		
		$data=request()->except(['_token']);
		
		Session::flash('message','Add Course Information.');
		if(!empty($request->institute_code))
		{
			$data['course_code']=$course_code;
			//dd($data);
			$course=new Course();
			$course->create($data);
			
			Session::flash('message','Course Information Successfully Saved.');
			return redirect('masters/vw-course');
		}
		return redirect('masters/course');
	}
}
