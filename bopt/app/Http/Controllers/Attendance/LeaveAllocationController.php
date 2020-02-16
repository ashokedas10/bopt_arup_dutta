<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LeaveAllocation;
use App\Company;
use App\LeaveType;
use App\Employee;
use Validator;
use Session;
use View;
use App\Grade;
use Auth;

class LeaveAllocationController extends Controller
{
    //
	
	public function viewAddLeaveAllocation()
	{

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
		//$company_rs=Company::where('company_status','=','active')->select('id')->get();
		$data['result']	='';
        $data['employees']=DB::table('employee')->where('status','=','active')->get(); 
		return view('attendance/add-new-leave-allocation', $data);
	}
	
	public function getAddLeaveAllocation(Request $request)
	{
		//echo $request->employee_code; exit
		$email = Auth::user()->email;
	   	$Roledata=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

	    $current_year=date('Y');
	    $previous_year=$current_year-1;
		
        $employee=DB::table('employee')->where('emp_code','=',$request->employee_code)->first();

     	$leave_allocations=DB::Table('leave_rule')
		->leftJoin('leave_type','leave_rule.leave_type_id','=','leave_type.id')
		->select('leave_rule.*','leave_type.leave_type_name')->get();

		
		$result='';
		
		foreach($leave_allocations as $leave_allocationkey=>$leave_allocation){
			$i=($leave_allocationkey+1);

			
			if($leave_allocation->carry_forward_type=='yes'){
				/*$leave_balance=DB::Table('leave_apply')
				->select(DB::raw('sum(no_of_leave) as total_leave'))
				->where('employee_id','=',$request->employee_code)
				->where('leave_type','=',$leave_allocation->leave_type_id)
				->where('status','=','APPROVED')
		        ->whereYear('created_at', '=', $previous_year)
		        ->get();*/

		        $leave_balance=DB::Table('leave_allocation')
				->where('employee_code','=',$request->employee_code)
				->where('leave_type_id','=',$leave_allocation->leave_type_id)
		        ->whereYear('created_at', '=', $previous_year)
		        ->first();
		        if(empty($leave_balance)){

		        	$total_leave_count=0;
		        }else{
		        	$total_leave_count=$leave_balance->leave_in_hand;

		        }
		        

			}else{

				$total_leave_count=0;
			}
			
			$leave_in_hand=$total_leave_count+$leave_allocation->max_no;

			$result .='<tr>
			    <input type="hidden" value="'.$leave_allocation->leave_type_id.'" class="form-control" name="leave_type_id'.$leave_allocation->id.'"  id="leave_type_id'.$i.'" readonly>


                <input type="hidden" value="'.$employee->emp_code.'" class="form-control" name="employee_code'.$leave_allocation->id.'" id="employee_code'.$i.'"  readonly>
				<td><div class="checkbox"><label><input type="checkbox" name="leave_rule_id[]" value="'.$leave_allocation->id.'"  id="leave_rule_id'.$i.'" ></label></div></td>
				<td>'.$employee->emp_code.'</td>
				<td>'.$employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname.'</td>
				<td>'.$leave_allocation->leave_type_name.'</td>
				<td><input type="text" value="'.$leave_allocation->max_no.'" name="max_no'.$leave_allocation->id.'" class="form-control" id="max_no'.$i.'"  readonly></td>
				<td><input type="text" id="opening_bal'.$i.'" name="opening_bal'.$leave_allocation->id.'" value="'.$total_leave_count.'" class="form-control"  readonly></td>
				<td><input type="text" id="leave_in_hand'.$i.'" value="'.$leave_in_hand.'" name="leave_in_hand'.$leave_allocation->id.'" class="form-control"></td>
				<td><input type="text" id="month_yr'.$i.'" value="'.date('m').'/'.date('Y').'" name="month_yr'.$leave_allocation->id.'" class="form-control"  readonly>
				</td>

			  </tr>';
		}
						  
        $employees=DB::table('employee')
        	->where('status','=','active')
            ->where('emp_status','!=','TEMPORARY')
            ->where('emp_status','!=','EX-EMPLOYEE')
            ->orderBy('emp_fname', 'asc')
            ->get();        
		return view('attendance/add-new-leave-allocation',compact('result','Roledata','employees'));
		
	}


		public function getLeaveAllocationByYear($leave_rule_id,$employee_code)
	{
        $current_year=date('Y');
        $monthly_leave_allocation=DB::table('leave_allocation')
        ->where('employee_code', '=', $employee_code)
        ->where('leave_rule_id', '=', $leave_rule_id)
        ->whereYear('created_at', '=', $current_year)
        ->first();
		return $monthly_leave_allocation;
	}
	
	public function saveAddLeaveAllocation(Request $request)
	{
		
		$allocation_list=$request->all();
		$leave_allocation = new LeaveAllocation();
		
		
		foreach($allocation_list['leave_rule_id'] as $allocationkey=>$allocation_value)
		{

            $data['leave_type_id']=$allocation_list['leave_type_id'.$allocation_value];
            $data['leave_rule_id']=$allocation_value;
            $data['max_no']=$allocation_list['max_no'.$allocation_value];
            $data['opening_bal']=$allocation_list['opening_bal'.$allocation_value];
			$data['leave_in_hand']=$allocation_list['leave_in_hand'.$allocation_value];
			$data['month_yr']=$allocation_list['month_yr'.$allocation_value];

			$data['employee_code']=$allocation_list['employee_code'.$allocation_value];


			$leave_month=$this->getLeaveAllocationByYear($allocation_value, $allocation_list['employee_code'.$allocation_value]);
			if(empty($leave_month)){
				$leave_allocation->create($data);
            }


		}
		
		Session::flash('message','Leave Allocation Information Successfully Saved.');
		return redirect('leave-management/leave-allocation-listing');
	}
	
	public function getLeaveAllocation()
	{

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

        $data['leave_allocation']=DB::table('leave_allocation')
        ->join('leave_type', 'leave_allocation.leave_type_id', '=', 'leave_type.id')
        ->select('leave_allocation.*', 'leave_type.leave_type_name')
        ->whereYear('leave_allocation.created_at', '=', date('Y'))
        ->orderBy('leave_allocation.id', 'desc')
        ->get();
		return view('attendance/view-leave-allocation',$data);
	}


	public function getLeaveAllocationById($leave_allocation_id)
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();


		$data['leave_allocation']= DB::table('leave_allocation')->where('id', $leave_allocation_id)->first();
		$data['leave_type']= DB::table('leave_type')->where('id', $data['leave_allocation']->leave_type_id)->first();
		return view('attendance/edit-leave-allocation',$data);
	}

	public function editLeaveAllocation(Request $request)
	{
		DB::table('leave_allocation')
	        ->where('id', $request->id)
	        ->update(['leave_in_hand' =>$request->leave_in_hand,'month_yr'=>$request->month_yr]);
		Session::flash('message','Leave Allocation Information Successfully Saved.');
		return redirect('leave-management/leave-allocation-listing');
	}
}
