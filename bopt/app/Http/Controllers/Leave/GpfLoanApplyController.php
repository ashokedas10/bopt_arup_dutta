<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GpfLoanApplyModel;
use App\Employee;
use Validator;
use Session;
use Auth;
use DB;


class GpfLoanApplyController extends Controller
{
    public function viewLoanApply()
	{
        $emp_id=Auth::user()->employee_id;

        $fund_check = DB::table('gpf_details')->where('emp_code', $emp_id)->orderByDesc('id')->first();

        return view('loan/apply-for-gpf-loan', compact('fund_check'));
    }

    public function saveLoanApply(Request $request)
	{
        $loan_rs=GpfLoanApplyModel::orderBy('id', 'ASC')->first();
        // dd($loan_rs);

        if(!empty($loan_rs))
		{
            $loan_id=($loan_rs->id) + 1;

            $loan_apply_no = 'L-'.date('Y'). '-' .$loan_id;
        }
        else{
            $loan_apply_no = 'L-'.date('Y').'-1';
        }

		$emp_id=Auth::user()->employee_id;

		$report_auth = Employee::where('emp_code', $emp_id)->first();

		$report_auth_name = $report_auth->emp_reporting_auth;
		

		$lv_sanc_auth = $report_auth->emp_lv_sanc_auth;

		// $validator=Validator::make($request->all(),[
		// 'duration'=>'required',
		// 'from_date'=>'required',
		// 'to_date'=>'required',
		// 'purpose'=>'required'
		// ],
		// [
		// 'duration.required'=>'Duration Of Leave Required',
		// 'from_date.required'=>'From Date Required',
		// 'to_date.required'=>'To Date Required',
		// 'purpose'=>'Purpose Of Leave Required'
		// ]);

		// if($validator->fails())
		// {
		// 	return redirect('leave/apply-for-tour')->withErrors($validator)->withInput();
		// }

		$data = array(
          'apply_date'=>$request->from_date,
          'employee_code'=>$emp_id,
          'emp_reporting_auth'=> $report_auth_name,
		  'emp_sanctioning_auth'=> '',
          'emp_lv_sanc_auth' => '',
          'loan_applied_no' => $loan_apply_no,
          'loan_amount' => $request->loan_amt,
          'loan_type' => 'GPF',
          'purpose'=>$request->purpose,
          'loan_status'=> 'NOT APPROVED'
        );
		$data['loan_status']= "NOT APPROVED";
		$data['employee_code']=$emp_id;


        $loan_apply=new GpfLoanApplyModel();
        $loan_apply->create($data);

		Session::flash('message','Loan Applied Successfully.');
		return redirect('leave/dashboard');
    }

    
}
