<?php

namespace App\Http\Controllers\SMS\RoutineManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Routine\Semester;
use Session;
use Validator;

class SemesterController extends Controller
{
	public function getSemester()
	{
		$semester_rs=Semester::get();
		return view('sms/routine-management/view-semester', compact('semester_rs'));
	}
	
	public function formSemester()
	{		
		return view('sms/routine-management/semester');
	}
	
	public function saveSemester(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'semester_name'=>'required|unique:semester',
		'semester_status'=>'required'
		],
		[
		'semester_name.required'=>'Semester Name Required',
		'semester_status.required'=>'Semester Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/routine-management/semester')->withErrors($validator)->withInput();			
		}		
		
		
		$room_id=0;
		$semester_rs=Semester::all()->last();
		
		if(!empty($semester_rs))
		{
			$semester_id=$semester_rs->id;
			$k=$semester_id+1;
			if($k<10)
			{
				$semester_code='S-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$semester_code='S-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$semester_id+1;
			
			if($k<10)
			{
				$semester_code='S-'.date('Y').'-0'.$k;
			}
		}
		
		
		$data=request()->except(['_token']);
		//dd($data);
		$semester=new Semester();
		
		$data['semester_code']=$semester_code;
		
		$semester->create($data);
		
		Session::flash('message','Semester Information Successfully Saved.');
		return redirect('sms/routine-management/vw-semester');
	}
	
	
}
