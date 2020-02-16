<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\EmployeeType;
use App\Company;
use View;
use Validator;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class EmployeeTypeController extends Controller
{
    //
	public function viewAddEmployeeType()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		return view('masters/employee-type', compact('company_rs'));
	}
	


	public function saveEmployeeType(Request $request)
	{
		$employee_type_name= strtoupper(trim($request->employee_type_name));
		
		if(is_numeric($employee_type_name)==1){
			Session::flash('message','Employee Type Should not be numeric.');
		    return redirect('masters/vw-employee-type');
			
		}
		$employee_type=DB::table('employee_type')->where('employee_type_name', $request->employee_type_name)->first();
		if(!empty($employee_type)){
			Session::flash('message','Employee Type Alredy Exists.');
		    return redirect('masters/vw-employee-type');
		}

		$validator=Validator::make($request->all(),[
			'employee_type_name'=>'required|max:255'
		],
		['employee_type_name.required'=>'Employee Type Name required']);
		
		if($validator->fails())
		{
			return redirect('masters/employee-type')->withErrors($validator)->withInput();			
		}
		
		//$data=request()->except(['_token']);
		
		$employee_type=new EmployeeType();

		if(empty($request->id)){

			DB::table('employee_type')->insert(
			    ['employee_type_name' => $employee_type_name,'employee_type_status' => 'Active','created_at' => date('Y-m-d h:i:sa')]
			);
			

            Session::flash('message','Employee Type Information Successfully saved.');
			
			return redirect('masters/vw-employee-type');

		}else{
			DB::table('employee_type')
            ->where('id', $request->id)
            ->update(['employee_type_name' => $employee_type_name]);
            Session::flash('message','Employee Type Information Successfully Saved.');
		    return redirect('masters/vw-employee-type');
		}
		
		
		
	}



	
	public function getEmployeeTypes()
	{
		$employee_type_rs=DB::Table('employee_type')
		->get();
		
		return view('masters/view-employee-type', compact('employee_type_rs'));
	}

	public function getTypeById($id)
	{
		$data['employee_type']=DB::table('employee_type')->where('id', $id)->first();
		return view('masters/employee-type', $data);
	}
		
}
