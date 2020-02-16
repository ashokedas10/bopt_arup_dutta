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

class GradeWisePayslipController extends Controller
{
    //
	public function getGradeWisePayslip()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('pis/gradewise-view-payslip', compact('company_rs'));
	}
	
	public function viewGradeWisePayslip(Request $request)
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
			return redirect('pis/vw-gradewise-view-payslip')->withErrors($validator)->withInput();
			
		}
		
		$company=$request->company_id;
		$grade=$request->grade_id;
		$month=$request->month;
		//echo "test".$grade;die;
		/*$payroll_deatils_rs=DB::Table('payroll_details')
							->leftJoin('company','payroll_details.company_id','=','company.id')
							->leftJoin('grade','payroll_details.grade_id','=','grade.id')
							->leftJoin('employee','payroll_details.emp_code','=','employee.employee_id')
							->where('payroll_details.company_id','=',$company)
							->where('payroll_details.grade_id','=',$grade)
							->where('payroll_details.month','=',$month)
							->select('payroll_details.*','company.company_name','grade.grade_name','employee.*')->get();*/
		//$total = $payroll_details_rs->net_salary;
		//dd($payroll_deatils_rs);
		$payroll_deatils_rs = DB::Table('view_payslip')
							->where('company_id','=',$company)
							->where('grade_id','=',$grade)
							->where('month','=',$month)
							->select('*')->get();
		if($payroll_deatils_rs)
		{
			return view('pis/Rice_Payslip_Gradewise', compact('payroll_deatils_rs'));
		}
		else
		{
			Session::flash('message','No data found.');
			return view('pis/Rice_Payslip_Gradewise');
		}
		
	}
}
