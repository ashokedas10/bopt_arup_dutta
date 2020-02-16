<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Grade;
use App\ShiftModel;
use App\Branch;
use App\GraceperiodModel;
use Validator;
use Session;
use View;

class GraceperiodController extends Controller
{
    //
	public function viewAddGracePeriod()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();	
		$shift_rs=ShiftModel::all();
		$branch_rs=Branch::where('branch_status','=','active')->select('id','branch_name')->get();
		return view('attendance/add-grace-period', compact('company_rs','shift_rs','branch_rs'));
	}
	public function saveAddGracePeriod(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'grade_id'=>'required',
		'branch_id'=>'required',
		'shift_name'=>'required',
		'shift_in_time'=>'required',
		'grace_period'=>'required|numeric'
		],
		[
		'company_id.required'=>'Company Name Required',
		'grade_id.required'=>'Grade Name Required',
		'branch_id.required'=>'Branch Name Required',
		'shift_name.required'=>'Shift Name Required',
		'shift_in_time.required'=>'Shift In Time Required',
		'grace_period.required'=>'Grace Period is Required',
		'grace_period.numeric'=>'Grace Period must be in number'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/add-grace-period')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		$graceperiod=new GraceperiodModel();
		$graceperiod->create($data);
		Session::flash('message','Grace period Information Successfully Saved.');
		return redirect('attendance/branch-grace-period');
	}
	public function viewGracePeriodDetails()
	{
		$grace_period_rs=DB::Table('grace_period')
		->leftJoin('company','grace_period.company_id','=','company.id')
		->leftJoin('grade','grace_period.grade_id','=','grade.id')
		->leftJoin('branch','grace_period.branch_id','=','branch.id')
		->select('grace_period.*','company.company_name','grade.grade_name','branch.branch_name')->get();
		
		return view('attendance/branch-grace-period', compact('grace_period_rs'));
	}
}
