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



class PtaxStatementController extends Controller
{
    //
	public function getPtaxStatement()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('pis/view-ptax-statement', compact('company_rs'));
	}
	
	public function viewPtaxSummary(Request $request)
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
			return redirect('pis/vw-ptax-statement')->withErrors($validator)->withInput();
			
		}
		
		
		$company=$request->company_id;
		$grade=$request->grade_id;
		$month=$request->month;
		
		/*$ptax_rs=PayrollDetails::where('company_id','=',$company)
				->where('grade_id','=',$grade)
				->where('month','=',$month)
				->select('*')->get();*/
		//DB::enableQueryLog();
		$company_logo_rs=Company::where('id','=',$company)->select('id','company_name','company_logo')->get()->first();
		$ptax_rs=DB::Table('view_payslip')
				->where('company_id','=',$company)
				->where('grade_id','=',$grade)
				->where('month','=',$month)
				->select('*')
				->get();
		//dd(DB::getQueryLog());
		//dd($ptax_rs);		
		return view('pis/Ptax-salary-summary', compact('ptax_rs','month','company_logo_rs'));
		
	}
}
