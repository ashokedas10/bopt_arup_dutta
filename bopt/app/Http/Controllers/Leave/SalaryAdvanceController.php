<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SalaryAdvanceModel;
use Validator;
use Session;
use View;

class SalaryAdvanceController extends Controller
{
    //
	public function viewSalaryAdvance()
	{
		$salary_advance_rs = SalaryAdvanceModel::all();
		return view('leave/salary-advance', compact('salary_advance_rs'));
	}
	
	public function viewAddSalaryAdvance()
	{
		
		return view('leave/apply-salary-advance');
	}
	
	public function saveSalaryAdvanceData(Request $request)
	{
		$validator = Validator::make($request->all(),[
		'salary_advance_amount'=>'required',
		'apply_date'=>'required'
		],
		[
		'salary_advance_amount.required'=>'Salary Advance Amount Required',
		'apply_date.required'=>'Apply Date required'
		]);
		
		if($validator->fails())
		{
			return redirect('leave/apply-salary-advance')->withErrors($validator)->withInput();
		}
		$data = $request->all();
		$data['salary_advance_status']= "NOT APPROVED";
		$salary_advance=new SalaryAdvanceModel();
		$salary_advance->create($data);
		Session::flash('message','Salary Advance Successfully Saved.');
		return redirect('leave/salary-advance');
	}
}
