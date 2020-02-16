<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Hostel;
use Validator;
use Session;

class HostelController extends Controller
{
    //
	public function getHostel()
	{
		$hostel_rs=Hostel::get();
		return view('masters/view-hostel',compact('hostel_rs'));
	}
	
	public function viewHostel()
	{
		return view('masters/hostel');
	}
	
	public function saveHostel(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'hostel_code'=>'required|unique:hostel',
		'hostel_name'=>'required',
		'no_of_rooms'=>'required',
		'hostel_capacity'=>'required',
		'hostel_status'=>'required'
		
		],
		[
		'hostel_code.required'=>'Hostel Code Required',
		'hostel_code.unique'=>'Hostel Code already exists',
		'no_of_rooms.required'=>'No of Rooms Required',
		'hostel_status.required'=>'Hostel Status Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/hostel')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$hostel=new Hostel();
		$hostel->create($data);
		Session::flash('message','Hostel Information Successfully Saved.');
		return redirect('masters/vw-hostel');
	}
}
