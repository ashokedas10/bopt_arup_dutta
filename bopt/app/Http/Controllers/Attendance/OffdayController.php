<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OffdayModel;
use Validator;
use Session;
use View;

class OffdayController extends Controller
{
    //
	public function saveOffdayData(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'employee_code'=>'required|max:255',
		'employee_name'=>'required|max:255',
		'company_id'=>'required',
		'grade_id'=>'required'
		
		],
		[
		'employee_code.required'=>'Employee Code Required',
		'employee_name.required'=>'Employee Name Required',
		'company_id.required'=>'Company Id Required',
		'grade_id.required'=>'Grade Id Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/add-new-offday')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		/*dd($data);
		$sunday = $data['sunday'];
		if(!empty($sunday))
		{
			$data['sunday'] = 1;
		}
		else
		{
			$data['sunday'] = 0;
		}
		$monday = $data['monday'];
		if(!empty($monday))
		{
			$data['monday'] = 1;
		}
		else
		{
			$data['monday'] = 0;
		}
		$tuesday = $data['tuesday'];
		if(!empty($tuesday))
		{
			$data['tuesday'] = 1;
		}
		else
		{
			$data['tuesday'] = 0;
		}
		$wednesday = $data['wednesday'];
		if(!empty($wednesday))
		{
			$data['wednesday'] = 1;
		}
		else
		{
			$data['wednesday'] = 0;
		}
		$thursday = $data['thursday'];
		if(!empty($thursday))
		{
			$data['thursday'] = 1;
		}
		else
		{
			$data['thursday'] = 0;
		}
		$friday = $data['friday'];
		if(!empty($friday))
		{
			$data['friday'] = 1;
		}
		else
		{
			$data['friday'] = 0;
		}
		$saturday = $data['saturday'];
		if(!empty($saturday))
		{
			$data['saturday'] = 1;
		}
		else
		{
			$data['saturday'] = 0;
		}*/
		//dd($data);
		$data=request()->except(['_token']);
		$offday=new OffdayModel();
		$offday->create($data);
		Session::flash('message','Offday Information Successfully Saved.');
		return redirect('attendance/employee-offday');
		
	}
	public function viewOffday()
	{
		return View('attendance/add-new-offday');
	}
	public function viewOffdayDetails()
	{
		$offday_rs = OffdayModel::all();
		return View('attendance/employee-offday',compact('offday_rs'));
	}
}
