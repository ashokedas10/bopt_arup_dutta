<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ShiftModel;
use App\Company;
use App\Grade;
use Validator;
use Session;
use View;

class ShiftController extends Controller
{
    //
	public function addshift()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('attendance/add-shift', compact('company_rs'));
	}
	
	public function saveshiftdata(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required|max:255',
		'grade_id'=>'required|max:255',
		'shift_name'=>'required',
		'shift_description'=>'required',
		'shift_in_time'=>'required',
		'shift_out_time'=>'required',
		'recess_from_time'=>'required',
		'recess_to_time'=>'required'
		
		],
		[
		'company_id.required'=>'Company Name Required',
		'grade_id.required'=>'Grade Name Required',
		'shift_name.required'=>'Shift Name Required',
		'shift_description.required'=>'Shift description Required',
		'shift_in_time.required'=>'Shift in time Required',
		'shift_out_time.required'=>'Shift out time Required',
		'recess_from_time.required'=>'Recess from time Required',
		'recess_to_time.required'=>'Recess to time Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/add-shift')->withErrors($validator)->withInput();
			
		}
		
		$data=request()->except(['_token']);
		$shift=new ShiftModel();
		$shift->create($data);
		Session::flash('message','Shift Management Information Successfully Saved.');
		return redirect('attendance/shift-time');
		
	}
	
	public function getShiftData()
	{
		//$leave_rule_rs=LeaveRule::all();
		$shift_time_rs=DB::Table('shift_management')
		->leftJoin('company','shift_management.company_id','=','company.id')
		->leftJoin('grade','shift_management.grade_id','=','grade.id')
		->select('shift_management.*','company.company_name','grade.grade_name')->get();
		
		return view('attendance/shift-time', compact('shift_time_rs'));
	}
}
