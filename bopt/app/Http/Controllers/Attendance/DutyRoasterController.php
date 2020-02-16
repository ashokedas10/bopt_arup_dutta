<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Grade;
use App\ShiftModel;
use App\DutyRoasterModel;
use App\DutyRoasterEmpWiseModel;
use Validator;
use Session;
use View;

class DutyRoasterController extends Controller
{
    //
	public function viewAddDutyRoaster()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();	
		$shift_rs=ShiftModel::all();
		
		return view('attendance/add-duty-roaster', compact('company_rs','shift_rs'));
	}
	public function saveDutyRoaster(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'grade_id'=>'required'
		
		],
		[
		'company_id.required'=>'Company Name Required',
		'grade_id.required'=>'Grade Name Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/add-duty-roaster')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		//$data=request()->except(['_token'],'shift_name');
		$data=request()->except(['_token','shift_id']);
		$shift_name_rs=$request->shift_name;
		$tot_shift=count($request->shift_id);
		//$data['shift_name']=implode(',',$shift_name_rs);
		//dd($data);
		$duty_roaster=new DutyRoasterModel();
		for($i=0;$i<$tot_shift;$i++)
		{
			$data['shift_id'] = $request->shift_id[$i]; 
			$duty_roaster->create($data);
		}
		Session::flash('message','Duty Roaster Information Successfully Saved.');
		return redirect('attendance/employee-duty-roaster');
	}
	/*public function viewGracePeriodDetails()
	{
		$grace_period_rs=DB::Table('grace_period')
		->leftJoin('company','grace_period.company_id','=','company.id')
		->leftJoin('grade','grace_period.grade_id','=','grade.id')
		->leftJoin('branch','grace_period.branch_id','=','branch.id')
		->select('grace_period.*','company.company_name','grade.grade_name','branch.branch_name')->get();
		
		return view('attendance/branch-grace-period', compact('grace_period_rs'));
	}*/
	public function viewAddDutyRoasterEmpWise()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();	
		$shift_rs=ShiftModel::all();
		
		return view('attendance/add-duty-roaster-emp-wise', compact('company_rs','shift_rs'));
	}
	public function saveDutyRoasterEmpWise(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'grade_id'=>'required',
		'employee_code'=>'required',
		'employee_name'=>'required'
		],
		[
		'company_id.required'=>'Company Name Required',
		'grade_id.required'=>'Grade Name Required',
		'employee_code.required'=>'Employee Code Required',
		'employee_name.required'=>'Employee Name Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/add-duty-roaster-emp-wise')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token','shift_id']);
		//$shift_name_rs=$request->shift_id;
		//$data['shift_id']=implode(',',$shift_name_rs);
		//dd($data);
		$duty_roaster_empwise=new DutyRoasterEmpWiseModel();
		$tot_shift=count($request->shift_id);
		//echo $request->shift_id[0];die;
		
		//dd($tot_shift);
		for($i=0;$i<$tot_shift;$i++)
		{
			$data['shift_id'] = $request->shift_id[$i]; 
			$duty_roaster_empwise->create($data);
		}
		Session::flash('message','Duty Roaster Employee Wise Information Successfully Saved.');
		return redirect('attendance/employee-duty-roaster');
	}
	public function viewDutyRoaster()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		$result = '';
		return View('attendance/employee-duty-roaster', compact('company_rs','result'));
	}
	public function viewDutyRoasterDetails(Request $request)
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'grade_id'=>'required'
		],
		[
		'company_id.required'=>'Company Name Required',
		'grade_id.required'=>'Grade Name Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/employee-duty-roaster')->withErrors($validator)->withInput();
			
		}
		DB::enableQueryLog();
		if($request->employee_code == '')
		{
		$duty_roaster_details_rs = DB::Table('duty_roaster_empwise')
								->leftJoin('shift_management','duty_roaster_empwise.shift_id','=','shift_management.shift_id')
								->leftJoin('company','duty_roaster_empwise.company_id','=','company.id')
								->leftJoin('grade','duty_roaster_empwise.grade_id','=','grade.id')
								->where('duty_roaster_empwise.company_id','=',$request->company_id)
								->where('duty_roaster_empwise.grade_id','=',$request->grade_id)
								->get();
		}
		else
		{
		$duty_roaster_details_rs = DB::Table('duty_roaster_empwise')
								->leftJoin('shift_management','duty_roaster_empwise.shift_id','=','shift_management.shift_id')
								->leftJoin('company','duty_roaster_empwise.company_id','=','company.id')
								->leftJoin('grade','duty_roaster_empwise.grade_id','=','grade.id')
								->where('duty_roaster_empwise.company_id','=',$request->company_id)
								->where('duty_roaster_empwise.grade_id','=',$request->grade_id)
								->where('duty_roaster_empwise.employee_code','=',$request->employee_code)
								->get();	
		}
		//dd(DB::getQueryLog());
		$result='';
		foreach($duty_roaster_details_rs as $duty_roaster_details)
		{
			$result .='<tr>
						<td>'.$duty_roaster_details->company_name.'</td>
						<td>'.$duty_roaster_details->grade_name.'</td>
						<td>'.$duty_roaster_details->employee_code.'</td>
						<td>'.$duty_roaster_details->shift_name.'</td>
						<td>'.$duty_roaster_details->shift_in_time.'</td>
						<td>'.$duty_roaster_details->shift_out_time.'</td>
						<td>'.$duty_roaster_details->recess_from_time.'</td>
						<td>'.$duty_roaster_details->recess_to_time.'</td>
						<td><a href="#"><i class="ti-pencil-alt"></i></i>&nbsp;&nbsp;<a href="#"><i class="ti-trash"></i></a></td>
                       </tr>';
		}
		
		return view('attendance/employee-duty-roaster', compact('result','company_rs'));
	}
}
