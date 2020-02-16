<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Course;
use Validator;
use Session;

class CourseController extends Controller
{
    //
	public function getCourse()
	{
		$course_rs=Course::get();
		return view('masters/view-course',compact('course_rs'));
	}
	
	public function viewFormCourse()
	{
		return view('masters/course',compact('course_rs'));
	}
	
	public function saveCourse(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'course_code'=>'required|unique:course',
		'course_name'=>'required',
		'course_status'=>'required'
		
		],
		[
		'course_code.required'=>'Course Code Required',
		'course_code.unique'=>'Course Code already exists',
		'course_name.required'=>'Course Name Required',
		'course_status.required'=>'Course Status Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/course')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$course=new Course();
		$course->create($data);
		Session::flash('message','Course Information Successfully Saved.');
		return redirect('masters/vw-course');
	}
}
