<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\EmployeeType;
use App\Company;
use View;
use Validator;
use Session;
use Illuminate\Validation\Rule;

class EmployeeTypeController extends Controller
{
    //
	public function viewAddEmployeeType()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('pis/employee-type', compact('company_rs'));
	}
	
	public function saveEmployeeType(Request $request)
	{
		
		$employee_type_name= $request->employee_type_name;
	
		$validator=Validator::make($request->all(),[

			'employee_type_name'=>'required|max:255'
		],
		[

		'employee_type_name.required'=>'Employee Type Name required'		
		]);
		
		if($validator->fails())
		{
			return redirect('pis/employee-type')->withErrors($validator)->withInput();			
		}
		
		$data=request()->except(['_token']);
		$employee_type=new EmployeeType();
		$employee_type->create($data);
		
		Session::flash('message','Employee Type Information Successfully Saved.');
		return redirect('pis/vw-employee-type');
		
	}
	
	public function getEmployeeTypes()
	{
		$employee_type_rs=DB::Table('employee_type')
		->get();
		
		return view('pis/view-employee-type', compact('employee_type_rs'));
	}
		
}
