<?php
namespace App;
namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use view;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Grade;
use App\Company;
use App\Employee;
use App\UploadAttendenceModel;
use App\LatePolicy;
use DateTime;

class LatePolicyController extends Controller
{
    //
	public function viewLatePolicy()
	{
		$result='';
		$company_rs=Company::where('company_status','=','active')->get();	
		
		return view('attendance/late-policy', compact('company_rs','result'));
	}
	
	public function saveLatePolicy(Request $request)
	{
		$validator = Validator::make($request->all(), 
		[
		'company_id' => 'required',
		'grade_id' => 'required',
		'shift_id' => 'required',
		'max_grace_period' => 'required',
		'no_day_allow' => 'required',
		'no_day_salary_deducted' =>'required'
        ],
		[		
		 'shift_id.required'=>'Shift Name Required',
		 'no_day_allow.required'=>'No of Day Required',
		 'no_day_salary_deducted.required'=>'No of day Salary Deducted Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/late-policy')->withErrors($validator)->withInput();
		}
		
		$late_policy=new LatePolicy();
		$data = request()->except(['_token']);
		$late_policy->create($data);			
		
		return redirect('attendance/vw-late-policy');
	}
			
	public function getLatePolicy()
	{
		//DB::enableQueryLog();
		
		$late_policy_rs=DB::Table('late_policy')
		->leftJoin('company','late_policy.company_id','=','company.id')
		->leftJoin('grade','late_policy.grade_id','=','grade.id')
		->leftJoin('shift_management','late_policy.shift_id','=','shift_management.shift_id')
		->select('late_policy.*','company.company_name','grade.grade_name','shift_management.shift_name')
		->get();
		//dd(DB::getQueryLog());
		//dd($late_policy_rs);
		return view('attendance/view-late-policy', compact('late_policy_rs'));
	}
	
	
	
}
