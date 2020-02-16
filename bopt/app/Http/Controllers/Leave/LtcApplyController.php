<?php
namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LtcApplyModel;
use App\Employee;
use Validator;
use Session;
use View;
use Auth;
class LtcApplyController extends Controller
{
	/*public function viewltcapplication()
	{
		$tour_apply_rs = LtcApplyModel::all();

		return view('leave/ltc-application', compact('tour_apply_rs'));
	}*/

	public function viewLtcApplicationById($tour_id)
	{
		$data['tour_apply'] = LtcApplyModel::find($tour_id);

		return view('leave/apply-for-ltc', $data);
	}
	
	public function viewApplyltcapplication()
	{
		return view('leave/apply-for-ltc');
	}
	
	public function saveApplyltcapplication(Request $request)
	{
		$emp_id=Auth::user()->employee_id;

		$report_auth = Employee::where('emp_code', $emp_id)->first();
		
		$report_auth_name = $report_auth->emp_reporting_auth;

		$lv_sanc_auth = $report_auth->emp_lv_sanc_auth;
		
		$validator=Validator::make($request->all(),[
		'duration'=>'required',
		'from_date'=>'required',
		'to_date'=>'required',
		'purpose'=>'required'
		],
		[
		'duration.required'=>'Duration Of Leave Required',
		'from_date.required'=>'From Date Required',
		'to_date.required'=>'To Date Required',
		'purpose'=>'Purpose Of Leave Required'
		]);
		
		if($validator->fails())
		{
			return redirect('leave/dashboard')->withErrors($validator)->withInput();
		}
		
		$data=array(
          'apply_date'=>$request->apply_date,
          'employee_code'=>$emp_id,
          'emp_reporting_auth'=> $report_auth_name,
		  'emp_sanctioning_auth'=> '',
		  'emp_lv_sanc_auth' => '',
          'from_date'=>$request->from_date,
          'to_date'=>$request->to_date,
          'duration'=>$request->duration,
          'purpose'=>$request->purpose,
          'ltc_status'=>"NOT APPROVED"
        ); 

		$data['employee_code']=$emp_id;
		
	
		if(!empty($request->id)){

			DB::table('ltc_apply')
            ->where('id', $request->id)
            ->update($data);

		}else{
			$tour_apply=new LtcApplyModel();
		    $tour_apply->create($data);
		}
	
		Session::flash('message','Ltc Apply Successfully Saved.');
		return redirect('leave/dashboard');
	}
}
