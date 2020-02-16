<?php

namespace App\Http\Controllers\SMS\RoomManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Room\RoomType;

use Session;
use Validator;
//use App\Model\Room\RoomConfig;

class RoomTypeController extends Controller
{
	public function getRoomType()
	{
		$room_type_rs=RoomType::where('room_type_status','=','active')->get();
		return view('sms/room-management/view-room-type', compact('room_type_rs'));
	}
	
	public function formRoomType()
	{
		return view('sms/room-management/room-type', compact('room_type_name'));
	}
	
	public function saveRoomType(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'room_type_code'=>'required',
		'room_type_name'=>'required',
		'room_type_status'=>'required'
		]);
		
		if($validator->fails())
		{
			return redirect('sms/room-management/room-type')->withErrors($validator)->withInput();			
		}		
		
		$data=request()->except(['_token']);
		//dd($data);
		$roomType=new RoomType();		
		$roomType->create($data);
		
		Session::flash('message','Room Type Successfully Saved.');
		return redirect('sms/room-management/vw-room-type');
	
	}
	
	
}
