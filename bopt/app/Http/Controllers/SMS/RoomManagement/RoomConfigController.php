<?php

namespace App\Http\Controllers\SMS\RoomManagement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use App\Model\Masters\Subject;
use App\Model\Masters\Classes;
use App\Model\Masters\Room;
use App\Model\Admission\Batch;
use App\Model\Room\RoomConfig;
use App\Model\Masters\SubjectConfig;
use Session;
use Validator;
//use App\Model\Room\RoomConfig;

class RoomConfigController extends Controller
{
	public function getRoomConfig()
	{
		$room_config_rs = DB::Table('room_config')
		->leftJoin('institute','room_config.institute_code','=','institute.institute_code')
		->leftJoin('faculty','room_config.faculty_id','=','faculty.faculty_id')
		->leftJoin('course','room_config.course_code','=','course.course_code')
		->leftJoin('class','room_config.class_code','=','class.class_code')
		->leftJoin('subject','room_config.subject_code','=','subject.subject_code')
		->leftJoin('room','room_config.room_code','=','room.room_code')
		->where('room_config.room_config_status','=','active')->get();
		return view('sms/room-management/view-room-management', compact('room_config_rs'));
	}
	
	public function formRoomConfig()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		return view('sms/room-management/room-config', compact('institute_rs'));
	}
	
	public function saveFormRoomConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required'		
		],
		[
		'institute_code.required'=>'Institute Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/room-management/room-config')->withErrors($validator)->withInput();			
		}		
		
		$institute_code=$request->institute_code;
		$institute_name=$request->institute_name;
		
		//echo $institute_code."-".$institute_name; die;
		$institute_name_arr=array('University','university','UNIVERSITY','Rice','rice','RICE');
		$contains_university = str_contains($institute_name, $institute_name_arr);
		
		/*
		$rice_institute_name_arr=array('Rice','rice','RICE');
		$contains_rice = str_contains($institute_name, $rice_institute_name_arr);
		*/
		
		$school_name_arr=array('School','school','SCHOOL');
		$contains_school = str_contains($institute_name, $school_name_arr);
		
		$faculty_rs=DB::Table('institute_wise_configuration')
		->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
		->where('institute_wise_configuration.status','=','active')
		->where('institute_wise_configuration.institute_code','=',$institute_code)
		->where('institute_wise_configuration.faculty_id','<>','')
		->groupBy('institute_wise_configuration.faculty_id')->get();
		
		$room_rs=Room::where('room_status','=','active')->get();
		
		$batch_rs=Batch::where('institute_name','=',$institute_name)->where('status','=','active')->get();
		$class_rs=Classes::where('class_status','=','active')->get();
		
		//dd($batch_rs);
		if($contains_university)
		{
			return view('sms/room-management/room-config-institute',compact('institute_code','faculty_rs','room_rs'));
		}
						
		if($contains_school)
		{
			return view('sms/room-management/room-config-school',compact('institute_code','class_rs','room_rs'));
		}
	}
	
	/*
	public function getFormRoomConfigInstitute()
	{
		return view('sms/room-management/room-config-institute',compact('institute_code','faculty_rs','room_rs'));
	}
	*/
	
	public function saveFormRoomConfigInstitute(Request $request)
	{
		//dd($request->all());
		/*
		$validator=Validator::make($request->all(),[
		'batch_id'=>'required',
		'batch_name'=>'required',
		'status'=>'required'		
		],
		[
		'batch_id.required'=>'Batch Id Required',
		'batch_name.required'=>'Batch Name Required',
		'status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('sms/room-management/room-config-institute')->withErrors($validator)->withInput();			
		}
		*/
		
		$data=request()->except(['_token']);
		//dd($data);
		$roomConfig=new RoomConfig();
		
		$roomConfig->create($data);
		
		Session::flash('message','Room Allocation Successfully Saved.');
		return redirect('sms/room-management/vw-room-management');
	}
	
	public function saveFormRoomConfigSchool(Request $request)
	{
		//dd($request->all());
		/*
		$validator=Validator::make($request->all(),[
		'batch_id'=>'required',
		'batch_name'=>'required',
		'status'=>'required'		
		],
		[
		'batch_id.required'=>'Batch Id Required',
		'batch_name.required'=>'Batch Name Required',
		'status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('sms/room-management/room-config-institute')->withErrors($validator)->withInput();			
		}
		*/
		
		$data=request()->except(['_token']);
		//dd($data);
		$roomConfig=new RoomConfig();
		
		$roomConfig->create($data);
		
		Session::flash('message','Room Allocation Successfully Saved.');
		return redirect('sms/room-management/vw-room-management');
	}
}
