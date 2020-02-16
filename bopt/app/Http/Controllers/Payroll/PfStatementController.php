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

class PfStatementController extends Controller
{
    //
	public function getPfStatement()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('pis/view-pf-statement', compact('company_rs'));
	}
	
	public function viewPfSummary(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'grade_id'=>'required',
		'month'=>'required'
		],
		[
		'company_id.required'=>'Company is Required',
		'grade_id.required'=>'Grade is Required',
		'month.required'=>'Month is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('pis/vw-pf-statement')->withErrors($validator)->withInput();
			
		}
		
		$company=$request->company_id;
		$grade=$request->grade_id;
		$month=$request->month;
		$company_logo_rs=Company::where('id','=',$company)->select('id','company_name','company_logo')->get()->first();
		//DB::enableQueryLog();
		$pf_rs=DB::Table('view_payslip')
				->where('company_id','=',$company)
				->where('grade_id','=',$grade)
				->where('month','=',$month)
				->select('*')
				->get();
		//dd(DB::getQueryLog());
		//dd($ptax_rs);		
		return view('pis/pf-statement', compact('pf_rs','month','company_logo_rs'));
	}
}
