<?php
namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Subject;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Branch;
use Validator;
use Session;
use App\Model\Masters\Course;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //
	public function getSubject()
	{
		$subject_rs=DB::Table('subject')
		->leftJoin('institute','subject.institute_code','=','institute.institute_code')
		->leftJoin('branch','subject.location_code','=','branch.branch_code')
		->leftJoin('faculty','subject.school_code','=','faculty.faculty_id')
		->where('subject_status','=','active')
		->select('subject.*','branch.branch_name','institute.institute_name', 'faculty.faculty_name')->get();
		return view('masters/view-subject',compact('subject_rs'));
	}
	
	public function viewFormSubject()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		$location_rs=Branch::where('branch_status','=','active')->get();
		return view('masters/subject',compact('institute_rs', 'location_rs'));
	}
	
	public function saveSubject(Request $request)
	{
		/*
		$validator=Validator::make($request->all(),[
		'subject_code'=>'required|unique:subject',
		'subject_name'=>'required',
		'subject_status'=>'required'		
		],
		[
		'subject_code.required'=>'Subject Code Required',
		'subject_code.unique'=>'Subject Code already exists',
		'subject_name.required'=>'Subject Name Required',
		'subject_status.required'=>'Subject Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/subject')->withErrors($validator)->withInput();			
		}
		*/
		
		//$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$subject=new Subject();
		$subject->create($data);
		Session::flash('message','Subject Information Successfully Saved.');
		return redirect('masters/vw-subject');
	}
}
