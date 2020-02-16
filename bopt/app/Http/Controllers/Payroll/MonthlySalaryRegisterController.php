<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PayrollDetails;
use App\Company;
use Validator;
use Session;
use View;
use NumberToWords\NumberToWords;

class MonthlySalaryRegisterController extends Controller
{
    //
	public function getMonthlySalaryRegister()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();

		return view('pis/salary-register',compact('company_rs'));
	}
	
	public function viewMonthlySalarySummary(Request $request)
	{
		$validator=Validator::make($request->all(),[
		
		'month'=>'required'
		],
		[
		
		'month.required'=>'Month is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('pis/vw-salary-register')->withErrors($validator)->withInput();
			
		}
		
		
		$month=$request->month;
		
		$monthly_salary_rs=DB::Table('payroll_details')
				->where('month_yr','=',$month)
				->select('*')
				->get();
				// dd($monthly_salary_rs);
		return view('pis/view-salary-register', compact('monthly_salary_rs','month'));
	}
}
