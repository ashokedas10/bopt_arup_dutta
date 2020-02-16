<?php

namespace App\Http\Controllers\SMS\ExamManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Exam\ExamType;
use Session;
use Validator;
//use App\Model\Room\RoomConfig;

class ExamTypeController extends Controller
{
	public function getExamType()
	{
		$exam_type_rs=ExamType::get();
		return view('sms/exam-management/view-exam-type', compact('exam_type_rs'));
	}
	
	public function formExamType()
	{		
		return view('sms/exam-management/exam-type');
	}
	
	public function saveExamType(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'exam_type_name'=>'required|unique:exam_type',
		'exam_type_status'=>'required'
		],
		[
		'exam_type_name.required'=>'Exam Type Name Required',
		'exam_type_status.required'=>'Exam Type Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/exam-management/exam-type')->withErrors($validator)->withInput();			
		}

		$room_id=0;
		$exam_type_rs=ExamType::all()->last();
		
		if(!empty($exam_type_rs))
		{
			$exam_type_id=$exam_type_rs->id;
			$k=$exam_type_id+1;
			if($k<10)
			{
				$exam_type_code='ET-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$exam_type_code='ET-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$exam_type_id+1;
			
			if($k<10)
			{
				$exam_type_code='ET-'.date('Y').'-0'.$k;
			}
		}
		
		$data=request()->except(['_token']);
		//dd($data);
		$exam=new ExamType();
		
		$data['exam_type_code']=$exam_type_code;
		$exam->create($data);
		
		Session::flash('message','Exam Type Successfully Saved.');
		return redirect('sms/exam-management/vw-exam-type');
	}
	
	
}
