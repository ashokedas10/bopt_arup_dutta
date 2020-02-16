<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\Room;
use App\Model\Masters\Accessories;
use App\Model\Room\RoomType;
use Validator;
use Session;

class RoomController extends Controller
{
    //
	public function getRoom()
	{
		$room_rs = DB::Table('room') 
					->leftJoin('room_type','room.room_type_code','=','room_type.room_type_code')
					->leftJoin('accessories','room.accessories_code','=','accessories.accessories_code')					
					->where('room.room_status','=','active')
					->select('room.*','accessories.accessories_name','room_type.room_type_name')
					->get();
		return view('masters/view-room',compact('room_rs'));
	}
	
	public function viewFormRoom()
	{
		$accessories_rs=Accessories::where('accessories_status','=','active')->get();
		$room_type_rs=RoomType::where('room_type_status','=','active')->get();
		return view('masters/room',compact('accessories_rs','room_type_rs'));
	}
	
	public function saveRoom(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'room_code'=>'required|unique:room',
		'room_number'=>'required',
		'location'=>'required',
		'building_no'=>'required',
		'floor_no'=>'required',
		'room_type_code'=>'required',
		'accessories_code'=>'required',
		'room_capacity'=>'required'
		
		],
		[
		'room_code.required'=>'Room Code Required',
		'room_code.unique'=>'Room Code already exists',
		'room_type_code.required'=>'Room Type Required',
		'accessories_code.required'=>'Accessories Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/room')->withErrors($validator)->withInput();			
		}
		
		/*
		$room_id=0;
		$room_rs=Room::all()->last();
		
		//dd($branch_rs);
		if(!empty($room_rs))
		{
			$room_id=$room_rs->id;
			$k=$room_id+1;
			if($k<10)
			{
				$room_code='R-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$room_code='R-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$room_id+1;
			
			if($k<10)
			{
				$room_code='R-'.date('Y').'-0'.$k;
			}
		}
		*/
		
		$data = $request->all();
		$data=request()->except(['_token','accessories_code']);
		$room=new Room();
		//dd($request->all());
		foreach($request->accessories_code as $accessories_code)
		{
			$data['accessories_code']=$accessories_code;
			$room->create($data);	
		}
		
		//dd($data);		
		Session::flash('message','Room Information Successfully Saved.');
		return redirect('masters/vw-room');
	}
}
