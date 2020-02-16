<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\PayrollDetails;
use App\Company;
use App\Grade;
use App\EmployeeMaster;
use Validator;
use Session;
use View;
use NumberToWords\NumberToWords;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Auth;

class EmployeeWisePayslipController extends Controller
{
    //
	public function getEmployeeWisePayslip()
	{
		$data['result']='';
		$payroll_details_rs='';
		return view('pis/employeewise-view-payslip',$data);         
   	}
	
	
	
	public function showEmployeeWisePayslip(Request $request)
	{
		$payroll_details_rs=$result='';
		$emp_id = $request->emp_code;//dd($emp_id);
		$month_yr = $request->month_yr;
		$validator=Validator::make($request->all(),[		
		'month_yr'=>'required',
//		'emp_code' => ['required',
//        Rule::exists('payroll_details')->where(function ($query) use($emp_id) {
//            $query->where('emp_code', $emp_id);
//        }),
//		],		
		[
		'month_yr.required'=>'Month Year Required'
		]
		]);
		
		if($validator->fails())
		{
			return redirect('pis/vw-employeewise-view-payslip')->withErrors($validator)->withInput();
			
			
		}
		
		if($emp_id==''){
//		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
//		$payroll_details_rs=PayrollDetails::where('emp_code','=',$emp_id)->where('company_id','=',$company_id)->select('*')->get()->first();
		$payroll_details_rs=DB::table('payroll_details')
                    ->where('month_yr','=',$month_yr)
                        ->select('*')
                      ->get();
                }
                else
                {
                     $payroll_details_rs=DB::table('payroll_details')
                    ->where('month_yr','=',$month_yr)
                    ->where('employee_id','=',$emp_id)
                    ->get();
                }
                foreach($payroll_details_rs as $payroll)
               {
                   
				$result.='<tr style="text-align:center;">
						<td>'.$payroll->employee_id.'</td>
						<td>'.$payroll->emp_name.'</td>
						<td>'.$payroll->emp_designation.'</td>
						<td>'.$payroll->month_yr.'</td>
						<td>'.$payroll->emp_gross_salary.'</td>
						<td>'.$payroll->emp_total_deduction.'</td>
						<td>'.$payroll->emp_net_salary.'</td>
						<td><a href="'.url('pis/payslip').'/'.encrypt($payroll->employee_id).'/'.encrypt($payroll->id).'" target="_blank"><i class="ti-eye"></i></a></td>
					</tr>';
			//dd($result);
              }
              //dd($result);
		return view('pis/employeewise-view-payslip' , compact('result','payroll_details_rs'));		
						
	}
	
	public function viewPayrollDetails($emp_id,$pay_dtl_id)
	{
  		$emp_id   = Crypt::decrypt($emp_id);
		$pay_dtl_id   = Crypt::decrypt($pay_dtl_id);

        if($emp_id)
        {
            $data['payroll_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->join('bank_masters','employee.emp_bank_name','=','bank_masters.id')
                    ->where('payroll_details.employee_id','=',$emp_id)
                    ->where('payroll_details.id','=',$pay_dtl_id)
                    ->select('payroll_details.*','employee.*','bank_masters.master_bank_name')
                    ->get();
         
           	$data['leave_hand']=DB::table('leave_allocation')
                   ->join('leave_type','leave_allocation.leave_type_id','=','leave_type.id')
                   ->where('leave_allocation.employee_code','=',$emp_id)
                    ->where('leave_allocation.leave_allocation_status','=','active')
                   ->select('leave_allocation.*','leave_type.leave_type_name')
                   ->get();
				
                $montharr=explode('/',$data['payroll_rs'][0]->month_yr);
				$calculate_month=$montharr[0]-2;
				
				if(strlen($calculate_month)==1){
					$leave_calculate= "0".$calculate_month;
				}else{
					$leave_calculate= $calculate_month;
				}
			
			$caculate_month_for_leave= $leave_calculate."/".$montharr[1];
			
            $data['current_month_days'] = cal_days_in_month(CAL_GREGORIAN, $montharr[0], $montharr[1]); 
				   
            $data['actual_payroll']=DB::table('emp_actual_paystructure')
                    ->where('emp_code','=',$emp_id)
                    ->first();

          	$data['company_rs']=DB::table('company')->get();
            return view('pis/vwpayslip',$data);
        }    
            
	}


	public function showSinglePayslip()
	{
		$data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
		return view('leave/single-view-payslip',$data);         
   	}


   	public function singlePayslip(Request $request)
	{
	    $month=$request->month_yr; 
		$employee_code= Auth::user()->employee_id;


		$data['payroll_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->join('bank_masters','employee.emp_bank_name','=','bank_masters.id')
                    ->where('payroll_details.employee_id','=',$employee_code)
                    ->where('payroll_details.month_yr','=',$month)
                    ->select('payroll_details.*','employee.*','bank_masters.master_bank_name')
                    ->get();
         
        $data['leave_hand']=DB::table('leave_allocation')
                   ->join('leave_type','leave_allocation.leave_type_id','=','leave_type.id')
                   ->where('leave_allocation.employee_code','=',$employee_code)
                    ->where('leave_allocation.leave_allocation_status','=','active')
                   ->select('leave_allocation.*','leave_type.leave_type_name')
                   ->get();


        $montharr=explode('/',$data['payroll_rs'][0]->month_yr);
				$calculate_month=$montharr[0]-2;
				
				if(strlen($calculate_month)==1){
					$leave_calculate= "0".$calculate_month;
				}else{
					$leave_calculate= $calculate_month;
				}
			
			$caculate_month_for_leave= $leave_calculate."/".$montharr[1];
			
            $data['current_month_days'] = cal_days_in_month(CAL_GREGORIAN, $montharr[0], $montharr[1]); 
				   
            $data['actual_payroll']=DB::table('emp_actual_paystructure')
                    ->where('emp_code','=',$employee_code)
                    ->first();

          	$data['company_rs']=DB::table('company')->get();
		return view('leave/vwsinglepayslip',$data);         
   	}
}
