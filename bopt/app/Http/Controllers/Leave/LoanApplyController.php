<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LoanApplyModel;
use App\LoanModel;
use Validator;
use Session;
use View;

class LoanApplyController extends Controller
{
    //
	public function viewLoanApplication()
	{
		$loan_rs = LoanApplyModel::get();
		return view('leave/view-loan', compact('loan_rs'));
	}
	public function viewApplyLoanapplication()
	{
		$loan_rs = LoanModel::where('loan_status','=','active')->select('*')->get();
		return view('leave/apply-loan' , compact('loan_rs'));
	}
	public function saveApplyLoanapplication(Request $request)
	{
		$emp_id=$loan_applied_no=$loan_code='';
		$emp_id=Session::get('empID');		
		$loan_id=0;
		
		$validator=Validator::make($request->all(),[
		'loan_type'=>'required',
		'loan_amount'=>'required',
		'apply_date'=>'required'
		
		],
		[
		'loan_type.required'=>'Loan Type Required',
		'loan_amount.required'=>'Loan Amount Required',
		'apply_date.required'=>'Apply Date Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('leave/apply-loan')->withErrors($validator)->withInput();
			
		}
		
		$loan_rs=LoanApplyModel::all()->last();
		
		if(!empty($loan_rs))
		{
			$loan_id=$loan_rs->id;
			$k=$loan_id+1;
			if($k<10)
			{
				$loan_code='L-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$loan_code='L-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$loan_id+1;
			
			if($k<10)
			{
				$loan_code='L-'.date('Y').'-0'.$k;
			}
		}
		
		$data = $request->all();
		$data['loan_status']= "NOT APPROVED";
		$data['employee_code']=$emp_id;
		$data['loan_applied_no']=$loan_code;
		
		$loan_apply=new LoanApplyModel();
		$loan_apply->create($data);
		Session::flash('message','Loan Apply Successfully Saved.');
		return redirect('leave/view-loan');
	}
}
