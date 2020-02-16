<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Company;
use App\Grade;
use App\Department;
use App\PayrollDetails;
use App\EmployeePayStructure;
use App\EmployeeGradeWiseAllowance;
use Illuminate\Http\Request;
use View;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\ProcessAttendance;
use Auth;

class PayStructureController extends Controller
{
	public function getPaystructure()
	{
                
                $email = Auth::user()->email;
                $data['Roledata']=DB::table('role_authorization')      
                    ->join('module', 'role_authorization.module_name', '=', 'module.id')
                    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
                    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
                    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
                    ->where('member_id','=',$email) 
                    ->get();


		//$data['employee']=DB::table('employee')->where('status','=','active') ->orderBy('emp_fname', 'asc')->get();
		
		$data['employee']= DB::table('employee')
            ->where('status','=','active')
            ->where('emp_status','!=','TEMPORARY')
            ->where('emp_status','!=','EX-EMPLOYEE')
            ->orderBy('emp_fname', 'asc')
            ->get();

        //print_r($data['employee']); exit;
		return view('pis/single-paystructure',$data);
	}

	public function savePaystructure(Request $request)
	{
		
		$data['emp_code']=$request->emp_code;
        $data['emp_name']=$request->emp_name;
        $data['emp_designation']=$request->emp_designation;
        $data['emp_actual_basic_pay']=$request->emp_basic_pay;
        $data['emp_actual_da']=$request->emp_da;
        $data['emp_actual_hra']=$request->emp_hra;
        $data['emp_actual_transport_allowance']=$request->emp_transport_allowance;
        $data['emp_actual_da_on_ta']=$request->emp_da_on_ta;
        $data['emp_actual_ltc']=$request->emp_ltc;     
        $data['emp_actual_cea']=$request->emp_cea;
        $data['emp_actual_travelling_allowance']=$request->emp_travelling_allowance;
        $data['emp_actual_daily_allowance']=$request->emp_daily_allowance;       
        $data['emp_actual_advance']=$request->emp_advance;
        $data['emp_actual_adjustment']=$request->emp_adjustment;
        $data['emp_actual_medical']=$request->emp_medical;
        $data['emp_actual_spcl_allowance']=$request->emp_spcl_allowance;
        $data['emp_actual_cash_handling_allowance']=$request->cash_handling_allowance;
        $data['emp_actual_others_addition']=$request->emp_others_addition;
        $data['emp_actual_gross_salary']=$request->emp_gross_salary;
        $data['created_at']= date("d-m-Y h:i:s");

        $checkDb = DB::table('emp_actual_paystructure')->where('emp_code','=', $request->emp_code)->first();
        if(empty($checkDb)){
        	DB::table('emp_actual_paystructure')->insert($data);
			Session::flash('message','Payroll Information Successfully saved.');
        }else{
        	DB::table('emp_actual_paystructure')->where('emp_code', '=', $request->emp_code)->delete();
        	DB::table('emp_actual_paystructure')->insert($data);
			Session::flash('message','Payroll Information Successfully saved.');
        }
        
		return redirect('paystructure');
	}

        public function viewPayStructureDashboard()
        {
                $email = Auth::user()->email;
                $Roledata=DB::table('role_authorization')      
                    ->join('module', 'role_authorization.module_name', '=', 'module.id')
                    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
                    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
                    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
                    ->where('member_id','=',$email) 
                    ->get();

                $pay_structures = DB::table('emp_actual_paystructure')->select('*')->get();

                return view('pis/pay-structure-dashboard', compact('pay_structures', 'Roledata'));
        }

        public function deletePaystructure($paystructure_id)
        {
                $result= DB::table('emp_actual_paystructure')->where('id', $paystructure_id)->delete();
                Session::flash('message','Deleted Successfully.');
                return redirect('paystructure-dashboard');
        }
	      
}
